<?php

class FanController extends Controller
{

    protected $simpleFactory;

    public function __construct(SimpleFactory $simpleFactory)
    {
        $this->simpleFactory = $simpleFactory;

    }

    public function createFan()
    {
        $type = "table";
        $fanType  = $this->simpleFactory->createFan($type);
        $fanType->switchOn();
        $fanType->switchOff();

    }
}