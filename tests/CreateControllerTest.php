<?php

/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
require_once './controllers/CreateController.php';
require_once './models/ReadData.Class.php';

class CreateControllerTest extends PHPUnit_Framework_TestCase
{
    public function createTest()
    {
        $control = new create_control\CreateController;
        $control->actionLogic();
    }
}
