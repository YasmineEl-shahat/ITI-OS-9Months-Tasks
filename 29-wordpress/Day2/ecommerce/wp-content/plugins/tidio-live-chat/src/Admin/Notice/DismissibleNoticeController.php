<?php

namespace TidioLiveChat\Admin\Notice;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Admin\AdminRouting;
use TidioLiveChat\Admin\NonceValidator;
use TidioLiveChat\Admin\Notice\Exception\NoticeNameIsNotAllowedException;
use TidioLiveChat\Utils\QueryParameters;

class DismissibleNoticeController
{
    const TIDIO_NOTICE_QUERY_PARAM_NAME = 'tidio_notice';

    /**
     * @var DismissibleNoticeService
     */
    private $dismissibleNoticeService;
    /**
     * @var NonceValidator
     */
    private $nonceValidator;

    /**
     * @param DismissibleNoticeService $dismissibleNoticeService
     * @param NonceValidator $nonceValidator
     */
    public function __construct($dismissibleNoticeService, $nonceValidator)
    {
        $this->dismissibleNoticeService = $dismissibleNoticeService;
        $this->nonceValidator = $nonceValidator;
    }

    public function handleDismissNotice()
    {
        if (!$this->nonceValidator->isRequestNonceValid(AdminRouting::DISMISS_NOTICE_ACTION)) {
            wp_die('', 403);
        }

        $noticeName = QueryParameters::get(self::TIDIO_NOTICE_QUERY_PARAM_NAME);

        try {
            $this->dismissibleNoticeService->markAsDismissed($noticeName);
        } catch (NoticeNameIsNotAllowedException $exception) {
            // do nothing if notice name is invalid
        }

        return true;
    }
}
