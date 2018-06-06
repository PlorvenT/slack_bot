<?php

namespace core;

use components\SlackCurl;
use helper\CommandHelper;

class BaseCommand implements ICommand
{
    public $slackCurl;

    public function __construct()
    {
        $this->slackCurl = new SlackCurl();
    }

    public function run($textCommand)
    {
        $this->slackCurl->sendCurl(json_encode(["text" => CommandHelper::$availableCommand[$textCommand]]));
    }
}