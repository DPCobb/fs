<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './models/ReadData.Class.php';
class ReadController
{
    public $data;

    function __construct()
    {
        $this->data = new ReadData();
    }

    function buildDashboard($data)
    {
        if($data != 0)
        {
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
            foreach($data as $row) {
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
        }
        else
        {
            echo '</tbody></table>';
            echo '<h2>Not a valid User ID</h2>';
        }

    }

    function dashboard()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            $results = $this->data->getData($userId);
            if(empty($results)){
                $results = 0;
            }

        } else {
            $results = $this->data->getAllData();
        }
        $this->buildDashboard($results);
    }

}
?>
