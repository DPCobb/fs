<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './models/ReadData.Class.php';
class IndexController
{
    function __construct()
    {

    }

    function dashboard(){
        $data = new ReadData();
        $results = $data->getAllData();
        echo'
        <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Remove Entry</th>
        </tr>
        </thead>
        <tbody>';
        foreach($results as $row) {
            echo '
            <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['firstname'] . '</td>
                <td>' . $row['lastname'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['password'] . '</td>
                <td><a class="button" href="index.php?p=delete&id=' . $row['id'] . '">Delete</a></td>
            </tr>
            ';
        }
        echo '</tbody></table>';
    }

}
?>
