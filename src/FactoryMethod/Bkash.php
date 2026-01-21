<?php

namespace FactoryMethod;
use FactoryMethod\Payment;

class Bkash implements Payment
{
    public function pay(float $amount)
    {
        echo $amount . " taka has been paid using with Bkash";
    }
}