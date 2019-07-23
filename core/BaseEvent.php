<?php

namespace core;

/**
 * Class BaseEvent
 * @package core
 */
abstract class BaseEvent
{
    /**
     * @var string
     */
    const TYPE_BOT_MESSAGE = 'bot_message';

    /**
     * @param $values
     */
    abstract public function process($values);
}