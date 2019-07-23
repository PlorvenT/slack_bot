<?php

namespace commands;

use core\BaseCommand;
use helper\QuestionAnswerHelper as QAHelper;

/**
 * Class QuestionCommand
 * This class implements command "!question". Get question that bot asked and show in in slack channel.
 * @package commands
 */
class QuestionCommand extends BaseCommand
{
    /**
     * @param string $textCommand
     * @return mixed|void
     */
    public function run($textCommand)
    {
        $askedQuestion = QAHelper::getAskedQuestion();

        //if asked question return this question else ask new question
        if ($askedQuestion){
            $this->slackCurl->sendCurl(json_encode(['text' => $askedQuestion]));
        } else {
            $textQuestion = QAHelper::saveAskedQuestion();
            $this->slackCurl->sendCurl(json_encode(['text' => $textQuestion]));
        }
    }
}