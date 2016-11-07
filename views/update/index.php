<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/update/UpdateView.Class.php';

// build the view
$view = new UpdateView('Update A User');
$view->buildDisplay();
