<?php
declare(strict_types=1);

final class Config
{
    private static ?self $instance = null;

    private array $settings;

    private function __construct()
    {
        $this->settings = [
            'db' => [
                'dsn'      => 'mysql:host=localhost;dbname=test',
                'user'     => 'root',
                'password' => '',
            ],
            'log' => [
                'file' => __DIR__ . '/app.log',
            ],
        ];
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public function get(string $key): mixed
    {
        return $this->settings[$key] ?? null;
    }
}
