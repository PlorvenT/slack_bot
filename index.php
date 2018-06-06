<?php
require(__DIR__ . '/core/BaseEvent.php');
require(__DIR__ . '/core/ICommand.php');
require(__DIR__ . '/core/BaseCommand.php');
require(__DIR__ . '/commands/CmdCommand.php');
require(__DIR__ . '/commands/QuestionCommand.php');
require(__DIR__ . '/commands/AnswerCommand.php');
require(__DIR__ . '/components/SlackCurl.php');
require(__DIR__ . '/helper/QuestionAnswerHelper.php');
require(__DIR__ . '/events/MessageEvent.php');
require(__DIR__ . '/helper/CommandHelper.php');

use helper\CommandHelper;
use core\BaseEvent;

$json = file_get_contents('php://input');
$values = json_decode($json, true);

if (!empty($values) && isset($values['challenge'])){
    $challenge = $values['challenge'];
    header("HTTP/1.1 200 OK");
    header("Content-type: application/json");
    echo json_encode(['challenge' => $challenge]);
}

if (isset($values['event']['type'])){
    $eventType = $values['event']['type'];
    if (isset(CommandHelper::$eventsList[$eventType])){
        $eventClassName = CommandHelper::$eventsList[$eventType];
        /** @var BaseEvent $event */
        $event = new $eventClassName();
        $event->process($values);
    }
}

