<?php
//getting user selling price

if(!session_start()){
	session_start();
}

if (isset($_POST['sellprice'])) { 

$user_sell_price = $_POST['sellprice'];
$user_sell_phone_cond = $_POST['sell_condition'];

$_SESSION['user_sell_price'] = $user_sell_price;
$_SESSION['$user_sell_phone_cond'] = $user_sell_phone_cond;
}


?>