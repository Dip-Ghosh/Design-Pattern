<?php

class Singleton
{

    private static $instance = [];

    private function __construct() { }

    private function __clone() {}

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        $instances = self::$instance;

        if (!isset($instances)) {
            $instances = new self();
        }

        return $instances;
    }


}