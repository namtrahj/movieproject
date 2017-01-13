<?php
include 'header.html';

$title = htmlentities($_POST['title']);

if (empty($title)){
	echo 'Please enter a title.   '.'<a href="index.php">Return</a>';
	die();
}	
	
?>

<form action="submit.php" method="POST">
	Title:
	<input type="text" name="title" value=<?php echo $title; ?>><br>
	Enter year:
	<input type="text" name="year"><br>
	<input type="submit" value="Submit">
</form>