<?php

class PaymentController extends controller
{
    protected $paymentProcessor;
    protected $paymentStrategy;

    public function __construct(Payable $paymentProcessor, PaymentStrategy $paymentStrategy)
    {
        $this->paymentProcessor = $paymentProcessor;
        $this->paymentStrategy = $paymentStrategy;
    }

    public function payAmount($method, $amount)
    {
        $strategy = $this->paymentStrategy->payByStrategy($method);
        return $strategy->$this->paymentProcessor->pay($amount);
    }

}