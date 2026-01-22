<?php

namespace AbstractFactory;

interface PaymentProcessor
{
    public function pay(float $amount);
}