<?php

namespace core;

use components\SlackCurl;
use helper\CommandHelper;

/**
 * Class BaseCommand
 * @package core
 */
abstract class BaseCommand implements ICommand
{
    /**
     * @var SlackCurl
     */
    protected $slackCurl;

    /**
     * BaseCommand constructor.
     * @param SlackCurl $slackCurl
     */
    public function __construct(SlackCurl $slackCurl)
    {
        $this->slackCurl = $slackCurl;
    }

    /**
     * This method run command.
     *
     * @param string $textCommand
     * @return mixed
     */
    public function run($textCommand)
    {
        $this->slackCurl->sendCurl(json_encode(['text' => CommandHelper::$availableCommand[$textCommand]]));

        return;
    }
}
