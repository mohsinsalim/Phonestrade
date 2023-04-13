<?php
session_start();
include("../includes/db_con.php");
global $con;

	$user_email = $_SESSION['u_email'];

$sa1 = $_POST['sa1'];
$sa2 = $_POST['sa2'];
$sac = $_POST['sac'];
$sas = $_POST['sas'];
$saz = $_POST['saz'];

$query = "UPDATE users SET Address_Line1 = '$sa1',Address_Line2 = '$sa2',Address_City = '$sac',Address_State = '$sas',Address_ZipCode = '$saz' WHERE user_email = '$user_email'";

if (mysqli_query($con,$query)) {
	?>
	<!--Display text about -->
	<label class="label label-info" style="font-size:16px;">Address Updated Successfully!! Please wait..</label>
    <script>
    	setTimeout("window.open('./profile.php', '_self')", 1000);
    </script>

<?php

} else {
	echo "Error, Try again later!!";
}

?>