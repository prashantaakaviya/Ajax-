<?php

	$userid = $_POST['id'];
	$conn= mysqli_connect("localhost","root","","user_table") or die("Connection Failed");
$sql = "SELECT * FROM user_table_ajax where id = {$userid}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");
$output = "";
		if (mysqli_num_rows($result) > 0) {
			// code...
			// $output = '';
						while ($row = mysqli_fetch_assoc($result)) {
							// code...
							$output .="<tr>
				            <td>User Name</td>
				            <td><input type='text' id='edit-unm' value='{$row['User_Name']}'></td>
				            <td><input type='text' id='edit-id' hidden value='{$row['id']}'></td>
				          </tr>
						  <tr>
						  <td>Address</td>
						  <td><input type='text' id='edit-add' value='{$row['Address']}'></td>
						  
						  </tr>
						  <td>Mobile Number</td>
						  <td><input type='text' id='edit-mo' value='{$row['Mobile_Number']}'></td>
						
						  </tr>

				          <tr>
				            <td><button id='edit-sub'> Save</button> </td>
				          </tr>";
						}
					
					mysqli_close($conn);
					echo $output;
		}
		else{
				echo "<h2> No Record Found.</h2>";
		}

	
?>