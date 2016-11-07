<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace index_control;

use \read_data as read_data;

require './models/ReadData.Class.php';
class IndexController
{
    public function __construct()
    {
    }

    /**
     * dashboard echos a parsed data set for the main index.php page.
     * @return null
     */
    public function dashboard()
    {
        // Fetch all the users from the DB
        $data = new read_data\ReadData();
        $results = $data->getAllData();
        // echo out the results in a table
        echo '
        <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>View</th>
            <th>Update Entry</th>
            <th>Remove Entry</th>
        </tr>
        </thead>
        <tbody>';
        // foreach parses returned data
        foreach ($results as $row) {
            echo '
            <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['firstname'] . '</td>
                <td>' . $row['lastname'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['password'] . '</td>
                <td><a class="button" href="index.php?p=read&id=' . $row['id'] . '">View</a></td>
                <td><a class="button" href="index.php?p=update&id=' . $row['id'] . '">Update</a></td>
                <td><a class="button" href="index.php?p=delete&id=' . $row['id'] . '">Delete</a></td>
            </tr>
            ';
        }
        echo '</tbody></table>';
        echo '<a class="button" href="index.php?p=create">Add User</a>';
    }
}
