<?php

$server= "localhost";
$username = "root";
$password = "";
$dbname = "intramuros";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>