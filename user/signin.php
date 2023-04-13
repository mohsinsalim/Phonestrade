<?php

session_start();



include("../includes/db_con.php");

if(!isset($_SESSION['u_email'])) { //1st
	
	
			$email = $_POST['user_email'];
			$pass = $_POST['user_pass'];
			if ($email && $pass != " ") {
				
				$get_check = "SELECT * FROM users WHERE user_email = '$email'";	
		
				$run_check = mysqli_query($con, $get_check);
		
				$row_check = mysqli_fetch_array($run_check);
		
				$count = mysqli_num_rows($run_check);
				
				if ($count > 0 && $row_check['user_password'] == md5($pass) ) {
					//Take to user page
					$_SESSION['u_email'] = "$email";
					$_SESSION['u_Id'] = $row_check['user_id'];
                    echo '<label class="label label-info" style="font-size:16px;">Please wait...</label>';
					  
					if (isset($_SESSION['org_referer']) == true) {
					$x = $_SESSION['org_referer']; ?>
					<script>setTimeout(function() { window.open("<?php echo $x;?>", "_self") }, 1000);</script>
				<?php	} else {
						$x = "index.php";
						?>
						<script>setTimeout(function() { window.open("<?php echo $x;?>", "_self") }, 1000);</script>
					<?php }
					 
				} else {
					echo '<label class="label label-danger" style="font-size:16px;">Email or Password is Incorrect</label>';
				}
				
			} else {
				echo '<label class="label label-danger" style="font-size:16px;">Please enter Username and Password!!</label>';	
			}
	
	
	
	
	
	
	
	
} //1st








?>