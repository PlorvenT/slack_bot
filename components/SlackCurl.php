<?php

namespace components;


class SlackCurl
{
    const URL = "https://hooks.slack.com/services/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";

    private $ch;

    public function __construct()
    {
        $this->ch = curl_init();
    }

    public function sendCurl($data_string)
    {
        curl_setopt($this->ch, CURLOPT_URL, self::URL);
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($this->ch);
        curl_close($this->ch);
    }
}