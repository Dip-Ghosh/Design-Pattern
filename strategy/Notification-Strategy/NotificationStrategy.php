<?php
Class NotificationStrategy{

    public function sendByStrategy($strategy)
    {
        if ($strategy == 'email') {
            return new SendThroughEmail();
        }
        if ($strategy == 'sms') {
            return new SendThroughSms();
        }
        throw new Exception("Invalid strategy");


    }
}

