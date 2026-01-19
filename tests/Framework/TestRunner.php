<?php
declare(strict_types=1);

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
