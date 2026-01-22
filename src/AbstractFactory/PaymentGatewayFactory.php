<?php

namespace AbstractFactory;

/**
 * Abstract factory interface
 */
interface PaymentGatewayFactory
{
    public function createPaymentProcessor();
    public function createRefundProcessor();
}