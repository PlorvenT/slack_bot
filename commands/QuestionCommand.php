<?php

namespace commands;

use core\BaseCommand;
use helper\QuestionAnswerHelper as QAHelper;

class QuestionCommand extends BaseCommand
{

    public function run($textCommand)
    {
        $askedQuestion = QAHelper::getAskedQuestion();

        //if asked question return this question else ask new question
        if ($askedQuestion){
            $this->slackCurl->sendCurl(json_encode(["text" => $askedQuestion]));
        } else {
            $textQuestion = QAHelper::saveAskedQuestion();
            $this->slackCurl->sendCurl(json_encode(["text" => $textQuestion]));
        }
    }
}