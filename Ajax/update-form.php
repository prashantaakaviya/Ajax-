<?php 
	
	$user_id = $_POST['id'];
	$uname = $_POST['name'];
	$add = $_POST['address'];
	$mob = $_POST['mobile'];
	$conn= mysqli_connect("localhost","root","","user_table") or die("Connection Failed");

	$sql = "UPDATE user_table_ajax SET User_Name = '{$uname}', Address = '{$add}', Mobile_Number = '{$mob}' WHERE id = {$user_id}";
	// $result = mysqli_query($conn,$sql) or die("SQL Query Failed");
	
	if(mysqli_query($conn, $sql)){
		echo 1;
	}
	else{

		echo 0;
	}

 ?>