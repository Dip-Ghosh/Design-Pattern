<?php

declare(strict_types = 1);

use FactoryMethod\Bkash;
use FactoryMethod\Card;
use FactoryMethod\Nagad;
use FactoryMethod\PaymentFactory;
use FactoryMethod\PaymentService;

final class FactoryMethodTest extends TestCase
{
    public function test_it_creates_nagad_payment()
    {
        $paymentFactory = new PaymentFactory();
        $payment        = $paymentFactory->createPayment("Nagad");

        return Assert::true(
            $payment instanceof Nagad,
            "Expected instance of Nagad, got ".get_class($payment)
        );
    }

    public function test_it_creates_card_payment()
    {
        $paymentFactory = new PaymentFactory();
        $payment        = $paymentFactory->createPayment("Card");

        return Assert::true(
            $payment instanceof Card,
            "Expected instance of Card, got ".get_class($payment)
        );
    }

    public function test_it_creates_Bkash_payment()
    {
        $paymentFactory = new PaymentFactory();
        $payment        = $paymentFactory->createPayment("Bkash");

        return Assert::true(
            $payment instanceof Bkash,
            "Expected instance of Bkash, got ".get_class($payment)
        );
    }

    public function test_it_throw_exception_for_invalid_method()
    {
        $paymentFactory = new PaymentFactory();

        try {
            $payment = $paymentFactory->createPayment("paypall");

            return Assert::true(
                false,
                "Expected exception was not thrown"
            );
        } catch (\Exception $e) {
            return Assert::true(
                $e->getMessage() === "Unknown payment method",
                "Expected 'Unknown payment method', got '{$e->getMessage()}'"
            );
        }
    }

    public function test_it_create_card_payment_with_amount()
    {
        $paymentService = new PaymentService();

        ob_start();
        $paymentService->makePayment("Card", 10);

        $output = ob_get_clean();

        return Assert::true(
            trim($output) === "10 taka has been paid using Card",
            "Expected '10 taka has been paid using Card', got '{$output}'"

        );
    }
}
