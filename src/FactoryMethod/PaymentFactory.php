<?php

namespace FactoryMethod;

class PaymentFactory
{
    public function createPayment(string $paymentMethod)
    {
        return match ($paymentMethod) {
            "Card"  => new Card(),
            "Bkash" => new Bkash(),
            "Nagad" => new Nagad(),
            default => throw new \Exception("Unknown payment method"),
        };
    }
}