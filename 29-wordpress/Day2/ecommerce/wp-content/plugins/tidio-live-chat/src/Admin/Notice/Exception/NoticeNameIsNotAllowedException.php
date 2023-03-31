<?php

namespace TidioLiveChat\Admin\Notice\Exception;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class NoticeNameIsNotAllowedException extends \InvalidArgumentException
{
    /**
     * @param string $noticeName
     */
    public function __construct($noticeName)
    {
        $message = sprintf('Notice name \'%s\' is not allowed', $noticeName);
        parent::__construct($message);
    }

    /**
     * @param string $noticeName
     * @return self
     */
    public static function withName($noticeName)
    {
        return new self($noticeName);
    }
}
