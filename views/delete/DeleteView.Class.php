<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/View.Class.php';
require './controllers/DeleteController.php';
class DeleteView extends View
{

    function __construct($title)
    {
        parent::__construct($title);
    }

    function contentBuild()
    {
        $data = new DeleteController();
        echo $data->deleteUser();
    }

    function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}

?>