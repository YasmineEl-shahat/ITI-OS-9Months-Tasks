<?php

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

class TidioDotEnv
{
    const ENV_FILENAME = '.env';

    /**
     * @var string
     */
    private $envDirectoryPath;

    /**
     * @param string $envDirectoryPath
     */
    public function __construct($envDirectoryPath)
    {
        if (!is_dir($envDirectoryPath)) {
            throw new \RuntimeException('Path must point an env directory');
        }

        $this->envDirectoryPath = $envDirectoryPath;
    }

    public function load()
    {
        $file = sprintf('%s/%s', $this->envDirectoryPath, self::ENV_FILENAME);
        if (!file_exists($file)) {
            return;
        }

        if (!is_file($file) || !is_readable($file)) {
            throw new \RuntimeException(sprintf('%s file is not readable', self::ENV_FILENAME));
        }

        $envs = $this->parseEnvFile($file);
        $this->setEnvs($envs);
    }

    /**
     * @param string $file
     * @return array<string, string>
     */
    private function parseEnvFile($file)
    {
        $envs = [];
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $envs[trim($name)] = trim($value);
        }

        return $envs;
    }

    /**
     * @param array<string, string> $envs
     */
    private function setEnvs($envs)
    {
        foreach ($envs as $envName => $envValue) {
            putenv(sprintf('%s=%s', $envName, $envValue));
        }
    }
}
