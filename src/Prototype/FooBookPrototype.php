<?php

namespace Prototype;

use Prototype\BookPrototype;

class FooBookPrototype extends BookPrototype
{
    protected string $category = 'Foo';

    public function __clone()
    {
    }
}