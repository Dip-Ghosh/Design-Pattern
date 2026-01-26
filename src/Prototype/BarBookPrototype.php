<?php

namespace Prototype;

use Prototype\BookPrototype;

class BarBookPrototype extends BookPrototype
{
    protected string $category = 'Bar';

    public function __clone()
    {
    }
}