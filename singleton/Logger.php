<?php

class Logger extends Singleton
{


    private $fileHandle;

    protected function __construct()
    {
        $this->fileHandle = fopen('php://stdout', 'w');
    }


    public function writeLog($message)
    {
        $date = date('Y-m-d');

        fwrite($this->fileHandle, "$date: $message\n");
    }


    public static function log( $message)
    {
        $logger = Singleton::getInstance();

        $logger->writeLog($message);
    }
}