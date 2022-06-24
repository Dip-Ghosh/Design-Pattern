<?php

class MessageSendController extends Controller
{
    protected $msg;
    protected $notify;

    public function __construct(SendAbleMessage $msg, NotificationStrategy $notify)
    {
        $this->msg = $msg;
        $this->notify = $notify;
    }

    public function payAmount($method, $msg)
    {
        $strategy = $this->notify->sendByStrategy($method);
        return $strategy->$this->msg->sendNotification($msg);
    }


}