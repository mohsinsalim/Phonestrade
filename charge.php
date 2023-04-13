<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  include("includes/db_con.php");

  require_once('./p_config.php');
  

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

  global $con;

  $token  = $_POST['stripeToken'];
  $email = $_POST['stripeEmail'];
  
  if (isset($_POST['customerName'], $_POST['customerAddLine1'], $_POST['customerCity'], $_POST['customerZipCode'])) {
	  
  $c_name = $_POST['customerName'];
  $AddLine1 = $_POST['customerAddLine1'];
  $Addcity = $_POST['customerCity'];
  $AddZipCode = $_POST['customerZipCode'];
  
  } 
  
  if (isset($_SESSION['u_email'])) {
	  $email = $_SESSION['u_email'];
  	$u_query = "SELECT * FROM users WHERE user_email = '$email'";
	$u_run = mysqli_query($con, $u_query);
	$u_row = mysqli_fetch_array($u_run);
	
	$c_name = $u_row['user_fname'];
  	$AddLine1 = $u_row['Address_Line1'] ." ". $u_row['Address_Line2'];
  	$Addcity = $u_row['Address_City'];
  	$AddZipCode = $u_row['Address_ZipCode'];
 
  } 
  
  $ip_address = getIp();
  $totalDevices = $_SESSION['totalDevices'];

	//email session
	$_SESSION['user_email_verify'] = $email;

	//name session

	$_SESSION['user_name_verify'] = $c_name;
	
	//id
	
	if (isset($_SESSION['u_Id'])) {
		$u_Id = $_SESSION['u_Id'];
	} else {
		$u_Id = "0";
	}
	
	//model of devices
	
	$justModel = implode (",",$_SESSION['model_name']);
	

  $amount = $_SESSION['grand_total'];
  $amountFix = 100.00;	
  $f_amount = $amount*$amountFix;
  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'card'  => $token
	  )); //replace card with source
  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $f_amount,
      'currency' => 'usd'
  ));
  //echo "Successfully Charged" ." ". $amount;
  if ($charge) {
	  	
	  	$_SESSION['paid'] = "true";
	    $rndm = mt_rand();
	  	$_SESSION['order_no'] = $rndm;
	  	$ordernumgenerated = $_SESSION['order_no'];
	  
	   $query = "INSERT INTO orderconfirmation (order_number, user_id, c_email, customer_name, payment_amount, number_of_devices, name_of_devices, shipment_status, address_line1, address_city, address_zipcode, ip_address) values ('$ordernumgenerated','$u_Id', '$email','$c_name','$amount','$totalDevices', '$justModel', '0', '$AddLine1','$Addcity','$AddZipCode','$ip_address')";
	  
	   $run_query = mysqli_query($con, $query);
	  
	  if ($run_query) {
		  
		  $msg = $ordernumgenerated ."\n". $c_name ."\n". $justModel ."\n". $amount;
		  $subject = $justModel . " Purchased";
		  $headers = 'From: sales@phonestrade.com' . "\r\n" .
    				 'Reply-To: sales@phonestrade.com' . "\r\n" .
    				 'X-Mailer: PHP/' . phpversion();
		  mail("mohxinfaroqi@gmail.com", $subject, $msg, $headers);
		  
		  //update db
		  //foreach($_SESSION['cart'] as $Id=>$value) {
		  	//$upd_Query = "";
		  //}
	  ?>
      
	 <label class="label label-info" style="font-size:16px;">Payment Successfull!! Please wait...</label>
		
		<?php
		  
		  if (isset($_SESSION['cart'])) {
			  	
					foreach($_SESSION['cart'] as $Id=>$value) {
						unset($_SESSION['cart'][$Id]);
					}
		  }
		  ?>
		  
	 <script>
     	window.open("orderconfirmation.php", "_self");
     </script>
	  
	  <?php
      } else {
		  echo("Error description: " . mysqli_error($con));
	  } 
	  
	   
  } 
	else {
		echo '<label class="label label-warning" style="font-size:16px;">Something went wrong!!</label>';
	}

?>