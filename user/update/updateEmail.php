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

$email = $_POST['email'];
$cfmEmail = $_POST['cfmEmail'];

global $con;

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

if (strcmp($email,$cfmEmail) === 0) {

$query = "UPDATE users SET user_email = '$email' WHERE user_email = '$user'";
$_SESSION['u_email'] = $email;

if (mysqli_query($con,$query)) {
	?>
	<!--Display text about -->
	<label class="label label-info" style="font-size:16px;">Name Updated Successfully!! Please wait..</label>
    <script>
    	setTimeout("window.open('settings.php', '_self')", 1000);
    </script>

<?php
} else {
	echo "Something went wrong";
}

} else { ?>

	<label class="label label-danger" style="font-size:16px;">Email address don't match!! Try again</label>		
        
<?php
}
} else {  ?>

	<label class="label label-danger" style="font-size:16px;">Incorrect Email format!!</label>		
        
<?php
	
}
?>