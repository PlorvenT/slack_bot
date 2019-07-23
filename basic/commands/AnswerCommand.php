<?php

namespace commands;

use core\BaseCommand;
use helper\QuestionAnswerHelper as QAHelper;

/**
 * Class AnswerCommand.
 * This class implements answer for question.
 * @package commands
 */
class AnswerCommand extends BaseCommand
{
    /**
     * This method checks answer. If it correct send congrats message to slack channel
     *
     * @param string $textAnswer
     * @return mixed|void
     */
    public function run($textAnswer)
    {
        if (QAHelper::checkAnswer($textAnswer)){
            $this->slackCurl->sendCurl(json_encode(['text' => 'WOW you answer correct.']));
        }
    }
}