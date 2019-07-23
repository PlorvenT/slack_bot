<?php

use \components\Log\LoggerInterface;
use \components\Log\Logger;

class App
{
    private static $logger;

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
        if (self::$logger !== null){
            return self::$logger;
        }

        self::$logger = new Logger();

        return self::$logger;
    }

    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     * @return void
     */
    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }
}