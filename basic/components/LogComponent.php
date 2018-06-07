<?php

namespace components;


class LogComponent
{
    public static $fName = 'app.log';

    public static function add($data)
    {
        $prefix = (new \DateTime('now'))->format('Y-m-d H:i:s') . ' ';
        if (file_exists(self::$fName)){
            if (is_writable(self::$fName)) {
                if (!$fp = fopen(self::$fName, 'a')) {
                    exit;
                }

                if (is_array($data)){
                    fwrite($fp, $prefix . print_r($data, true));
                } else {
                    fwrite($fp, $prefix . $data);
                }
                fclose($fp);
            }
        } else {
            $fp = fopen(self::$fName, "w");
            if (is_array($data)){
                fwrite($fp, $prefix . print_r($data, true));
            } else {
                fwrite($fp,  $prefix .$data);
            }
            fclose($fp);
        }
    }

    public function clear()
    {
        if (file_exists(self::$fName)){
            unlink(self::$fName);
        }
    }
}