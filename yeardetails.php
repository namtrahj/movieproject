<!DOCTYPE HTML>
<html>
<head>
<title><?php echo "$_POST[year]"; ?> Details</title>
</head>
<body>
<?php
include 'header.html';
require 'connection.php';

$year = htmlentities($_POST['year']);

$query = mysqli_query($conn, "SELECT * FROM titles WHERE year = $year ORDER BY rating DESC, title");

if($query != false){
	
	$ratingTotal = 0;
	$ratingItems = 0;
	
	//calculate average
	while($rows = mysqli_fetch_array($query)){
		$ratingTotal += $rows["rating"];
		$ratingItems ++;
	}
	
	$ratingAverage = round($ratingTotal / $ratingItems, 2);

	
	
	echo "<table>
	<thead>
	<tr>
		<th>$year</th>
		<th>Average Rating: ".number_format((float)$ratingAverage, 2)."</th>
	</tr>
	</thead>
	<tr>
		<th>Title</th>
		<th>Rating</th>
	</tr>
	<tbody>";
	
	//move pointer back to beginning of query
	mysqli_data_seek($query, 0);	
	
	while($rows = mysqli_fetch_array($query)){
		echo "<tr>
			<td>".$rows["title"]."</td>
			<td>".$rows["rating"]."</td>
		</tr>";
	}

	echo "</tbody>
	</table>";
}

else{
	echo "Query unsuccessful.";
}	
?>

</br>
</br>
<a href="index.php">Return Home</a>
</br>
<a href="yeartotals.php">Year Totals</a>
</br>
<a href="yearselect.php">Select a Different Year</a>
</body>
</html>