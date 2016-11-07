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

require './models/UpdateData.Class.php';
require './models/ReadData.Class.php';

class UpdateController
{
    protected $id;

    /**
     * Sets the value of id.
     */
    public function __construct()
    {
        $this->id = $_GET['id'];
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
        foreach ($results as $row) {
            return '
            <form method="POST" action="index.php?p=update&id=' . $this->id . '&action=updateuser">
                <label for="email">Email</label>
                <input type="text" value=' . $row['email'] . ' name="email" id="email"/>
                <label for="first">Firstname</label>
                <input type="text" value=' . $row['firstname'] . ' name="first" id="first"/>
                <label for="last">Lastname</label>
                <input type="text" value=' . $row['lastname'] . ' name="last" id="last"/>
                <label for="pass">Password</label>
                <input type="text" value=' . $row['password'] . ' name="pass" id="pass"/>
                <input type="submit" value="Update User"/>
            </form>
            ';
        }
    }

    /**
     * updateUser decides either to update a user or build the update form.
     * @return mixed succes msg, error msg, or update form
     */
    private function updateUser()
    {
        // if action is set and === updateuser
        if (isset($_GET['action'])) {
            if ($_GET['action'] === 'updateuser') {
                // set value of userid
                $userid = $_GET['id'];
                // pass userid to UpdateData
                $data = new update_data\UpdateData($userid);
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
                // action is not updateuser
                return $this->getUser();
            }
        } else {
            // no action set
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
        if (isset($_GET['action'])) {
            // call updateUser and add changes to db
            $dataOut = $this->updateUser();
        } else {
            // get user info if action is not set
            $dataOut = $this->getUser();
        }
        // return dataOut
        return $dataOut;
    }
}
