<?php

session_start();

include("includes/db_con.php");

//header("Cache-Control: no cache");
//session_cache_limiter("private_no_expire");

if(!isset($_SESSION['u_email'])) {
	header('Location: login.php');
} else {
	//User email
	$useremail = $_SESSION['u_email'];
}

if(isset($_SESSION['org_referer']))
{
    $_SESSION['org_referer'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Profile - PhonesTrade</title>

<meta NAME="description" CONTENT="ON PHONES TRADE - WE SELL SMARTPHONES FOR THE CHEAPEST PRICE ONLINE & WE BUY SMARTPHONES ON A GREAT DEAL. PHONES TRADE OFFERS THE BEST PRICE WHEN YOU BUY OR TRADE-IN YOUR SMARTPHONES.">
<meta NAME="keywords" CONTENT="Trade in smartphones, cheap smartphones, buy smartphones, buy used smartphones, sell smartphones, verizon, at&t, t-mobile, sprint, used smartphones, verizon trade-in, verizon used cellphone, at&t used smartphones, at&t trade-in, t-mobile used smartphones, t-mobile trade-in, sprint used smartphones, sprint trade-in">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css">
<link rel="stylesheet" media="screen and (min-width: 580px)" href="css/fixStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">




</head>

<body>

<nav class="navbar navbar-default" style="margin-bottom:0">
	<div class="container-fluid">
    	<div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            	<span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php"><img class="navbar-brand logo" src="img/phonestradel_logo.jpg" alt="Phones Trade"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav navbar-right">
            	<li class="text-center"><a href="buyphone.php">Buy</a></li>
                <li class="text-center"><a href="sellphone.php">Sell</a></li>
                
                           
            </ul>
        </div>
    </div>
</nav>

<!--PHP SCRIPT STARTS FOR SHIPPING ADDRESS CHECK HERE-->
<?php
global $con;
//Getting user information
$query = "SELECT * FROM users WHERE user_email = '$useremail'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

//$name = $row['user_fname'];
$addressline1 = $row['Address_Line1'];
//$addressline2 = $row['Address_Line2'];
//$addressCity = $row['Address_City'];
//$addressState = $row['Address_State'];
//$addressZipCode = $row['Address_ZipCode'];

if (empty($addressline1)) {
	?>
	<div class="alert alert-info text-center" style="margin-bottom:0" role="alert">
  	<a href="updateshippingaddress.php" class="alert-link">Please click here to update your <u>SHIPPING ADDRESS!!</u></a>
	</div>
<?php    
}

?>
<!--PHP SCRIPT ENDS FOR SHIPPING ADDRESS CHECK HERE-->




<!--PHP SCRIPT STARTS HERE-->
<?php
global $con;
//Getting user information
$query = "SELECT * FROM users WHERE user_email = '$useremail'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

$name = $row['user_fname'];
$idUser = $row['user_id'];



?>
<!--PHP SCRIPT ENDS HERE-->

<!-- //////////Container (Buy and Sell) dimgrey////////// -->
<div class="container-fluid container_9">
	
	<div class="row">
		<div class="col-md-3">
			
            
            
			<div class="well">				
            
            <p class="lead" style="text-align:center; color:black"><?php echo $name;?>
				<hr>
				<ul class="nav nav-pills nav-stacked">
                
        			<li class="text-center"><a style="color: navyblue"; href="profile.php">Purchases</a></li>
        			<li class="text-center"><a style="color: navyblue"; href="settings.php">Settings</a></li>
        			<li class="text-center"><a style="color: red"; href="logout.php">Logout</a></li>
      			</ul>
			</div>
			
		</div>
		
		<div class="col-md-9">
			
			<div class="well text-center">
				<h3>Purchased items</h3>
			</div>
			<br>
            
            <!--Check if data exist PHP-->
            <?php
            $pur_query = "SELECT * FROM orderconfirmation WHERE user_id = '$idUser'";
			$pur_run = mysqli_query($con, $pur_query);
			if (mysqli_num_rows($pur_run) > 0) { ?>
			
                      
		<div class="table-responsive">
    		<table class="table">
    			<thead>
            		<tr>
                    	<th style="text-align:center">Phone</th>
                    	<th style="text-align:center"></th>
                    	<th style="text-align:center">Purchase Date</th>
                    	<th style="text-align:center">Payment</th>
                        <th style="text-align:center">Shipment Status</th>
                	</tr>
            	</thead>
                <tbody>
                
                 <?php
			
			//PHP Script for purchased items
			
			$pur_query = "SELECT * FROM orderconfirmation WHERE user_id = '$idUser'";
			$pur_run = mysqli_query($con, $pur_query);
			while($pur_row = mysqli_fetch_array($pur_run)) {
				
				//shipping
				if ($pur_row['shipment_status'] > 0) {
					$shipping = "Shipped";
				} else {
					$shipping = "Pending";
				}
				
			?>
                
                
                	<tr>
                    	<td style="text-align:center">
                        	<img src="admin/phone_images/iphone5s.jpg" alt="" width="40" height="80">
                        </td>
                        <td style="text-align:center; padding-top:38px;"><?php echo $pur_row['name_of_devices'];?></td>
                        <td style="text-align:center; padding-top:38px;"><?php echo date('m-d-Y', strtotime($pur_row['date']));?></td>
                        <td style="text-align:center; padding-top:38px;">PAID</td>
                        <td style="text-align:center; padding-top:38px;"><?php echo $shipping;?></td>
                    </tr>
                    
                    <?php
                    }
                    ?>
                </tbody>
        	</table>        
         </div>
         
         <?php 
			} else {
		 ?>       
            <p class="text-center">Nothing Found!!</p>
			<br><hr>
            <?php
			}
			?>
            
            
		</div>
		
	</div>
	

</div>








<div style="clear:both"></div>








<!-- //////////Container (CONTACT US)////////// -->
<div class="container-fluid bg-ghostwhite container_2">
	<h2 class="text-center">CONTACT</h2>
    <div class="row row2">
    	<div class="col-sm-5">
      		<p>Contact us and we'll get back to you within 24 hours.</p>
      		<p><span class="glyphicon glyphicon-map-marker"></span> Virginia, US</p>
      		<p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      		<p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p> 
    	</div>
        <div class="col-sm-7">
      		<div class="row">
        		<div class="col-sm-6 form-group">
          			<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        		</div>
        		<div class="col-sm-6 form-group">
          			<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        		</div>
      		</div>
      		<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      		<div class="row">
        		<div class="col-sm-12 form-group">
          		<button class="btn btn-default pull-right" type="submit">Send</button>
        		</div>
      		</div> 
    	</div>
    </div>
</div>


</body>
</html>





















