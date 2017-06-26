<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$ratingType = mysqli_real_escape_string($mysqli, $_POST['ratingType']);
	$scale = mysqli_real_escape_string($mysqli, $_POST['scale']);
	
// checking empty fields
	if(empty($ratingType) || empty($scale)) {
				
		if(empty($ratingType)) {
			echo "<font color='red'>Rating field is empty.</font><br/>";
		}
		if(empty($scale)) {
			echo "<font color='red'>Scale field is empty.</font><br/>";
		}
		
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE ratings SET rating_type='$ratingType',scale='$scale' 
			WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: ratingView.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM ratings WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$ratingType = $res['rating_type'];
	$scale = $res['scale'];
}
?>
<html>
<head>	
	<title>Edit Rating</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="addRating.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<body>
	<nav class="navbar navbar-default">
 <div class="navbar-header">
      <a class="btn btn-info " href="ratingView.php"> <span class="glyphicon glyphicon-home"></span> Home</a>
    </div>
 
</nav>
	<br/><br/>
	
	<div class="container" >
	<div class="container-fluid">
	<form name="form1" method="post" action="editRating.php">

       <div class="form-group" >
       		<label for="ratingType">Rating</label>
			<input type="text" class="form-control" name="ratingType" value="<?php echo $ratingType;?>">
		</div>
		 <div class="form-group" >
       		<label for="scale">Scale</label>
			<input type="text" class="form-control" name="scale" value="<?php echo $scale;?>">
		</div>
		<div class="form-group">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" class="btn btn-primary active" role="button" aria-pressed="true" name="update" value="Update">
			<a href="ratingView.php" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
		</div>
		<!-- <table border="0">
			<tr> 
				<td>Rating</td>
				<td><input type="text" name="ratingType" value="<?php echo $ratingType;?>"></td>
			</tr>
				<tr> 
				<td>Scale</td>
				<td><input type="text" name="scale" value="<?php echo $scale;?>"></td>
			</tr>
			
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table> -->
	</form>
	</div>
	</div>
</body>
</html>
