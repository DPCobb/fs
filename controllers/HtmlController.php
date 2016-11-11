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
        //parse data results
        $i = 0;
        while ($i < count($results)) {
            echo '
            <tr>
                <td>' . $results[$i]->id . '</td>
                <td>' . $results[$i]->firstname . '</td>
                <td>' . $results[$i]->lastname . '</td>
                <td>' . $results[$i]->email . '</td>
                <td>' . $results[$i]->password . '</td>
                <td><a class="button" href="index.php?p=read&id=' . $results[$i]->id . '">View</a></td>
                <td><a class="button" href="index.php?p=update&id=' . $results[$i]->id . '">Update</a></td>
                <td><a class="button" href="index.php?p=delete&id=' . $results[$i]->id . '">Delete</a></td>
            </tr>
            ';
            $i++;
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
        //parse data results
        $i = 0;
        while ($i < count($results)) {
            echo '
            <tr>
                <td>' . $results[$i]->id . '</td>
                <td>' . $results[$i]->firstname . '</td>
                <td>' . $results[$i]->lastname . '</td>
                <td>' . $results[$i]->email . '</td>
                <td>' . $results[$i]->password . '</td>
                <td><a class="button" href="index.php?p=update&id=' . $results[$i]->id . '">Update</a></td>
                <td><a class="button" href="index.php?p=delete&id=' . $results[$i]->id . '">Delete</a></td>
            </tr>
            ';
            $i++;
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
        //parse data results
        $i = 0;
        while ($i < count($results)) {
            echo '
            <form method="POST" action="index.php?p=update&id=' . $id . '&action=updateuser">
                <label for="email">Email</label>
                <input type="text" value=' . $results[$i]->email . ' name="email" id="email"/>
                <label for="first">Firstname</label>
                <input type="text" value=' . $results[$i]->firstname . ' name="first" id="first"/>
                <label for="last">Lastname</label>
                <input type="text" value=' . $results[$i]->lastname . ' name="last" id="last"/>
                <label for="pass">Password</label>
                <input type="text" value=' . $results[$i]->password . ' name="pass" id="pass"/>
                <input type="submit" value="Update User"/>
            </form>
            ';
            $i++;
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
