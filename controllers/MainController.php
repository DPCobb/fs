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

// View is decided on by index.php?p=
// If p is not empty decide on view to display
if (!empty($_GET['p']))
{
    // get p which should be which view to call, send it to view as param
    switch ($_GET['p'])
    {
        case 'viewtest':
            $view->testView();
            break;
        default:
            $view->displayView('index/index');
            break;
    }
}
else
{
    $view->displayView('index/index');
}


?>