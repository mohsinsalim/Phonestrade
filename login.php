<?php

session_start();

include("includes/db_con.php");

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

if(isset($_SESSION['u_email'])) {
	header('Location: index.php');
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Phones Trade - LOGIN PAGE, PLEASE LOGIN HERE</title>

<META NAME="description" CONTENT="ON PHONES TRADE - WE SELL SMARTPHONES FOR THE CHEAPEST PRICE ONLINE & WE BUY SMARTPHONES ON A GREAT DEAL. PHONES TRADE OFFERS THE BEST PRICE WHEN YOU BUY OR TRADE-IN YOUR SMARTPHONES.">
<META NAME="keywords" CONTENT="Trade in smartphones, cheap smartphones, buy smartphones, buy used smartphones, sell smartphones, verizon, at&t, t-mobile, sprint, used smartphones, verizon trade-in, verizon used cellphone, at&t used smartphones, at&t trade-in, t-mobile used smartphones, t-mobile trade-in, sprint used smartphones, sprint trade-in">

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
	$(document).ready(function() {
		
		$(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $("#signinbutton").trigger('click');
             }
        });
		
        $("#signinbutton").click(function(){
			
			var useremail = $("#user_email").val();
			var userpass = $("#user_password").val();
			
			$.ajax({
				url: 'user/signin.php',
				data: {'user_email':useremail, 'user_pass':userpass},
				type: 'POST',
				success: function(data){ 
					$("#result").html(data);										
				}
				}); 
						
			});
    });
</script>

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
                
                <li id="signin" style="letter-spacing:1.8px; text-align:center;"><a id="signinanchor" style="color:blue; margin:0; padding-right:1.5px;" href="login.php">Sign in</a></li> 
                <li id="separator" style="letter-spacing:1.8px;padding-top:16px;">|</li>
                <li id="signup" style="letter-spacing:1.8px; text-align:center;"><a id="signupanchor" style="color:blue; margin:0; padding-right:0; padding-left:1.5px;" href="register.php">Sign up</a></li>
                           
            </ul>
        </div>
    </div>
</nav>

<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid text-center container_1">
	<h2 style="font-family: 'Maven Pro', sans-serif;">Please Sign in</h2><br>
    <!--<p style="color:royalblue;">Trading Smartphone is Easy</p>-->

	<!-- //Login Form Start\\ -->
	
    <div class="text-center">
    
	<form>
		
        <div class="form-group">
        	<input style="width:300px; margin:0 auto; font-size:16px;" type="email" class="form-control input-lg" id="user_email" name="user_email" placeholder="Email address" autofocus>
        </div>
        <div class="form-group">
        	<input style="width:300px; margin:0 auto; font-size:16px;" type="password" class="form-control input-lg" id="user_password" name="user_password" placeholder="Password">
        </div>
    	<div class="checkbox">
        	<label><input type="checkbox">Remember me</label>
        </div>
        <button style="width:280px;" id="signinbutton" type="button" class="btn btn-primary btn-lg">Sign in</button>
    
    
    </form>
    
    <br>
    
    <label>Not a user? <a href="register.php">Register here</a></label>
    
    <br><br>
    
    <!--result will be posted here-->
    <div id="result"></div>
    	
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
























