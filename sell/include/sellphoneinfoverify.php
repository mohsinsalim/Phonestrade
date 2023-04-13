<?php

if(!session_start()){
	session_start();
}


include("../.././includes/db_con.php");

//information verification for sell phones


					$payToFname = $_POST['payToFname'];
					$payToLname = $_POST['payToLname'];
					$addLine1 = $_POST['addLine1'];
					$addLine2 = $_POST['addLine2'];
					$addCity = $_POST['addCity'];
					$addState = $_POST['addState'];
					$addZip = $_POST['addZip'];
					
					$p_Address = $addLine1 ." ". $addLine2 ." ". $addCity ." ". $addState ." ". $addZip;
					
//session

					$getEmail = $_SESSION['user_sell_email'];
					$sellPrc = $_SESSION['user_sell_price'];
					$phnCnd = $_SESSION['$user_sell_phone_cond'];
					$make = $_SESSION['device_make'];
					$model = $_SESSION['device_model'];
					$size = $_SESSION['device_size'];
					$carrier = $_SESSION['device_carrier'];
					
					if (isset($_SESSION['user_paypal_email'])) {
						
					$getPP = $_SESSION['user_paypal_email'];
					
					} else {
						$getPP = " ";
					}
					
					if (isset($_SESSION['address'], $_SESSION['checkPayTo'])) {
					
					$cPayTo = $_SESSION['checkPayTo'];
					$getCPAdd = $_SESSION['address'];
					
					} else {
						$cPayTo = " ";
						$getCPAdd = " ";	
					}
					
					


if (!empty($payToFname) && !empty($payToLname) && !empty($addLine1) && !empty($addCity) && !empty($addState) && !empty($addZip)) {
	
	$query = "INSERT INTO sellphones_orders (sell_make, sell_model, sell_capacity, sell_carrier, sell_condition, sell_price, firstname, lastname, main_email, check_payTo, checkpay_address, Paypal_Email, Personal_address) VALUES ('$make', '$model', '$size', '$carrier', '$phnCnd', '$sellPrc', '$payToFname', '$payToLname', '$getEmail', '$cPayTo', '$getCPAdd', '$getPP', '$p_Address')";
	
	$run = mysqli_query($con, $query);
	
		if($run) {
			?>
            
            <script>
            	window.open('sellphoneconfirmation.php', '_self');
            </script>
            
            <?php
		}
	
} else { ?>
	
    <label class="label label-danger" style="font-size:16px;">Please fill out all required fields!!</label> <br><br>

<?php }




?>