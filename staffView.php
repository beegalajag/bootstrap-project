<?php
//including the database connection file
include_once("config.php");
include("index.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM staff ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<div class="container">
	<div class="jumbotron">
		<div class="row">
        	<div class="text-center">
				<a href="addStaff.html" class="btn btn-primary active" role="button" aria-pressed="true" >Add New Data</a>
			</div>
		</div>

<!-- <a href="addStaff.html" class="btn btn-primary active" role="button" aria-pressed="true">Add New Data</a> -->

<!-- <a href="addStaff.html">Add New Data</a> --><br/><br/>

			<table class="table table-bordered">
			<thead>
				<tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Role</th>
				<th>Description</th>
				<th>Update</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				//while($res = mysql_fetch_array($result)) { // mysql_ffetch_array is deprecated, we need to use mysqli_fetch_array 
			while($res = mysqli_fetch_array($result)) { 		
					echo "<tr>";
					echo "<td>".$res['name']."</td>";
					echo "<td>".$res['gender']."</td>";
					echo "<td>".$res['role']."</td>";	
					echo "<td>".$res['description']."</td>";	
					echo "<td><a href=\"editStaff.php?id=$res[id]\" class='btn btn-default'><span class='glyphicon glyphicon-pencil'></span>Edit</a> | <a href=\"deleteStaff.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-default'><span class='glyphicon glyphicon-remove'>Delete</a></td>";		
				}
			?>
			</tbody>
			</table>
	</div>
</div>

</body>
</html>
