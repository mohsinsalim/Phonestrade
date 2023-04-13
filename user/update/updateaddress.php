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

$adrsL1 = $_POST['adrsL1'];
$adrsL2 = $_POST['adrsL2'];
$adrsCity = $_POST['adrsCity'];
$adrsState = $_POST['adrsState'];
$adrsZip = $_POST['adrsZip'];

if ($adrsL1 && $adrsCity && $adrsState && $adrsZip != " ") {


global $con;

$query = "UPDATE users SET Address_Line1 = '$adrsL1', Address_Line2 = '$adrsL2', Address_City = '$adrsCity', Address_State = '$adrsState', Address_ZipCode = '$adrsZip' WHERE user_email = '$user'";

if (mysqli_query($con,$query)) {
	?>
	<!--Display text about -->
	<label class="label label-info" style="font-size:16px;">Address Updated Successfully!! Please wait..</label>
    <script>
    	setTimeout("window.open('settings.php', '_self')", 1000);
    </script>

<?php
} else {
	echo "Something went wrong";
}

} else { ?>

	<label class="label label-danger" style="font-size:16px;">Please fill all the required fields!!</label>

<?php		
}

?>