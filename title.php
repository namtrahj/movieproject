<!DOCTYPE HTML>
<html>
<head>
<title>Title Entry</title>
</head>
<body>
<?php
include 'header.html';
require 'connection.php';

$title = htmlentities($_POST['title']);

//check for missing title
if (empty($title)){
	echo 'Please enter a title.   '.'<a href="index.php">Return</a>';
	die();
}	

//check for existing title
$query = mysqli_query($conn, "SELECT * FROM titles WHERE title = '$title'");

if ($query != false){
	while ($array[] = $query->fetch_object());
	array_pop($array);
	foreach ($array as $row){
		echo '<form action="alreadyseen.php" method="POST">'
				."Did you mean $row->title ($row->year)?    ".
				'<input type="submit" value="Yes">
				</form>'.'</br>';
	}	
}
?>

<form action="submit.php" method="POST">
	Title:
	<input type="text" name="title" value="<?php echo $title; ?>"><br>
	Enter year:
	<input type="text" name="year"><br>
	Enter rating:
	<input type="number" step="0.5" min="0.5" max="10" name="rating"><br>
	<input type="submit" value="Submit">
</form>
<?php include 'footer.html'; ?>
</body>
</html>