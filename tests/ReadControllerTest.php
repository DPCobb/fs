<?php

/**
 * Created by PhpStorm.
 * User: danielcobb
 * Date: 11/7/16
 * Time: 7:25 PM
 */
require './controllers/ReadController.php';
require_once './models/ReadData.Class.php';

use \read_data as read_data;

class ReadControllerTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $stub = $this->getMockBuilder('ReadData')->getMock();
        $stub->method('getData')->willReturn('none');
        $control = new read_control\ReadController;
        $_GET['id'] = '1';
        $control->dashboard();
    }
}
