<?php
declare(strict_types=1);

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
