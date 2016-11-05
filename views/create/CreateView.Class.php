<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/View.Class.php';
require './controllers/CreateController.php';

class CreateView extends View
{

    function __construct($title)
    {
        parent::__construct($title);
    }

    function contentBuild()
    {
        $data = new create_control\CreateController();
        echo $data->actionLogic();
    }

    function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}

?>