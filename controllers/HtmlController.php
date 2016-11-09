<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace html_control;

class HtmlController
{
    /**
     * dashboard echos a parsed data set for the main index.php page.
     * @return null
     */
    public function mainViewHTML($results)
    {
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
        echo '</tbody></table><a class="button" href="index.php?p=create">Add User</a>';
    }

    public function readViewHTML($results)
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
        // use foreach loop to parse data set
        foreach ($results as $row) {
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
}
