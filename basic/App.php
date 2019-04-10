<?php

use \components\Log\LoggerInterface;
use \components\Log\Logger;

class App
{
    private static $_logger;

    public function __construct($config)
    {

    }


    /**
     * @return string
     */
    public static function getVersion()
    {
        return '0.0.1';
    }

    /**
     * @param mixed $message
     */
    public static function warning($message)
    {
        static::getLogger()->warning($message);
    }

    /**
     * @param mixed $message
     */
    public static function debug($message)
    {
        static::getLogger()->debug($message);
    }

    /**
     * @return Logger
     */
    public static function getLogger()
    {
        if (self::$_logger !== null){
            return self::$_logger;
        }

        self::$_logger = new Logger();

        return self::$_logger;
    }

    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     * @return void
     */
    public static function setLogger(LoggerInterface $logger)
    {
        self::$_logger = $logger;
    }
}