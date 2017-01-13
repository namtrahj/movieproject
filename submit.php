<?php
include 'header.html';

require 'connection.php';

$title = htmlentities($_POST['title']);
$year = htmlentities($_POST['year']);

if (empty($year)){
	echo 'Please enter a year.   '.'<a href="index.php">Return</a>';
	die();
}	

if ($year < 1910 || $year > date("Y")){
	echo 'Please enter a valid year.   '.'<a href="index.php">Return</a>';
	die();
}	

$insertion = mysqli_query($conn, "INSERT INTO titles (title, year) VALUES ('$title', '$year')");

if($insertion){
	echo 'Title added!    '.'<a href="index.php">Return</a>';
}

	
?>