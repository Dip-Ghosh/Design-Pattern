<?php
 use StrategyPattern\SendMessage;
Class SendThroughEmail implements Sendable
{
    public function sendNotification()
    {
        echo "Sending through email";
    }
}