<?php

class PayByDebitCard implements Payable
{
    public function pay($amount)
    {
        echo "Paid by debit card $amount";
    }
}