<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$role = mysqli_real_escape_string($mysqli, $_POST['role']);
	$description = 	 mysqli_real_escape_string($mysqli, $_POST['description']);
	
	// checking empty fields
	if(empty($name)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		//k to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO staff(name,gender,role,description) VALUES('$name','$gender','$role','$description')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
