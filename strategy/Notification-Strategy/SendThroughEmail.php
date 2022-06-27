<?php
 use StrategyPattern\SendMessage;
Class SendThroughEmail implements SendAbleMessage
{
    public function sendNotification()
    {
        echo "Sending through email";
    }
}