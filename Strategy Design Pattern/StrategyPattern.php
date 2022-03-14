<?php
/**
 * suppose we need to implement a payment processors with a couple of different payment methods like
 * credit card, debit card, mobile banking, cash etc.
 * For this we need to implement a strategy pattern.
 * In this pattern, we have a class which defines the interface for a family of algorithms,
 * and also lets the algorithm vary independently of clients that use it.
 * For implementing the strategy pattern we need to create an interface and this interface and implements the algorithm.
 */

interface PaymentProcessor
{
    public function pay($amount);
}

/**
 * this function will implement the payment processor
 */

class PayByCreditCard implements PaymentProcessor
{
    public function pay($amount)
    {
        echo "Paid by credit card $amount";
    }
}

/**
 * this function will implement the payment processor
 */

class PayByDebitCard implements PaymentProcessor
{
    public function pay($amount)
    {
        echo "Paid by debit card $amount";
    }
}

/**
 * Payment controller
 */

class PaymentController extends Controller
{
    protected $paymentProcessor;
    protected $paymentStrategy;

    public function __construct(PaymentProcessor $paymentProcessor, PaymentStrategy $paymentStrategy)
    {
        $this->paymentProcessor = $paymentProcessor;
        $this->paymentStrategy = $paymentStrategy;
    }

    public function pay($method, $amount)
    {
        $strategy = $this->paymentStrategy->payByStrategy($method);
        return $strategy->$this->paymentProcessor->pay($amount);
    }
}

/**
 * THis class is responsible for the payment strategy
 */

class PaymentStrategy
{
    public function payByStrategy($method)
    {
        if ($method == 'credit') {
            return new PayByCreditCard();
        }
        if ($method == 'debit') {
            return new PayByDebitCard();
        }
    }
}


