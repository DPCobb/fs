<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

// Require needed model files
require './models/Views.Class.php';
require './models/CreateData.Class.php';
require './models/ReadData.Class.php';
require './models/UpdateData.Class.php';
require './models/DeleteData.Class.php';
require './models/CreateData.Class.php';
require './models/DBCred.php';

// Instantiate classes for required /models/
$view = new Views();
$select = new ReadData();

// View is decided on by index.php?p=
// If p is not empty decide on view to display
if (!empty($_GET['p']))
{
    // Use switch/case to decide what p is and what view needs to be displayed
    switch ($_GET['p'])
    {
        case 'create':
            $view->displayView('create/index');
            break;
        case 'update':
            $view->displayView('update/index');
            break;
        case 'read':
            $view->displayView('read/index');
            if(isset($_GET['id'])){
                $select->getData($_GET['id']);
            }
            else {
                $select->getAllData();
            }
            break;
        case 'delete':
            $view->displayView('delete/index');
            break;
        default:
            $view->displayView('index/index');
            break;
    }
}
// If there is no p value show the default, index.php
else
{
    $view->displayView('index/index');
}


?>