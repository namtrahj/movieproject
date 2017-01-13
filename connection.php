<?php
$mysqlHost = 'localhost';
$mysqlUser = 'root';
$mysqlPassword = '';
$mysqlDatabase = 'movies';

$conn = mysqli_connect($mysqlHost, $mysqlUser, $mysqlPassword, $mysqlDatabase);

if (!$conn){
	die('Connection failed: ' . mysqli_connect_error());	
}	
?>