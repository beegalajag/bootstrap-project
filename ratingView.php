<?php
//including the database connection file
include_once("config.php");
include("index.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM ratings ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head> 
<!-- 	<link rel="stylesheet" type="text/css" href="ratingView.css">
 -->	<title>Rating</title>
</head>

<body>

	<div class="container">
	<div class="jumbotron">
		<div class="row">
        	<div class="text-center" style="margin-bottom: 20px; ">
				<a href="addRating.html" class="btn btn-primary active" role="button" aria-pressed="true" >Add Rating</a>
			</div>
		</div>
		 <table class="table table-bordered">
		 	 <thead>
      			<tr>
        		<th>Rating</th>
        		<th style="text-align: center;">Scale</th>
        		<th style="text-align: center;">Update</th>
      			</tr>
    		</thead>
		<tbody>
			<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_ffetch_array is deprecated, we need to use mysqli_fetch_array 
				while($res = mysqli_fetch_array($result)) { 		
					echo "<tr>";
					echo "<td>".$res['rating_type']."</td>";
					echo "<td align= 'center'>".$res['scale']."</td>";
	
					echo "<td align= 'center'><a href=\"editRating.php?id=$res[id]\" class='btn btn-default' ><span class='glyphicon glyphicon-pencil'></span>Edit</a> | <a href=\"deleteRating.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn btn-default'><span class='glyphicon glyphicon-trash'></span>Delete</a></td>";		
					}
			?>
		</tbody>	
		</table>
	</div>
	</div>
</body>
</html>
