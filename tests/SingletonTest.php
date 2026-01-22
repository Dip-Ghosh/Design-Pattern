<?php
declare(strict_types=1);

use Singleton\Config;
use Singleton\Database;
use Singleton\Logger;

final class SingletonTest extends TestCase
{
    public function testSingleInstance(): bool
    {
        $config =  Config::getInstance();
        $logger =  Logger::getInstance();

        $logger->info('Application Started');
        $logger->info('Environment Started', $config->get('env'));


        $db = Database::getInstance()->getConnection();


        return Assert::equals(
            Logger::getInstance(),
            Logger::getInstance(),
            'Singleton returns same instance'
        );
    }

    public function testDatabaseSingleton(): bool
    {
        $db1 = Database::getInstance();
        $db2 = Database::getInstance();

        if (!Assert::true(
            $db1 === $db2,
            'Database returns same singleton instance'
        )) {
            return false;
        }

        $pdo1 = $db1->getConnection();
        $pdo2 = $db2->getConnection();

        if (!Assert::true(
            $pdo1 === $pdo2,
            'Database returns same PDO connection'
        )) {
            return false;
        }

        $stmt = $pdo1->query('SELECT 1');
        $result = $stmt->fetchColumn();

        return Assert::equals(
            1,
            (int) $result,
            'Database connection is usable'
        );
    }
}
