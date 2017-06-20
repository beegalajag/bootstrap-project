<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM ratings ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Rating</title>
</head>

<body>
<a href="index.php"> Home </a><br/><br/>
<br><br>
<a href="addRating.html">Add New Rating</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Rating</td>
		<td>Scale</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_ffetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['rating_type']."</td>";
		echo "<td>".$res['scale']."</td>";
	
		echo "<td><a href=\"editRating.php?id=$res[id]\">Edit</a> | <a href=\"deleteRating.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
