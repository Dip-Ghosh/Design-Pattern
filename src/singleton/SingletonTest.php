<?php
declare(strict_types=1);

final class SingletonTest extends TestCase
{
    public function testSingleInstance(): bool
    {
        return Assert::equals(
            Logger::getInstance(),
            Logger::getInstance(),
            'Singleton returns same instance'
        );
    }
}
