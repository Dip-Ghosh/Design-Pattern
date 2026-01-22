<?php

declare(strict_types=1);

use AbstractFactory\BkashGatewayFactory;
use AbstractFactory\BkashPaymentProcessor;
use AbstractFactory\CardGatewayFactory;
use AbstractFactory\CardPaymentProcessor;
use FactoryMethod\Bkash;
use FactoryMethod\Card;
use FactoryMethod\Nagad;
use FactoryMethod\PaymentFactory;
use FactoryMethod\PaymentService;

final class AbstractFactoryTest extends TestCase
{
    public function test_it_creates_bkash_payment()
    {
        $factory   = new BkashGatewayFactory();
        $processor = $factory->createPaymentProcessor();

        return Assert::true(
            $processor instanceof BkashPaymentProcessor,
            "Expected instance of Bkash, got ".get_class($processor)
        );
    }

    public function test_it_creates_card_payment()
    {
        $factory   = new CardGatewayFactory();
        $processor = $factory->createPaymentProcessor();

        return Assert::true(
            $processor instanceof CardPaymentProcessor,
            "Expected instance of Card, got ".get_class($processor)
        );
    }
}
