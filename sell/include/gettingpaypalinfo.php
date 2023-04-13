<?php
//getting PayPal info

if (!session_start()) {
session_start();
}

if (isset($_POST['paypalEmail'], $_POST['confirmPaypalEmail'])) {
	
$paypalEmail = $_POST['paypalEmail'];
$confirmPaypalEmail = $_POST['confirmPaypalEmail'];

//check the field is not empty
if ($paypalEmail && $confirmPaypalEmail != " ") {
//check email address is correct
if (!filter_var($paypalEmail, FILTER_VALIDATE_EMAIL)) {
  ?>
  <label class="label label-danger" style="font-size:16px;">Invalid email format</label>
  <?php 
} else {
//check if email match
if (strcmp("$paypalEmail","$confirmPaypalEmail") !== 0) {
	?>
	<label class="label label-danger" style="font-size:16px;">Email address don't match!!</label>
	<?php
} else {
	// Email Match Result Start Here
	$_SESSION['user_paypal_email'] = $paypalEmail;
	if (isset($_SESSION['user_paypal_email'])) {
	?>
    <script>
    	window.open("../../../sell/phoneoffer.php","_self");
    </script>
    <?php
	}
    // Email Match Result End Here
}
}
} else {
	?>
    
	<label class="label label-danger" style="font-size:16px;">Please enter Paypal email address!!</label>
    
    <?php
}

}



?>