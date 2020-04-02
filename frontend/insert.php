<?php
require('db.php');
include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
    $name =$_REQUEST['name'];
    $age = $_REQUEST['age'];
	$descp = $_REQUEST['descp'];
	$date1= $_REQUEST['date1'];
    $submittedby = $_SESSION["username"];
    $ins_query="insert into new_record
    (`trn_date`,`name`,`age`,descp,date1,`submittedby`)values
    ('$trn_date','$name','$age','$descp','$date1','$submittedby')";
    mysqli_query($con,$ins_query) or die(mysqli_error($con));
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Tasks</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Task</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Task" required /></p>
<p><input type="text" name="age" placeholder="Enter Priority" required /></p>
<p><input type="text" name="descp" placeholder="Enter description" required /></p>
<p><input type="date" name="date1"></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>