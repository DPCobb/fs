<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/read/ReadView.Class.php';

// build the view
$view = new ReadView('View User Details');
$view->buildDisplay();
