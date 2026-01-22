<?php

namespace AbstractFactory;

use AbstractFactory\RefundProcessor;

class CardRefundProcessor implements RefundProcessor
{
    public function refund(string$transactionId, float $amount)
    {
        return "Card Refunded" .$amount . "for transaction" . $transactionId;
    }
}