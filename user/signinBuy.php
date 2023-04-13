<?php

include("../includes/db_con.php");

if (!session_start()) {
	session_start();
}

$email = $_POST['email'];
$pass = $_POST['pass'];

if ($email && $pass != " ") {
	
	global $con;
	$query = "SELECT * FROM users WHERE user_email = '$email'";
	$run = mysqli_query($con, $query);
		
				$row = mysqli_fetch_array($run);
		
				$count = mysqli_num_rows($run);
				
				if ($count > 0 && $row['user_password'] == md5($pass) ) {
					//Take to user page
					$_SESSION['u_email'] = "$email";
					$_SESSION['u_Id'] = $row['user_id'];
					?>
                    <br>
					<label class="label label-success" style="font-size:16px;">Please wait...</label>
                    <script>setTimeout(function() { window.open("./usercheckout.php", "_self") }, 1000);</script>
                    
                    <?php
				} else { ?>
                	<br>
					<label class="label label-danger" style="font-size:16px;">Email or Password is Incorrect</label>
			<?php	}
	
} else { ?>
					<br>
					<label class="label label-danger" style="font-size:16px;">Please fill all the fields</label>
			<?php	}




?>