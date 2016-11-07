<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/create/CreateView.Class.php';

// Creates the view
$view = new CreateView('Add a new User');
$view->buildDisplay();
