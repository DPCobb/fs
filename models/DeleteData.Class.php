<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace delete_data;

class DeleteData
{
    public $msg;

    /**
     * deleteData removes a user form the database.
     * @param  integer $id user id to remove from db
     * @return string success/error message
     */
    public function deleteData($id)
    {
        include 'DBCred.php';
        // prepare delete statement
        $sth = $dbh->prepare("DELETE FROM user WHERE id = :id");
        // bind id param
        $sth->bindParam(':id', $id);
        // if delete is successful
        if ($sth->execute()) {
            $this->msg = '<h2>User successfully removed.</h2>';
        } else {
            // if delete fails
            $this->msg = '<h2>Could not remove user</h2>';
        }
        //return msg
        return $this->msg;
    }
}
