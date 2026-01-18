<?php
declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| TESTING MATERIAL (NO TEST CASES HERE)
|--------------------------------------------------------------------------
| - Assertion helpers
| - Base TestCase
| - Test runner
|--------------------------------------------------------------------------
*/

/* ------------------------------------------------------------
 | Assertion Helper
 * ------------------------------------------------------------ */
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

/* ------------------------------------------------------------
 | Test Result Value Object
 * ------------------------------------------------------------ */
final class TestResult
{
    public function __construct(
        public readonly string $suite,
        private int $passed = 0,
        private int $failed = 0
    ) {}

    public function add(bool $passed): void
    {
        $passed ? $this->passed++ : $this->failed++;
    }

    public function success(): bool
    {
        return $this->failed === 0;
    }

    public function report(): void
    {
        echo "\nResult for {$this->suite}: ";
        echo $this->success()
            ? "✔ {$this->passed} passed\n"
            : "✘ {$this->failed} failed, {$this->passed} passed\n";
    }
}

/* ------------------------------------------------------------
 | Base Test Case (Template Method)
 * ------------------------------------------------------------ */
abstract class TestCase
{
    final public function run(): TestResult
    {
        $result = new TestResult(static::class);

        foreach ($this->testMethods() as $method) {
            echo "\n▶ {$method}\n";
            $result->add((bool) $this->$method());
        }

        return $result;
    }

    private function testMethods(): array
    {
        return array_filter(
            get_class_methods($this),
            static fn (string $method) => str_starts_with($method, 'test')
        );
    }
}

/* ------------------------------------------------------------
 | Test Runner
 * ------------------------------------------------------------ */
final class TestRunner
{
    /** @param TestCase[] $tests */
    public static function run(array $tests): int
    {
        echo "\n============================================\n";
        echo " DESIGN PATTERN TEST RUNNER\n";
        echo "============================================\n";

        $allPassed = true;

        foreach ($tests as $test) {
            echo "\n--------------------------------------------\n";
            echo "Running " . $test::class . "\n";
            echo "--------------------------------------------\n";

            $result = $test->run();
            $result->report();

            $allPassed &= $result->success();
        }

        echo "\n============================================\n";
        echo $allPassed
            ? "✔ ALL TESTS PASSED\n"
            : "✘ SOME TESTS FAILED\n";
        echo "============================================\n";

        return $allPassed ? 0 : 1;
    }
}
