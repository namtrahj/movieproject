<?php
include 'header.html';

require 'connection.php';

$title = htmlentities($_POST['title']);
$year = htmlentities($_POST['year']);
$rating = htmlentities($_POST['rating']);

if (empty($year)){
	echo 'Please enter a year.   '.'<a href="index.php">Return</a>';
	die();
}	

if ($year < 1910 || $year > date("Y")){
	echo 'Please enter a valid year.   '.'<a href="index.php">Return</a>';
	die();
}	

$insertion = mysqli_query($conn, "INSERT INTO titles (title, year, rating) VALUES ('$title', '$year', '$rating')");

if($insertion){
	echo 'Title added!    '.'<a href="index.php">Return</a>';
}

	
?>