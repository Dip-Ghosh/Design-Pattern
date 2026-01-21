<?php

namespace FactoryMethod;
use FactoryMethod\Payment;

class Card implements Payment
{
    public function pay(float $amount)
    {
        echo $amount . " taka has been paid using Card";
    }
}