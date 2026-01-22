<?php

namespace AbstractFactory;

use AbstractFactory\PaymentProcessor;

class BkashPaymentProcessor implements PaymentProcessor
{
    public function pay(float $amount): string
    {
       return "Bkash: " . $amount;
    }
}