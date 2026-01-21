<?php

namespace FactoryMethod;

class PaymentService
{
    public function makePayment(string $paymentMethod, float $amount)
    {
        $paymentFactory = new PaymentFactory();
        $payment        = $paymentFactory->createPayment($paymentMethod);

        $payment->pay($amount);
    }

}