<!DOCTYPE HTML>
<html>
<head>
<title>Year Select</title>
</head>
<body>
<?php
include 'header.html';
require 'connection.php';

$query = mysqli_query($conn, "SELECT DISTINCT year FROM titles");

while ($array[] = $query->fetch_object());

array_pop($array);

sort($array);
?>

<h2>Select year:</h2>

<form action="yeardetails.php" method="POST">
	<select name="year">
		<?php foreach($array as $option) : ?>
			<option value="<?php echo $option->year; ?>"><?php echo $option->year; ?></option>
		<?php endforeach; ?>
	</select>
	<input type="submit" value="Submit">
</form>

</br>
</br>
<a href="index.php">Return Home</a>
</br>
<a href="yeartotals.php">Year Totals</a>
</body>
</html>