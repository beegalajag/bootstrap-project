<html>
<head>
	<title>Add Rating</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	
	$ratingType = mysqli_real_escape_string($mysqli, $_POST['ratingType']);
	$scale = mysqli_real_escape_string($mysqli, $_POST['scale']);
	
	// checking empty fields
	if(empty($ratingType) || empty($scale) {
				
		if(empty($ratingType)) {
			echo "<font color='red'>Rating field is empty.</font><br/>";
		}
		if(empty($scale)) {
			echo "<font color='red'>Scale field is empty.</font><br/>";
		}
		
		//k to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO ratings(rating_type,scale) VALUES('$ratingType','$scale')");
		
		//display success message
		echo "<font color='green'>Rating added successfully.";
		echo "<br/><a href='ratingView.php'>View Result</a>";
	}
}
?>
</body>
</html>
