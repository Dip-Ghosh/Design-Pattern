<?php

namespace AbstractFactory;

use AbstractFactory\PaymentProcessor;

class CardPaymentProcessor implements PaymentProcessor
{
    public function pay(float $amount)
    {
       return "Card:". $amount;
    }
}