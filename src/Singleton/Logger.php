<?php
declare(strict_types=1);

namespace Singleton;

final class Logger
{
    private static ?self $instance = null;
    private string       $file;

    private function __construct()
    {
        $config     = Config::getInstance();
        $this->file = $config->get('log.file');

        if (!$this->file) {
            throw new \RuntimeException('Log file not configured');
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
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
        file_put_contents($this->file, "{$time} [{$level}] {$message}\n", FILE_APPEND
        );
    }
}
