<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

// Require needed model files
require './models/Views.Class.php';

// Instantiate class for view logic
$view = new Views();

// View is decided on by index.php?p=[page]
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