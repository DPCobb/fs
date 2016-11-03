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
        </tr>
        </thead>
        <tbody>';
        foreach($results as $row) {
            echo '
            <tr>
                <td>ID : ' . $row['id'] . '</td>
                <td>First Name : ' . $row['firstname'] . '</td>
                <td>Last Name : ' . $row['lastname'] . '</td>
                <td>Email : ' . $row['email'] . '</td>
                <td>Password : ' . $row['password'] . '</td>
            </tr>
            ';
        }
        echo '</tbody></table>';
    }

}
?>
