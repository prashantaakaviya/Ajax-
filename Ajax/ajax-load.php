<?php

$conn= mysqli_connect("localhost","root","","user_table") or die("Connection Failed");
$sql = "SELECT * FROM user_table_ajax";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");
$output = "";
		if (mysqli_num_rows($result) > 0) {
			// code...
			$output = '<table class="table table-success table-striped" border-"1" width="100%" cellspacing="0" cellpadding="10px"><thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User Name</th>
			<th scope="col">Address</th>
			<th scope="col">Mobile Number</th>
            <th scope="col" colspan="2">Option</th>
            
          </tr> 			 	
        </thead>';
						while ($row = mysqli_fetch_assoc($result)) {
							// code...
							$output .="<tr><td>{$row['id']}</td><td>{$row["User_Name"]}</td>
							<td>{$row["Address"]}</td>
							<td>{$row["Mobile_Number"]}</td>
							
							<td>

							<button class='edit-btn' data-id='{$row['id']}'><i class='fa-sharp fa-solid fa-pen-to-square fa-lg'></i></button>
							 <button class='delete-btn' data-id='{$row['id']}'><i class='fa-solid fa-trash fa-sm' style='color: #ffffff;'></i></button></td></tr>";
						}
						$output .="</table>";
					mysqli_close($conn);
					echo $output;
		}
		else{
				echo "<h2> No Record Found.</h2>";
		}

?>
<!--  -->
							<!-- <input type='submit' class='edit-btn bi bi-pencil' data-id='{$row['id']}'>
							<input type='submit' class='delete-btn' data-id='{$row['id']}'><i class='bi bi-trash3'> -->