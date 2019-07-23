<?php

namespace components;

/**
 * Class SlackCurl
 * @package components
 */
class SlackCurl
{
    /**
     * @var string
     */
    const URL = "https://hooks.slack.com/services/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";

    /**
     * @param string $dataString
     */
    public function sendCurl($dataString)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, self::URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($dataString))
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);

        curl_close($ch);
    }
}
