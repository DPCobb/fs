<?php

/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
require_once './controllers/ReadController.php';
//require './controllers/MainController.php';
require_once './models/ReadData.Class.php';


class ReadControllerTest extends PHPUnit_Framework_TestCase
{
    public function readTest()
    {
        $control = new read_control\ReadController;
        $_GET['id'] = '1';
        $control->dashboard();
    }
}
