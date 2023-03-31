<?php

namespace TidioLiveChat\Admin\Notice;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Admin\AdminRouting;
use TidioLiveChat\Admin\Notice\Exception\NoticeNameIsNotAllowedException;

class DismissibleNoticeService
{
    const PHP_7_2_REQUIREMENT_NOTICE = 'tidio-php-7-2-requirement-notice';
    const NEW_WOOCOMMERCE_FEATURES_NOTICE = 'tidio-new-woocommerce-features-notice';

    /**
     * @return string[]
     */
    private static function getAllowedNoticeOptions()
    {
        return [
            self::PHP_7_2_REQUIREMENT_NOTICE,
            self::NEW_WOOCOMMERCE_FEATURES_NOTICE,
        ];
    }

    /**
     * @param string $noticeName
     * @return void
     */
    public function markAsDismissed($noticeName)
    {
        $this->validateNoticeName($noticeName);

        update_option($noticeName, true);
    }

    /**
     * Remember that your script should contain data-dismissible-url="{dismiss_url}"
     *
     * @param string $templatePath
     * @param string $noticeName
     * @return void
     */
    public function displayNotice($templatePath, $noticeName)
    {
        $this->validateNoticeName($noticeName);

        if ($this->wasDismissed($noticeName)) {
            return;
        }

        $script = $this->getNoticeFile($templatePath);

        if (strpos($script, 'data-tidio-dismissible-url="{dismiss_url}"') === false) {
            throw new \RuntimeException('Given script should contains \'data-tidio-dismissible-url={dismiss_url}\' to inject dismissible script.');
        }

        $dismissibleScript = <<<HTML
<script type="text/javascript">
window.onload = function() {
    if (window.jQuery) {
        jQuery(document).ready(function() {
            jQuery('[data-tidio-dismissible-url]').click(function(e) {
                e.preventDefault();
                const noticeParent = jQuery(this).closest('.notice');
                
                jQuery.ajax({ 
                    url: jQuery(this).data('tidio-dismissible-url'),
                    type: 'post',
                    success: function() {
                        noticeParent.fadeOut(200);
                    },
                    error: function() {
                        noticeParent.fadeOut(200);
                        console.error('Could not dismiss tidio notice');
                    }
                });
            });
        });
    }
}
</script>
HTML;

        $scriptWithDismissiblePart = strtr($script . $dismissibleScript, ['{dismiss_url}' => $this->buildDismissibleNoticeHref($noticeName)]);

        echo $scriptWithDismissiblePart;
    }

    public function clearDismissedNoticesHistory()
    {
        foreach (self::getAllowedNoticeOptions() as $noticeOption) {
            delete_option($noticeOption);
        }
    }

    /**
     * @param string $noticeName
     * @return string
     */
    private function buildDismissibleNoticeHref($noticeName)
    {
        return AdminRouting::getEndpointForHandleDismissNotice($noticeName);
    }

    /**
     * @param string $name
     * @return bool
     */
    private function wasDismissed($name)
    {
        return (bool) get_option($name);
    }

    /**
     * @param string $noticeName
     * @return void
     * @throws NoticeNameIsNotAllowedException
     */
    private function validateNoticeName($noticeName)
    {
        if ($this->isNoticeNameAllowed($noticeName)) {
            throw NoticeNameIsNotAllowedException::withName($noticeName);
        }
    }

    /**
     * @param string $noticeName
     * @return bool
     */
    private function isNoticeNameAllowed($noticeName)
    {
        return in_array($noticeName, self::getAllowedNoticeOptions(), true) === false;
    }

    private function getNoticeFile($path)
    {
        ob_start();
        include $path;
        return ob_get_clean();
    }
}
