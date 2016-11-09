<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

namespace create_control;

use \create_data as create_data;
use \html_control as html_control;

require 'HtmlController.php';
require './models/CreateData.Class.php';

class CreateController
{
    private $html;
    public $output;

    public function __construct()
    {
        $this->html = new html_control\HtmlController;
    }

    /**
     * actionLogic looks to see if url param action is equal to add and if it
     * does than it instantiates CreateData and calls createData method.
     * @return string returns either a success message, error, or the add user
     * form
     */
    public function actionLogic()
    {
        // if action is set and equals add
        if (isset($_GET['action']) && $_GET['action'] === 'add') {
            // instantiate CreateData
            $data = new create_data\CreateData;
            // set result equal to createData method
            $result = $data->createData();
            // if the result is not 0 output = success message / else error
            if ($result != 0) {
                $this->output = '<h2>User Added</h2>
                <a class="button" href="index.php">Home</a>
                ';
            } else {
                $this->output = 'Something went wrong!';
            }
        } else {
            // if acton isn't === add build the add form
            $this->output = $this->html->createViewHtml();
        }
        // return the value of output
        return $this->output;
    }
}
