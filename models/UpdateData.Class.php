<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */
namespace update_data;

class UpdateData
{
    private $email;
    private $first;
    private $last;
    private $pass;
    private $userid;
    private $result;

    /**
     * Sanatize and assign variables.
     * @param integer $id user id to update
     */
    public function __construct($id)
    {
        // Sanitize and assign variables if not empty
        if (!empty($_POST['email']) && !empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['pass'])) {
            $this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $this->first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
            $this->last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
            $salt = md5($this->email);
            $this->pass = substr(password_hash($salt.$_POST['pass'], PASSWORD_DEFAULT), 0, 10);
            $this->userid = $id;
        }
    }

    /**
     * updateUser updates user data for a specific user.
     * @return integer returns a 1/0 for success/fail
     */
    public function updateUser()
    {
        include 'DBCred.php';

        // prepare update
        $sth = $dbh->prepare("UPDATE user SET email = :email, firstname = :firstname, lastname = :lastname, password = :password WHERE id = :id");
        // bind parameters
        $sth->bindParam(':id', $this->userid);
        $sth->bindParam(':email', $this->email);
        $sth->bindParam(':firstname', $this->first);
        $sth->bindParam(':lastname', $this->last);
        $sth->bindParam(':password', $this->pass);
        // if execute is successful result is 1
        if ($sth->execute()) {
            $this->result = 1;
        } else {
            // failed update
            $this->result =0;
        }
        // return update result
        return $this->result;
    }
}
