<?php

session_start();
include("includes/db_con.php");
require_once("p_config.php");

if (!isset($_SESSION['paid'])) {
	header('Location: buyphone.php');
}

$x = $_SESSION['grand_total'];

if(!isset($_SESSION['grand_total'])){

header('Location: buyphone.php');	
	
} else if ($x <= 0) {
	header('Location: buyphone.php');
}

if(isset($_SESSION['org_referer']))
{
    $_SESSION['org_referer'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

if (isset($_SESSION['user_email_verify'])) {
//getting user_email
$uemail = $_SESSION['user_email_verify'];

//getting user_name
$uname = $_SESSION['user_name_verify'];

}

if (isset($_SESSION['order_no'])) {
	$order_number = $_SESSION['order_no'];
} else {
	$order_number= "Nothing Found";
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Confirmation - Phones Trade</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">

<script src="https://checkout.stripe.com/checkout.js"></script>


</head>

<body>

<nav class="navbar navbar-default">
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


<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid container_1">
		<br>
  		<h3 class="text-center" style="font-family: 'Open Sans', sans-serif; color: black; font-size: 30px;">Thank You for placing order with us!!</h3>
  		
  		<?php
		$newquery = "SELECT * FROM orderconfirmation WHERE c_email = '$'";
		
	
	    ?>
<br><br><hr>
  		<div class="row row2 text-center">
  			<div class="col-lg-6">
  				<p class="h4">Order Number: <?php echo $order_number;?></p><br>
  				<p class="h4">Shipping Status: Pending</p><br><br><br>
  			</div>
  			<div class="col-lg-6">
  				<p class="h4">Click the button</p>
  				<a href="buyphone.php"><button style="margin:5px;" type="button" class="btn btn-lg btn-success">For more shopping</button></a><br><br>
  			</div>
  		</div>
        <hr><br>
        <div class="row text-center">
        	<div class="col-sm-12">
            	<a href="index.php"><button style="margin:5px;" type="button" class="btn btn-lg btn-default">Return to PhonesTrade</button></a><br>
            </div>
        </div>
   	
    
</div> <br><br>









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

