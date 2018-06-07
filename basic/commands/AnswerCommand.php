<?php

namespace commands;

use basic\SlackBot;
use components\LogComponent;
use core\BaseCommand;
use helper\QuestionAnswerHelper as QAHelper;

class AnswerCommand extends BaseCommand
{
    public function run($textAnswer)
    {
        //add to log any data from slack
        $slackBot = SlackBot::getInstance();
        if ($slackBot->receiveData){
            LogComponent::add($slackBot->receiveData);
        }

        if (QAHelper::checkAnswer($textAnswer)){
            $this->slackCurl->sendCurl(json_encode(["text" => 'WOW you answer correct.']));
        }
    }
}