<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/delete/DeleteView.Class.php';

// Creates the view
$view = new DeleteView('Remove User');
$view->buildDisplay();
