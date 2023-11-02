<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mulah_assess';

// Create Connection

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("connection failed" . $conn->connect_error);
}

?>