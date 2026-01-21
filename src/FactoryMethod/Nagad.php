<?php

namespace FactoryMethod;
use FactoryMethod\Payment;

class Nagad implements Payment
{
    public function pay(float $amount)
    {
        echo $amount . " taka has been paid using Nagad";
    }
}