<?php

namespace AbstractFactory;

interface RefundProcessor
{
    public function refund(string $transactionId, float $amount);
}