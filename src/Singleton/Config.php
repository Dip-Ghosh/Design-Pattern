<?php
declare(strict_types=1);

namespace Singleton;

final class Config
{
    private static ?self $instance = null;

    private array $config;

    private function __construct()
    {
        $path = __DIR__ . '/Config/app.php';

        if (!file_exists($path)) {
            throw new \RuntimeException('Config file not found.');
        }

        $this->config = require $path;
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $segments = explode('.', $key);
        $value = $this->config;

        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }

        return $value;
    }
}
