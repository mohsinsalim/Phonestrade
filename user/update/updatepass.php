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

$currpwd = md5($_POST['oldpass']);
$newpass = md5($_POST['newpass']);
$cfpass = md5($_POST['cfpass']);

global $con;

//old ps check

$checkQuery = "SELECT * FROM users WHERE user_email = '$user'";
$checkRun = mysqli_query($con, $checkQuery);
$checkRow = mysqli_fetch_array($checkRun);

$oldPs = $checkRow['user_password'];

if (strcmp($currpwd,$oldPs) === 0) {

if (strcmp($newpass,$cfpass) === 0) {

$query = "UPDATE users SET user_password = '$newpass' WHERE user_email = '$user'";

if (mysqli_query($con,$query)) {
	?>
	<!--Display text about -->
	<label class="label label-info" style="font-size:16px;">Password Updated Successfully!! Please wait..</label>
    <script>
    	setTimeout("window.open('settings.php', '_self')", 1000);
    </script>

<?php
} else {
	echo "Something went wrong";
}

} else { ?>
	
<label class="label label-warning" style="font-size:16px;">New password and confirm password don't match!!</label>

<?php
	
}


} else { ?>
	
<label class="label label-warning" style="font-size:16px;">Incorrect current password!!</label>

<?php }

?>