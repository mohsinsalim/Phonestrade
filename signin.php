<?php

session_start();

include("includes/db_con.php");



if(!isset($_SESSION['user'])) { //1st
	
	if (isset($_POST['signinbutton'])) {
			$email = $_POST['user_email'];
			$pass = $_POST['user_password'];
			if ($email && $pass != " ") {
				
				$get_check = "SELECT * FROM users WHERE user_email = '$email'";	
		
				$run_check = mysqli_query($con, $get_check);
		
				$row_check = mysqli_fetch_array($run_check);
		
				$count = mysqli_num_rows($run_check);
				
				if ($count > 0 && $row_check['user_password'] == md5($pass) ) {
					//Take to user page
					$_SESSION['user_email'] = "$email";
					 
				} else {
					echo '<script type="text/javascript">',
     				'wrongPass();',
     				'</script>';
				}
				
			} else {
				echo '<script type="text/javascript">',
     				'noInputfunction();',
     				'</script>';	
			}
	}
	
	
	
	
	
	
	
} //1st








?>