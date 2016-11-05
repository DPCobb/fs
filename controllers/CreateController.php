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
    protected function form()
    {
        echo '
        <form method="post" action="index.php?p=create&action=add" id="newuser">
            <input type="text" name="first" id="firstname" placeholder="Enter your first name" required/>
            <input type="text" name="last" id="lastname" placeholder="Enter your last name" required/>
            <input type="email" name="email" id="email" placeholder="Enter your email" required/>
            <input type="text" name="password" id="pass" placeholder="Enter your password" required/>
            <input type="submit" value="Create"/>
        </form>
        ';
    }

    public function actionLogic()
    {
        $output = '';
        if (isset($_GET['action'])){
            if ($_GET['action']==='add'){
                $data = new create_data\CreateData;
                $result = $data->createData();
                if ($result != 0 ) {
                    echo '<h2>User Added</h2>
                    <a class="button" href="index.php">Home</a>
                    ';
                }
                else {
                    echo 'Something went wrong!';
                }

            }
            else {
                $output = $this->form();
            }
        }
        else {
            $output = $this->form();
        }
        echo $output;
    }

}

?>