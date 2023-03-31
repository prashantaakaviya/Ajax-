<?php 
	
	$user_id = $_POST['userid'];
	$conn= mysqli_connect("localhost","root","","user_table") or die("Connection Failed");

	$sql = "DELETE FROM user_table_ajax WHERE id = {$user_id}";
	// $result = mysqli_query($conn,$sql) or die("SQL Query Failed");
	if(mysqli_query($conn, $sql)){
		echo 1;
	}
	else{

		echo 0;
	}

 ?>