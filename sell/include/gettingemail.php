<?php
//Getting user email

if (!session_start()) {
session_start();
}

if (isset($_POST['userEmail'])) { 

$email = $_POST['userEmail'];

$_SESSION['user_sell_email'] = $email;

}




?>