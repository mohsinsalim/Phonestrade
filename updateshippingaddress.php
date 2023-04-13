<?php

session_start();

include("includes/db_con.php");

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css">
<link rel="stylesheet" media="screen and (min-width: 580px)" href="css/fixStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">


<script>

$(document).ready(function(e) {
    
	$("#updateaddButton").click(function(){
			
			var sa1 = $("#addline1").val();
			var sa2 = $("#addline2").val();
			var sac = $("#addcity").val();
			var sas = $("#addstate").val();
			var saz = $("#addzipcode").val();
			
	$.ajax({
			url: './user/updatingaddress.php',
			type: 'POST',
			data: {
				'sa1':sa1,
				'sa2':sa2,
				'sac':sac,
				'sas':sas,
				'saz':saz
			},
			success: function(data){
					$("#result").html(data);
				}
		});
	});
});


</script>

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
                <li class="text-center"><a href="profile.php" style="color:blue;">Home</a></li>
                           
            </ul>
        </div>
    </div>
</nav>


<!--PHP SCRIPT STARTS HERE-->
<?php
////
?>
<!--PHP SCRIPT ENDS HERE-->

<!-- //////////Container (Buy and Sell) dimgrey////////// -->

<div class="container-fluid text-center container_1">
	<h2 style="font-family: 'Maven Pro', sans-serif;">Enter Shipping Address</h2><br>
    <!--<p style="color:royalblue;">Trading Smartphone is Easy</p>-->

	<!-- //Login Form Start\\ -->
	
    <div class="text-center">
    
	<form>
		
        <div class="form-group">
        	<input id="addline1" name="addline1" style="width:300px; margin:0 auto; font-size:16px;" type="text" class="form-control input-lg" placeholder="Address Line 1">
        </div>
        <div class="form-group">
        	<input id="addline2" name="addline2" style="width:300px; margin:0 auto; font-size:16px;" type="text" class="form-control input-lg" placeholder="Address Line 2">
        </div>
        <div class="form-group">
        	<input id="addcity" name="addcity" style="width:300px; margin:0 auto; font-size:16px;" type="text" class="form-control input-lg" placeholder="City">
        </div>
        <div class="form-group">
        	<input id="addstate" name="addstate" style="width:300px; margin:0 auto; font-size:16px;" type="text" class="form-control input-lg" placeholder="State">
        </div>
        <div class="form-group">
        	<input id="addzipcode" name="addzipcode" style="width:300px; margin:0 auto; font-size:16px;" type="text" class="form-control input-lg" placeholder="Zip Code">
        </div>
        <br>
        <button id="updateaddButton" name="updateaddButton" style="width:280px;" type="button" class="btn btn-success btn-lg">Save Address</button>
    
    
    </form>
    <br>
    <!-- <label>Already Registered? <a href="login.php">Login here</a></label> -->
    
    <br><br>
    
    <div id="result"></div>
    	
	</div>	


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





















