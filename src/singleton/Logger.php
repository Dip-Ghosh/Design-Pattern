<?php

declare(strict_types = 1);

final class Logger
{
    private static ?self $instance = null;
    private string       $logFile;

    private function __construct()
    {
        $config        = Config::getInstance();
        $this->logFile = $config->get('log')['file'];
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public function info(string $message): void
    {
        $this->write('INFO', $message);
    }

    public function error(string $message): void
    {
        $this->write('ERROR', $message);
    }

    public function warn(string $message): void
    {
        $this->write('WARN', $message);
    }

    private function write(string $level, string $message): void
    {
        $time = date('Y-m-d H:i:s');
        file_put_contents(
            $this->logFile,
            "{$time} [{$level}] {$message}\n",
            FILE_APPEND
        );
    }
}
