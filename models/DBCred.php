<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

// Setup db variables
$host = 'localhost';
$dbname = 'my_app';
$user = 'my_app';
$pass = 'secret';

// Create dbh as a new instance of PDO
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

?>