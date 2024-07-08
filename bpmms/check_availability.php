<?php 
require_once("includes/config.php");
// Check Availabilty for user mobile number
if(!empty($_POST["emailid"])) {
	$emailid= $_POST["emailid"];

		$result =mysqli_query($con,"select id from tbluserregistration where emailid='$emailid'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email id already registered. Try with different email id.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}




?>
