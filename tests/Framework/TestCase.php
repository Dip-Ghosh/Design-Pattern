<?php
declare(strict_types=1);

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
