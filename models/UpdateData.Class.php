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
    private $id;

    public function __construct($id)
    {
        $this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $this->first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
        $this->last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
        $this->pass = substr(password_hash($_POST['pass'], PASSWORD_DEFAULT),0, 10);
        $this->userid = $id;
    }

    function updateUser()
    {
        include 'DBCred.php';

        $result = '';
        $sth = $dbh->prepare("UPDATE user SET email = :email, firstname = :firstname, lastname = :lastname, password = :password WHERE id = :id");
        $sth->bindParam(':id', $this->userid);
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