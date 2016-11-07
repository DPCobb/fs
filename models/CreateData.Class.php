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

    /**
     * sets up variables and sanitizes them
     * @return null
     */
    public function __construct()
    {
        // sanitize inputs and create salt
        $this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $this->first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
        $this->last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
        $salt = md5($this->email);
        $this->pass = substr(password_hash($salt.$_POST['password'], PASSWORD_DEFAULT), 0, 10);
    }

    /**
     * createData inserts a new user into the db.
     * @return integer returns either a 1 or 0 for success/fail
     */
    public function createData()
    {
        include 'DBCred.php';

        $result = '';
        // prepare insert statement
        $sth = $dbh->prepare("INSERT INTO user (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password)");
        // bind the parameters
        $sth->bindParam(':email', $this->email);
        $sth->bindParam(':firstname', $this->first);
        $sth->bindParam(':lastname', $this->last);
        $sth->bindParam(':password', $this->pass);
        // if execute is successful result = 1, else result = 0
        if ($sth->execute()) {
            $result = 1;
        } else {
            $result =0;
        }
        // return result
        return $result;
    }
}
