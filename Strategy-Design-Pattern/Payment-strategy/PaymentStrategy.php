<?php

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