<?php
declare(strict_types=1);

final class Assert
{
    public static function equals(mixed $expected, mixed $actual, string $message): bool
    {
        if ($expected !== $actual) {
            self::fail($message, $expected, $actual);
            return false;
        }

        self::pass($message);
        return true;
    }

    public static function true(bool $condition, string $message): bool
    {
        return self::equals(true, $condition, $message);
    }

    private static function pass(string $message): void
    {
        echo "   ✔ PASS: {$message}\n";
    }

    private static function fail(string $message, mixed $expected, mixed $actual): void
    {
        echo "   ✘ FAIL: {$message}\n";
        echo "     Expected: " . var_export($expected, true) . "\n";
        echo "     Actual:   " . var_export($actual, true) . "\n";
    }
}
