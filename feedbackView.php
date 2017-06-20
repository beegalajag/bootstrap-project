<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM feedback ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="index.php"> Home </a><br/><br/>


	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Customer Name</td>
		<td>Phone</td>
		<td>Overall Rating</td>
		<td>Service Rating</td>
		<td>Comments</td>
		<td>Service On</td>
		<td>Service By</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_ffetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['customer_name']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td>".$res['overall_rating']."</td>";	
		echo "<td>".$res['service_rating']."</td>";	
		echo "<td>".$res['comments']."</td>";	
		echo "<td>".$res['service_on']."</td>";	
		echo "<td>".$res['service_by']."</td>";	
			
	}
	?>
	</table>
</body>
</html>
