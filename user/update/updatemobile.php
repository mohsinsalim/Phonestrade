<?php

//updating user name
if (!session_start()) {
	session_start();
}

include("../../includes/db_con.php");

if(!isset($_SESSION['u_email'])) {
	header('Location: login.php');
} else {
	//User email
	$user = $_SESSION['u_email'];
}

$number = $_POST['mblNum'];

global $con;

$query = "UPDATE users SET user_mobileNumber = '$number' WHERE user_email = '$user'";

if (mysqli_query($con,$query)) {
	?>
	<!--Display text about -->
	<label class="label label-info" style="font-size:16px;">Mobile number updated successfully!! Please wait..</label>
    <script>
    	setTimeout("window.open('settings.php', '_self')", 1000);
    </script>

<?php
} else {
	echo "Something went wrong";
}



?>