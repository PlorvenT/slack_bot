<?php
namespace events;

use commands\AnswerCommand;
use components\LogComponent;
use core\BaseCommand;
use core\BaseEvent;
use helper\CommandHelper;

class MessageEvent extends BaseEvent
{
    public function process($values)
    {
        if ($this->isBotMessage($values)){
            return;
        }

        //add to log any data from slack
        if ($values){
            LogComponent::add($values);
        }

        if (!empty($values) && isset($values['event']['text'])) {
            //remove to user from message
            $message = $values['event']['text'];
            $message = preg_replace('/<@.*?> ?/', '', $message);

            //simple processing input user text TODO: improve that
            if (isset(CommandHelper::$availableCommand[$message])){
                $commandClassName = CommandHelper::$commandClass[$message];
                /** @var BaseCommand $command */
                $command = new $commandClassName();
                $command->run($message);
            } else {
                $answerCommand = new AnswerCommand();
                $answerCommand->run($message);
            }
        }
    }

    /**
     * Method check if message from boot
     *
     * @param $values array data from slack event
     * @return bool
     */
    public function isBotMessage($values)
    {
        if (isset($values['event']['subtype']) && $values['event']['subtype'] === self::TYPE_BOT_MESSAGE){
            return true;
        }

        return false;
    }
}