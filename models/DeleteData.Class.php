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
    /*
     * deleteData Function
     *
     * deleteData removes a specific users information from the database
     *
     *
     * @param $id
     */
    function deleteData($id)
    {
        include 'DBCred.php';
        $sth = $dbh->prepare("DELETE FROM user WHERE id = :id");
        $sth->bindParam(':id', $id);
        if($sth->execute()) {
            $this->msg = '<h2>User successfully removed.</h2>';
        }
        else {
            $this->msg = '<h2>Could not remove user</h2>';
        }

        return $this->msg;
    }
}
?>