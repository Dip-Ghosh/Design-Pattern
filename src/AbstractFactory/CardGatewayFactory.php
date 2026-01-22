<?php

namespace AbstractFactory;

use AbstractFactory\PaymentGatewayFactory;

class CardGatewayFactory implements PaymentGatewayFactory
{

    public function createPaymentProcessor(): CardPaymentProcessor
    {
        return new CardPaymentProcessor();
    }

    public function createRefundProcessor(): CardRefundProcessor
    {
        return new CardRefundProcessor();
    }
}