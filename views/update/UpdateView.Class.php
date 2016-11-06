<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/View.Class.php';
require './controllers/UpdateController.php';

class UpdateView extends View
{

    function __construct($title)
    {
        parent::__construct($title);
    }

    function contentBuild()
    {
        $data = new update_control\UpdateController();
        echo $data->updateLogic();
    }

    function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}

?>