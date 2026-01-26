<?php
declare(strict_types=1);

use Prototype\BarBookPrototype;
use Prototype\FooBookPrototype;

final class PrototypeTest extends TestCase
{
    public function test_reports_are_cloned_from_prototype(): void
    {
        $fooPrototype = new FooBookPrototype();
        $barPrototype = new BarBookPrototype();

        for ($i = 0; $i < 10; $i++) {
            $book = clone $fooPrototype;
            $book->setTitle('Foo Book No ' . $i);
            Assert::true($book instanceof FooBookPrototype, "Foo Book No $i should be an instance of FooBookPrototype");
        }

        for ($i = 0; $i < 5; $i++) {
            $book = clone $barPrototype;
            $book->setTitle('Bar Book No ' . $i);

            Assert::true($book instanceof  BarBookPrototype, "Bar Book No $i should be an instance of FooBookPrototype");

        }
    }
}
