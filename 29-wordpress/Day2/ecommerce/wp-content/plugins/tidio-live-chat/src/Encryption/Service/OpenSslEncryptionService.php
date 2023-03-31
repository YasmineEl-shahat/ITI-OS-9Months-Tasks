<?php

namespace TidioLiveChat\Encryption\Service;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Encryption\Exception\DecryptionFailedException;
use TidioLiveChat\Encryption\EncryptionService;

class OpenSslEncryptionService implements EncryptionService
{
    const CIPHER_ALGORITHM = 'aes-256-ctr';
    const HASH_ALGORITHM = 'sha256';
    const HASH_LENGTH = 32;

    /**
     * @var string
     */
    private $encryptionKey;
    /**
     * @var int
     */
    private $ivLength;

    public function __construct($encryptionKey)
    {
        $this->encryptionKey = $encryptionKey;
        $this->ivLength = openssl_cipher_iv_length(self::CIPHER_ALGORITHM);
    }

    /**
     * @inerhitDoc
     */
    public function encrypt($value)
    {
        $iv = openssl_random_pseudo_bytes($this->ivLength);
        $encryptedValue = openssl_encrypt($value, self::CIPHER_ALGORITHM, $this->encryptionKey, 0, $iv);
        $hmac = hash_hmac(self::HASH_ALGORITHM, $encryptedValue, $this->encryptionKey, true);

        return base64_encode($iv . $hmac . $encryptedValue);
    }

    /**
     * @inerhitDoc
     */
    public function decrypt($encryptedString)
    {
        $encryptedString = base64_decode($encryptedString, true);

        $iv = substr($encryptedString, 0, $this->ivLength);
        $hmac = substr($encryptedString, $this->ivLength, self::HASH_LENGTH);
        $encryptedValue = substr($encryptedString, $this->ivLength + self::HASH_LENGTH);

        $hashToCompare = hash_hmac(self::HASH_ALGORITHM, $encryptedValue, $this->encryptionKey, true);
        if (!hash_equals($hmac, $hashToCompare)) {
            throw DecryptionFailedException::withInvalidHashErrorCode();
        }

        return openssl_decrypt($encryptedValue, self::CIPHER_ALGORITHM, $this->encryptionKey, 0, $iv);
    }
}
