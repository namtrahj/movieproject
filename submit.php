<!DOCTYPE HTML>
<html>
<head>
<title>Title Submission</title>
</head>
<body>
<?php
include 'header.html';
require 'connection.php';

$title = htmlentities($_POST['title']);
$title = mysqli_real_escape_string($conn, $title);
$year = htmlentities($_POST['year']);
$rating = htmlentities($_POST['rating']);

//check for missing year
if (empty($year)){
	echo 'Please enter a year.   '.'<a href="index.php">Return</a>';
	die();
}	

//check for invalid year
if ($year < 1910 || $year > date("Y")){
	echo 'Please enter a valid year.   '.'<a href="index.php">Return</a>';
	die();
}	

$insertion = mysqli_query($conn, "INSERT INTO titles (title, year, rating) VALUES ('$title', '$year', '$rating')");

if($insertion){
	echo 'Title added!'.'</br>';
}

else{
	echo 'There was a problem adding this title.'.'</br>';
}

include 'footer.html';
?>

</body>
</html>