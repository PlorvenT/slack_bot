<?php

namespace basic;

class SlackBot
{
    public $receiveData;

    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null){
            self::$instance = new SlackBot();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone() {}
}