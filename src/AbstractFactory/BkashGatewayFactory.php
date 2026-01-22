<?php

namespace AbstractFactory;

use AbstractFactory\PaymentGatewayFactory;

class BkashGatewayFactory implements PaymentGatewayFactory
{

    public function createPaymentProcessor(): BkashPaymentProcessor
    {
        return new BkashPaymentProcessor();
    }

    public function createRefundProcessor(): BkashRefundProcessor
    {
        return new BkashRefundProcessor();
    }
}