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
    /**
     * sets the title.
     * @param string $title page title
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
        $data = new delete_control\DeleteController();
        echo $data->deleteUser();
    }

    /**
     * buildDisplay builds out the display and pushes it to the browser
     * @return null
     */
    public function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}
