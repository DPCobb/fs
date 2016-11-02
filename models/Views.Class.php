<?php
class Views
{
    function displayView($filename="", $result=array())
    {
        $file = './views/' . $filename . '.php';
        include $file;
    }
}
?>