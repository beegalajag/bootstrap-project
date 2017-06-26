<?php
//including the database connection file
include_once("config.php");
include("index.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM feedback ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>                       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
</head>

<body>
<div class="container">
    <div class="dropdown" style="margin-left: 43%;">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Staff
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
        </ul>
  </div>
    <div class='col-md-5' style="width:21%; ">
        <div class="form-group">
        	<label for="from">From:</label>
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-5' style="margin-left: 56%; width: 21%;">
        <div class="form-group">
        <label for="from">To:</label>
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

<div class="container">

	<table class="table table-bordered">
	<thead>
	<tr>
		<th>Customer Name</th>
		<th>Phone</th>
		<th>Overall Rating</th>
		<th>Service Rating</th>
		<th>Comments</th>
		<th>Service On</th>
		<th>Service By</th>
	</tr>
	</thead>
	<tbody>
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
   /* function staff{
        $sql= " select name from staff";
        $result = $conn -> query($sql);
        if ($result->num_rows > 0) {
            while( $row = $result->fetch_assoc())
            {
                printf("%s",$name);
            }
    }*/
	?>
	</tbody>
	</table>
</div>
</body>
</html>
