<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './views/index/IndexView.Class.php';

// build the view
$view = new IndexView('Home');
$view->buildDisplay();
