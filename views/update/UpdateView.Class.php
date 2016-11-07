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
    /**
     * set the page title
     * @param string $title sets the page title
     */
    public function __construct($title)
    {
        parent::__construct($title);
    }

    /**
     * contentBuild builds the main content for the view.
     * @return null
     */
    public function contentBuild()
    {
        $data = new update_control\UpdateController();
        echo $data->updateLogic();
    }

    /**
     * buildDisplay builds the view
     * @return null
     */
    public function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}
