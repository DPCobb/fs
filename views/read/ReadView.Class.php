<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/View.Class.php';
require './controllers/ReadController.php';

class ReadView extends View
{

    function __construct($title)
    {
        parent::__construct($title);
    }

    function contentBuild()
    {
        $data = new read_control\ReadController();
        echo $data->dashboard();
    }

    function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}

?>