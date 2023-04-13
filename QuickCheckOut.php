<?php

session_start();

include("includes/db_con.php");

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Phones Trade</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css" type="text/css">
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
            	<li><a href="buyphone.php">Buy</a></li>
                <li><a href="sellphone.php">Sell</a></li>
                <li style="letter-spacing:1.8px;"><a style="color:blue; margin:0; padding-right:1.5px;" href="login.php">Sign in</a></li> 
                <li style="letter-spacing:1.8px;padding-top:16px;">|</li>
                <li style="letter-spacing:1.8px;"><a style="color:blue; margin:0; padding-right:0; padding-left:1.5px;" href="register.php">Sign up</a></li>           
            </ul>
        </div>
    </div>
</nav>

<!-- //////////Container (Quick Checkout)////////// -->
<br>
<div class="container">
	<div class="row">
    	<div class="col-sm-4">
        <h3 class="text-center" style="color:#3f3f3f;">Enter your shipping address</h3><br>
        	<div class="row">
            	<form>
                <div class="col-sm-12">
                	
                    	<div class="form-group">
                        	<input type="text" class="form-control" placeholder="Full name">
                        </div>
                        <div class="form-group">
                        	<input type="text" class="form-control" placeholder="Address Line 1">
                        </div>
                        <div class="form-group">
                        	<input type="text" class="form-control" placeholder="Address Line 2">
                        </div>
                        <div class="form-group">
                        	<input type="text" class="form-control" placeholder="City">
                        </div>
                    
                </div>
                
                <div class="col-sm-5">
                	<div class="form-group">
                        	<input type="text" class="form-control" placeholder="State">
                    </div>	
                </div>
                <div class="col-sm-7">
                	<div class="form-group">
                        	<input type="text" class="form-control" placeholder="Zip Code">
                        </div>
                </div>
                </form>
            </div>
            <br><br>
        </div>
        
        <!-- 2nd Div for Email-->
        
        <div class="col-sm-4">
            <h3 class="text-center" style="color:#3f3f3f;">Enter contact information</h3><br>
            <div class="form-group">
        	<input style="width:300px; margin:0 auto; padding:20px; font-size:16px;" type="email" class="form-control" id="user_email" name="user_email" placeholder="Email address">
        </div>
        <div class="form-group">
        	<input id="cellphone" name="cellphone" style="width:300px; margin:0 auto; padding:20px; font-size:16px;" type="text" class="form-control" placeholder="Mobile number">
        </div>
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
























