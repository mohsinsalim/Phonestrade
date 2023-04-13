<?php

include("includes/db_con.php");

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");


$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

if ($name && $email && $comments != " ") {
	echo "<script>alert('Your message has been recieved!!')</script>";

} else {
	echo "<h3>Sorry</h3>";	
}




?>