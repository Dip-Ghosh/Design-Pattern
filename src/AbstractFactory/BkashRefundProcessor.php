<?php

namespace AbstractFactory;

use AbstractFactory\RefundProcessor;

class BkashRefundProcessor implements RefundProcessor
{
    public function refund(string$transactionId, float $amount)
    {
        return "Bkash Refunded" .$amount . "for transaction" . $transactionId;
    }
}