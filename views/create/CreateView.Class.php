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
    /**
     * calls View __construct and passes title.
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
        $data = new create_control\CreateController();
        echo $data->actionLogic();
    }

    /**
     * buildDisplay creates the entire view and echos it to the browser
     * @return null
     */
    public function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}
