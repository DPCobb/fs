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

    function __construct()
    {
        $this->id = $_GET['id'];
    }

    function getUser()
    {
        $fetchData = new read_data\ReadData();
        $results = $fetchData->getData($this->id);
        foreach($results as $row) {
            echo'
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

    function updateUser()
    {
        if(isset($_GET['action'])) {
            if($_GET['action'] === 'updateuser') {
                $userid = $_GET['id'];
                $data = new update_data\UpdateData($userid);
                $result = $data->updateUser();
                if ($result != 0 ) {
                    echo '<h2>User Updated</h2>
                    <a class="button" href="index.php">Home</a>
                    ';
                }
                else {
                    echo 'Something went wrong!';
                }
            }
            else{
                echo $this->getUser();
            }
        }
        else{
            echo $this->getUser();
        }

    }
    function updateLogic()
    {
        if(isset($_GET['action'])) {
            $this->updateUser();
        }
        else {
            $this->getUser();
        }
    }
}
?>