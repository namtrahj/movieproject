<!DOCTYPE HTML>
<html>
<head>
<title>Year Totals</title>
</head>
<body>
<?php
include 'header.html';
require 'connection.php';

$query = mysqli_query($conn, "SELECT DISTINCT year FROM titles");

while ($array[] = $query->fetch_object());

array_pop($array);

sort($array);

echo "<table>
	<thead>
	<tr>
		<th>Year</th>
		<th>Movies Seen</th>
		<th>Average Rating</th>
	</tr>
	</thead>
	<tbody>";

foreach($array as $yearRow){
	$query = mysqli_query($conn, "SELECT * FROM titles WHERE year = $yearRow->year");
	
	$ratingTotal = 0;
	$ratingItems = 0;
	$year = $yearRow->year;
	
	while($rows = mysqli_fetch_array($query)){
		$ratingTotal += $rows["rating"];
		$ratingItems ++;
	}
	
	$ratingAverage = round($ratingTotal / $ratingItems, 2);
	
	echo "<tr>
			<td>".$year."</td>
			<td>".$ratingItems."</td>
			<td>".number_format((float)$ratingAverage, 2)."</td>
		</tr>";
}

echo "</tbody>
	</table>";
?>

</br>
</br>
<a href="index.php">Return Home</a>
</br>
<a href="yearselect.php">Year Details</a>
</body>
</html>