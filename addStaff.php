
<?php
//including the database connection file
include_once("config.php");


	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$role = mysqli_real_escape_string($mysqli, $_POST['role']);
	$description = 	 mysqli_real_escape_string($mysqli, $_POST['description']);
	
 		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO staff(name,gender,role,description) VALUES('$name','$gender','$role','$description')");
		  header("Location:staffView.php");
		//display success message*/
		#echo "<font color='green'>Data added successfully.";
		#echo "<br/><a href='index.php'>View Result</a>";
	
?>
