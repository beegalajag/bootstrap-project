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
		$result = mysqli_query($mysqli, "UPDATE rating SET rating_type='$ratingType',scale='$scale' 
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
</head>

<body>
	<a href="ratingView.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editRating.php">
		<table border="0">
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
		</table>
	</form>
</body>
</html>
