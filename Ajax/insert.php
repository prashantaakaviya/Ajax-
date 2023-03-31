<?php 
// require "conn.php";



$conn = mysqli_connect('localhost', 'root','','user_table') or die("Connection Failed");
 $name = $_POST['uname']; 
 $address = $_POST['address'];
 $mobile = $_POST['mobile'];

 if(!empty($name) && !empty($address) &&!empty($mobile)){
$sq = "INSERT INTO user_table_ajax (User_Name, Address, Mobile_Number ) VALUES('{$name}','{$address}','{$mobile}')";
	if (mysqli_query($conn,$sq)) {
		// code...
	
		echo 1;
	
	}	
 }

else{
		echo 0;
	}
?>