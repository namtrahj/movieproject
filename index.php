<!DOCTYPE HTML>
<html>
<head>
<title>Movie Tracker - Index</title>
</head>
<body>
<?php
include 'header.html';
require 'connection.php';
?>

<form action="title.php" method="POST">
	Enter title:
	<input type="text" name="title"><br>
	<input type="submit" value="Submit">
</form>
</br>
<a href="yearselect.php">Year Details</a>
</br>
<a href="yeartotals.php">Year Totals</a>
</body>
</html>