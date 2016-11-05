<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace create_data;

class CreateData
{
    private $email;
    private $first;
    private $last;
    private $pass;

    public function __construct()
    {
        $this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $this->first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
        $this->last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
        $this->pass = substr(password_hash($_POST['password'], PASSWORD_DEFAULT),0, 10);
    }

    function createData()
    {
        include 'DBCred.php';

        $result = '';
        $sth = $dbh->prepare("INSERT INTO user (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password)");
        $sth->bindParam(':email', $this->email);
        $sth->bindParam(':firstname', $this->first);
        $sth->bindParam(':lastname', $this->last);
        $sth->bindParam(':password', $this->pass);
        if ($sth->execute()) {
            $result = 1;
        }
        else{
            $result =0;
        }
        return $result;
    }

}
?>