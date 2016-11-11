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

    /**
     * Assigns value to userId.
     */
    public function __construct()
    {
        // if url param id is not empty
        if (!empty($_GET['id'])) {
            // userid is equal to $_GET id
            $this->userId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        }
    }

    /**
     * deleteUser removes an entry from the database.
     * @return string success/error message and home button
     */
    public function deleteUser()
    {
        // instantiate DeleteData
        $data = new delete_data\DeleteData($this->userId);
        // echo the results of deleteData
        return $data->deleteData($this->userId) . '<a href="index.php" class="button">Home</a>';
    }
}
