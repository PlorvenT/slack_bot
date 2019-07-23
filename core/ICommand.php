<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 06.06.2018
 * Time: 10:23
 */

namespace core;

/**
 * Interface ICommand
 * @package core
 */
interface ICommand
{
    /**
     * This method run command.
     *
     * @param string $textCommand
     * @return mixed
     */
    public function run($textCommand);
}
