<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace index_control;

use \read_data as read_data;
use \html_control as html_control;

require 'HtmlController.php';
require './models/ReadData.Class.php';
class IndexController
{
    private $html;

    public function __construct()
    {
        $this->html = new html_control\HtmlController;
    }

    /**
     * dashboard echos a parsed data set for the main index.php page.
     * @return null
     */
    public function mainView()
    {
        // Fetch all the users from the DB
        $data = new read_data\ReadData();
        $results = $data->getAllData();
        // build out the results in a table
        $results = json_decode($results);
        $this->html->mainViewHTML($results);

    }
}
