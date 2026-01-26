<?php

namespace AbstractFactory;

class CheckoutService
{
    private PaymentProcessor $payment;
    private RefundProcessor  $refund;

    public function __construct(PaymentGatewayFactory $factory)
    {
        $this->payment = $factory->createPaymentProcessor();
        $this->refund  = $factory->createRefundProcessor();
    }

    public function checkout(float $amount): void
    {
        echo $this->payment->pay($amount);
    }

    public function refund(string $transactionId, float $amount): void
    {
        echo $this->refund->refund($transactionId, $amount);
    }
}