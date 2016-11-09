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
     * mainViewHTML echoes a parsed data set for the main index.php page.
     * @return null
     */
    public function mainViewHTML($results)
    {
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

    /**
     * readViewHTML builds out the table for ReadController.
     * @param  mixed $results array of results from db
     * @return null
     */
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

    /**
     * updateViewHtml creates the form for updating user info.
     * @param  mixed $results array of user details
     * @param  integer $id      user id
     * @return null
     */
    public function updateViewHtml($results, $id)
    {
        foreach ($results as $row) {
            echo '
            <form method="POST" action="index.php?p=update&id=' . $id . '&action=updateuser">
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
     * createViewHtml creates the new user form for CreateController.
     * @return string returns the form
     */
    public function createViewHtml()
    {
        return '
        <form method="post" action="index.php?p=create&action=add" id="newuser">
            <input type="text" name="first" id="firstname" placeholder="Enter your first name" required/>
            <input type="text" name="last" id="lastname" placeholder="Enter your last name" required/>
            <input type="email" name="email" id="email" placeholder="Enter your email" required/>
            <input type="text" name="password" id="pass" placeholder="Enter your password" required/>
            <input type="submit" value="Create"/>
        </form>
        ';
    }
}
