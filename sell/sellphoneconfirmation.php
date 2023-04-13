<?php

session_start();

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");





?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmation - PhonesTrade</title>

<meta NAME="description" CONTENT="ON PHONES TRADE - WE SELL SMARTPHONES FOR THE CHEAPEST PRICE ONLINE & WE BUY SMARTPHONES ON A GREAT DEAL. PHONES TRADE OFFERS THE BEST PRICE WHEN YOU BUY OR TRADE-IN YOUR SMARTPHONES.">
<meta NAME="keywords" CONTENT="Trade in smartphones, cheap smartphones, buy smartphones, buy used smartphones, sell smartphones, verizon, at&t, t-mobile, sprint, used smartphones, verizon trade-in, verizon used cellphone, at&t used smartphones, at&t trade-in, t-mobile used smartphones, t-mobile trade-in, sprint used smartphones, sprint trade-in">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="../css/style.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="../css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="../css/xsmallStyle.css">
<link rel="stylesheet" media="screen and (min-width: 580px)" href="../css/fixStyle.css">

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
            <a href="../index.php"><img class="navbar-brand logo" src="../img/phonestradel_logo.jpg" alt="Phones Trade"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav navbar-right">
            	<li class="text-center"><a href="../buyphone.php">Buy</a></li>
                <li class="text-center"><a href="../sellphone.php">Sell</a></li>
                           
            </ul>
        </div>
    </div>
</nav>




<!-- //////////Container (Confirmation) ////////// -->

<div class="container-fluid container_1">
	<br>
    <h1 style="color:#ff7900; text-align:center">Thank you</h1>
   	<br> 
    <p>We have recieved your request for selling the cellphone, you will recieve an email with the shipment label at <u>test@gmail.com</u> within 24 hours.</p>    
   
   	<br><br><br><br>
    <hr><br>
    <h3 class="text-center">Please read the instructions</h3>
   	<br>
   	<div class="alert alert-info" role="alert">
    	<br>
    	<p>. Please erase all personal data and information from the phone</p><br>
        <p>. Please make sure to remove all the accounts from the phone. e.g, iclould, google, samsung account</p><br>
        <p>. Please power off the phone before putting it in the box</p><br>
        <br>
    </div>
   
   	<br><br><br><br><br><br>
   
</div>






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





















