<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 06.06.2018
 * Time: 10:23
 */

namespace core;


interface ICommand
{
    public function run($textCommand);
}