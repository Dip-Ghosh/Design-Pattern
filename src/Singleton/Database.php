<?php
declare(strict_types=1);

namespace Singleton;

use PDO;
use PDOException;

final class Database
{
    private static ?self $instance = null;
    private PDO $connection;

    private function __construct()
    {
        $config = Config::getInstance();
        $logger = Logger::getInstance();


        try {
            if ($config->get('db.driver') === 'sqlite') {
                $this->connection = new PDO(
                    $config->get('db.dsn'),
                    null,
                    null,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            } else {
                $dsn = sprintf(
                    'mysql:host=%s;dbname=%s;charset=%s',
                    $config->get('db.host'),
                    $config->get('db.name'),
                    $config->get('db.charset', 'utf8mb4')
                );

                $this->connection = new PDO(
                    $dsn,
                    $config->get('db.user'),
                    $config->get('db.pass'),
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            }

            $logger->info('Database connection created');

        } catch (PDOException $e) {
            $logger->error('Database connection failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
