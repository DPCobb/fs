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

// Page is decided on by index.php?p=
// If p is not empty decide on page to display
if (!empty($_GET['p']))
{
    switch ($_GET['p'])
    {
        case 'viewtest':
            $view->testView();
            break;
        default:
            $view->testView();
            break;
    }
}
else
{
    $view->testView();
}


?>