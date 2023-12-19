<?php
// database connection
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="ndayemile";
$dbname="scholars";

$DB = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
//session initialisation
session_start();
?>
