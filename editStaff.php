<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$role = mysqli_real_escape_string($mysqli, $_POST['role']);
	$description = 	 mysqli_real_escape_string($mysqli, $_POST['description']);
	
	// checking empty fields
	if(empty($name))  {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE staff SET name='$name',gender='$gender',description='$description',role='$role' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: staffView.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM staff WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$gender = $res['gender'];
	$description = $res['description'];
	$role = $res['role'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editStaff.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td>
			

				<select name="gender">
				<?php if($gender=='male') echo "<option selected='true' value='male'> Male </option>";
				else echo "<option value='male'> Male </option>"; ?>
				<?php if($gender=='female') echo "<option selected='true' value='female'> Female </option>";
				else echo "<option value='female'> Female </option>"; ?>
				  
				</select></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><textarea type="text" name="description" value="<?php echo $description;?>"></textarea></td>
			</tr>
			<tr> 
				<td>Role</td>
				<td>
				<select name="role">
			
				<?php if($role=='employee') echo "<option selected='true' value='employee'> Employee </option>";
				else echo "<option value='employee'> Employee </option>"; ?>
				<?php if($role=='admin') echo "<option selected='true' value='admin'> Admin </option>";
				else echo "<option value='admin'> Admin </option>"; ?>
				  
				</select></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
