<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

namespace create_control;

use \create_data as create_data;

require './models/CreateData.Class.php';

class CreateController
{
    /**
     * form Builds and returns the form for adding new users.
     * @return string form structure is returned
     */
    protected function form()
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

    /**
     * actionLogic looks to see if url param action is equal to add and if it
     * does than it instantiates CreateData and calls createData method.
     * @return string returns either a success message, error, or the add user
     * form
     */
    public function actionLogic()
    {
        $output = '';
        // if action is set
        if (isset($_GET['action'])) {
            // if action is equal to add
            if ($_GET['action'] === 'add') {
                // instantiate CreateData
                $data = new create_data\CreateData;
                // set result equal to createData method
                $result = $data->createData();
                // if the result is not 0 output = success message / else error
                if ($result != 0) {
                    $output = '<h2>User Added</h2>
                    <a class="button" href="index.php">Home</a>
                    ';
                } else {
                    $output = 'Something went wrong!';
                }
            } else {
                // if acton isn't === add
                $output = $this->form();
            }
        } else {
            // if action is not set
            $output = $this->form();
        }
        // return the value of output
        return $output;
    }
}
