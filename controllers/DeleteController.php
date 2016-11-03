<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

require './models/DeleteData.Class.php';
class DeleteController
{
    public $userId;
    function __construct()
    {

    }

    function deleteUser()
    {
        if(!empty($_GET['id']))
        {
            $this->userId = $_GET['id'];
            $data = new DeleteData($this->userId);
            echo $data->deleteData($this->userId);
            echo '<a href="index.php" class="button">Home</a>';
        }
    }

}
?>
