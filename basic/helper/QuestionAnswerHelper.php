<?php

namespace helper;


class QuestionAnswerHelper
{
    public static $storageFileName = 'text.txt';

    public static $questionList = [
        [
            'question' => '2+2=?',
            'answer' => '4',
        ],
        [
            'question' => '2+3=?',
            'answer' => '5',
        ],
        [
            'question' => '2+4=?',
            'answer' => '6',
        ],
        [
            'question' => '2+5=?',
            'answer' => '7',
        ],
        [
            'question' => '2+6=?',
            'answer' => '8',
        ],
        [
            'question' => '2+7=?',
            'answer' => '9',
        ],
    ];

    /**
     * Method return asked question if it set else return false
     *
     * @return bool|string
     */
    public static function getAskedQuestion()
    {
        if (!file_exists(self::$storageFileName)){
            return false;
        }

        $fileContent = file_get_contents(self::$storageFileName, FILE_USE_INCLUDE_PATH);

        return $fileContent ? $fileContent : false;
    }

    /**
     * Method check if answer for question is correct
     *
     * @param $answer string text answer
     * @return bool
     */
    public static function checkAnswer($answer)
    {
        $askedQuestion = self::getAskedQuestion();
        if (!$askedQuestion){
            return false;
        }

        foreach (self::$questionList as $key => $value)
        {
            if (isset($value['question'])
                && $value['question'] == $askedQuestion
                && $value['answer'] == $answer){
                unlink(self::$storageFileName);

                return true;
            }
        }

        return false;
    }

    /**
     * Method pick random question save it and return
     *
     * @return string asked
     */
    public static function saveAskedQuestion()
    {
        $randomIndex = rand(0 , count(self::$questionList));
        $questionText = self::$questionList[$randomIndex]['question'];

        $fp = fopen(self::$storageFileName, "w");
        fwrite($fp, print_r($questionText, true));
        fclose($fp);

        return $questionText;
    }
}