<?php
namespace helper;

use commands\CmdCommand;
use commands\QuestionCommand;
use events\MessageEvent;

class CommandHelper
{
    /**
     * Event list that App can proccess
     *
     * @var array
     */
    public static $eventsList = [
        'message' => MessageEvent::class,
    ];

    /**
     * @var array
     */
    public static $availableCommand = [
        '!cmd' => 'Available commands: !cmd, !question',
        '!question' => 'Programmer noob and did nor write code for this',
    ];

    /**
     * @var array
     */
    public static $commandClass = [
      '!cmd' => CmdCommand::class,
      '!question' => QuestionCommand::class,
    ];
}