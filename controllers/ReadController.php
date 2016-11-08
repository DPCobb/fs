<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace read_control;

use \read_data as read_data;

require './models/ReadData.Class.php';

class ReadController
{
    private $data;

    /**
     * Assigns the value of data var to new instance of ReadData.
     */
    public function __construct()
    {
        $this->data = new read_data\ReadData;
    }

    /**
     * buildDashboard builds out the table of users.
     * @param  array $data data set of users from db
     * @return null
     */
    private function buildDashboard($data)
    {
        // if data does not equal 0 than parse the data
        if ($data != 0) {
            echo'
            <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Update Entry</th>
                <th>Remove Entry</th>
            </tr>
            </thead>
            <tbody>';
            // use foreach loop to parse data set
            foreach ($data as $row) {
                echo '
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['password'] . '</td>
                    <td><a class="button" href="index.php?p=update&id=' . $row['id'] . '">Update</a></td>
                    <td><a class="button" href="index.php?p=delete&id=' . $row['id'] . '">Delete</a></td>
                </tr>
                ';
            }
            echo '</tbody></table>';
        } else {
            // if data does equal 0 echo failure
            echo '<h2>Not a valid User ID</h2>';
        }
    }

    /**
     * dashboard decides which method to call from ReadData.Class.
     * @return null
     */
    public function dashboard()
    {
        // if id is set in the url and not empty
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            // userId equals url param id
            $userId = $_GET['id'];
            // pass user id to getData method
            $results = $this->data->getData($userId);
            // if results are empty, results = 0
            if (empty($results)) {
                $results = 0;
            }
        } else {
            // if id wasn't set then getAllData called
            $results = $this->data->getAllData();
        }
        // send results to buildDashboard
        $this->buildDashboard($results);
    }
}
