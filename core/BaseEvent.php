<?php

namespace core;


abstract class BaseEvent
{
    const TYPE_BOT_MESSAGE = 'bot_message';

    public function process($values)
    {

    }
}