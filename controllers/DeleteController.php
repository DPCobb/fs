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
    private $userId;
    public function __construct()
    {
    }

    /**
     * deleteUser removes an entry from the database.
     * @return string success/error message and home button
     */
    public function deleteUser()
    {
        // if url param id is not empty
        if (!empty($_GET['id'])) {
            // userid is equal to $_GET id
            $this->userId = $_GET['id'];
            // instantiate DeleteData
            $data = new delete_data\DeleteData($this->userId);
            // echo the results of deleteData
            return $data->deleteData($this->userId) . '<a href="index.php" class="button">Home</a>';
        }
    }
}
