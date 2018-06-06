<?php

namespace commands;

use core\BaseCommand;
use helper\QuestionAnswerHelper as QAHelper;

class AnswerCommand extends BaseCommand
{
    public function run($textAnswer)
    {
        if (QAHelper::checkAnswer($textAnswer)){
            $this->slackCurl->sendCurl(json_encode(["text" => 'WOW you answer correct.']));
        }
    }
}