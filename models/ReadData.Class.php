<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace read_data;

class ReadData
{

    /*
     * getData Function
     *
     * getData retrieves the user data for a specific user
     * $id : Should be a user id set in the url as: index.php?p=read&id={USERID}
     *
     * @param $id
     */
    function getData($id)
    {
        include 'DBCred.php';

        $sth = $dbh->prepare("SELECT * FROM user WHERE id = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    function getAllData()
    {
        include 'DBCred.php';

        $sth = $dbh->prepare("SELECT * FROM user");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
}
?>