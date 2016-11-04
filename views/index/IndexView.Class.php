<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/View.Class.php';
require './controllers/IndexController.php';

class IndexView extends View
{

    function __construct($title)
    {
        parent::__construct($title);
    }

    function contentBuild()
    {
        $data = new index_control\IndexController();
        echo $data->dashboard();
    }

    function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}

?>