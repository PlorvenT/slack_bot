<?php
namespace helper;

use commands\CmdCommand;
use commands\QuestionCommand;
use events\MessageEvent;

class CommandHelper
{
    public static $eventsList = [
        'message' => MessageEvent::class,
    ];

    public static $availableCommand = [
        '!cmd' => 'Available commands: !cmd, !question',
        '!question' => 'Programmer noob and did nor write code for this',
    ];

    public static $commandClass = [
      '!cmd' => CmdCommand::class,
      '!question' => QuestionCommand::class,
    ];
}