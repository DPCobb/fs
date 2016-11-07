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
    /**
     * set the page title
     * @param string $title set the title of the page
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
        $data = new read_control\ReadController();
        echo $data->dashboard();
    }

    /**
     * buildDisplay builds out the view
     * @return null
     */
    public function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}
