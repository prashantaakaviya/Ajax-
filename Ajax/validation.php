<?php


$mobileno = strlen ($_POST ["Mobile"]);  
$length = strlen ($mobileno);  
  
if ( $length < 10 && $length > 10) { 

	echo 0; 
   
} else {  
	echo 1;
     
}

?> 


 $ErrMsg = "Mobile must have 10 digits.";  
            echo $ErrMsg;  




     echo "Your Mobile number is: " .$mobileno; 