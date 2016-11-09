<?php
/**
 * Created by PhpStorm.
 * User: danielcobb
 * Date: 11/5/16
 * Time: 9:08 PM
 */

namespace update_control;

use \update_data as update_data;
use \read_data as read_data;
use \html_control as html_control;

require 'HtmlController.php';
require './models/UpdateData.Class.php';
require './models/ReadData.Class.php';

class UpdateController
{
    private $id;
    public $html;

    /**
     * Sets the value of id.
     */
    public function __construct()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->id = $_GET['id'];
        }
        $this->html = new html_control\HtmlController;
    }

    /**
     * Get user builds and displays the update user form.
     * @return string
     */
    private function getUser()
    {
        // instantiate ReadData and fetch data by id
        $fetchData = new read_data\ReadData();
        $results = $fetchData->getData($this->id);
        // build the update form to return
        $this->html->updateViewHtml($results, $this->id);
    }

    /**
     * updateUser decides either to update a user or build the update form.
     * @return mixed succes msg, error msg, or update form
     */
    private function updateUser()
    {
        // if action is set and === updateuser
        if (isset($_GET['action']) && $_GET['action'] === 'updateuser') {
            // pass id to UpdateData
            $data = new update_data\UpdateData($this->id);
            // set result to returned value of updateUser method
            $result = $data->updateUser();
            // if result is not equal to 0
            if ($result != 0) {
                return '<h2>User Updated</h2>
                <a class="button" href="index.php">Home</a>
                ';
            } else {
                // user id does not exist
                return 'Something went wrong!';
            }
        } else {
            // no action set or does not equal updateuser
            return $this->getUser();
        }
    }

    /**
     * updateLogic is basically a traffic router that looks for an action.
     * @return $dataout returns a returned value from one of two methods
     */
    public function updateLogic()
    {
        $dataOut;
        // if action is set
        if (isset($_GET['action']) && $_GET['action'] === 'updateuser') {
            // call updateUser and add changes to db
            $dataOut = $this->updateUser();
        } else {
            // get user info if action is not set or does not equal
            $dataOut = $this->getUser();
        }
        // return dataOut
        return $dataOut;
    }
}
