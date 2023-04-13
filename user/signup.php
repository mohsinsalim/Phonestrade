<?php

session_start();
include("../includes/db_con.php");


if (!isset($_SESSION['user'])) {
	
		$fname = mysqli_real_escape_string($con,$_POST['name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['pass']);
		$confirmPassword = mysqli_real_escape_string($con, $_POST['cpass']);
		$number = mysqli_real_escape_string($con, $_POST['cellphone']); 
		if ($fname && $email && $password && $confirmPassword && $number != " ") {
			if (strcmp("$password","$confirmPassword") === 0) {
				
				$pass = md5($password);
				
				//check
				
				$email_check = "SELECT * FROM users where user_email = '$email'";
				$run_chk = mysqli_query($con, $email_check);
				$num_of_rows = mysqli_num_rows($run_chk);
				if ($num_of_rows == 0) {
				
				//Inserting values into DB
			$query = "INSERT INTO users (user_fname, user_email, user_password, 								user_mobileNumber) values ('$fname', '$email', '$pass', '$number')";	
				$run_query = mysqli_query($con, $query);
				if ($run_query) {
					echo '<label class="label label-info" style="font-size:16px;">Please wait...</label>';
				?>
				
                	<script>setTimeout(function() { window.open("login.php", "_self") }, 1000);</script>
				
				<?php
                }
				
				} else { //if user email already exist!!
					echo '<label class="label label-danger" style="font-size:16px;">This email address is already registered!! Please try another</label>';
				}

				
				
				
				
				
				
			} else { //if both password doesnot match
					echo '<label class="label label-danger" style="font-size:16px;">The password you entered doesnot match!! Try again</label>';
			}
		} else { //if user doesnot enter any value
			echo '<label class="label label-danger" style="font-size:16px;">Please complete the form!!</label>';
		}
		
	
	
}












?>