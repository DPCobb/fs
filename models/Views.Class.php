<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
class Views
{
    public function displayView($filename="", $result=array())
    {
        $file = './views/' . $filename . '.php';
        include $file;
    }
}
