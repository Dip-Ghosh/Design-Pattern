<?php

class PayByCreditCard implements Payable
{

    public function pay($amount)
    {
        echo "Paid by credit card $amount";
    }
}