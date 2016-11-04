<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace delete_control;

use \delete_data as delete_data;

require './models/DeleteData.Class.php';
class DeleteController
{
    public $userId;
    function __construct()
    {

    }

    function deleteUser()
    {
        if(!empty($_GET['id'])) {
            $this->userId = $_GET['id'];
            $data = new delete_data\DeleteData($this->userId);
            echo $data->deleteData($this->userId);
            echo '<a href="index.php" class="button">Home</a>';
        }
    }

}
?>
