<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace read_data;

class ReadData
{

    /**
     * getData retrieves the user data for a specific user.
     * @param integer $id
     * @return array data set of users
     */
    public function getData($id)
    {
        include 'DBCred.php';
        // prepare select by id statement
        $sth = $dbh->prepare("SELECT * FROM user WHERE id = :id");
        // bind id param
        $sth->bindParam(':id', $id);
        //execute select
        $sth->execute();
        $result = $sth->fetchAll();
        $result = json_encode($result);
        // return results
        return $result;
    }

    /**
     * getAllData returns all user info from db.
     * @return array dataset of results
     */
    public function getAllData()
    {
        include 'DBCred.php';
        // prepare select
        $sth = $dbh->prepare("SELECT * FROM user");
        //execute
        $sth->execute();
        $result = $sth->fetchAll();
        $result = json_encode($result);
        // return results
        return $result;
    }
}
