<?php

class SimpleFactory
{

    public function createFan($fanType)
    {

        if($fanType == "ceiling") return  new CeilingFactory();

        else if($fanType == "exhaust") return new ExhaustFactory();

        else if($fanType == "table") return new TableFactory();
    }
}