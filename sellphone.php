<?php
include("./includes/db_con.php");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Phones Trade - Sell Smartphones - Trade-In Smartphones and Get Paid Quickly</title>

<META NAME="description" CONTENT="ON PHONES TRADE - WE SELL SMARTPHONES FOR THE CHEAPEST PRICE ONLINE & WE BUY SMARTPHONES ON A GREAT DEAL. PHONES TRADE OFFERS THE BEST PRICE WHEN YOU BUY OR TRADE-IN YOUR SMARTPHONES.">
<META NAME="keywords" CONTENT="Trade in smartphones, cheap smartphones, buy smartphones, buy used smartphones, sell smartphones, verizon, at&t, t-mobile, sprint, used smartphones, verizon trade-in, verizon used cellphone, at&t used smartphones, at&t trade-in, t-mobile used smartphones, t-mobile trade-in, sprint used smartphones, sprint trade-in">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css">
<link media="screen and (max-width: 900px)" href="css/smallStyle.css" rel="stylesheet">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<script src="js/phonestrade.js"></script>
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

<div class="well well-sm well1">Sell Phone &gt;</div>

<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid text-center container_3">
	<h1>Sell Phone</h1>
    <p class="colorRB">Select the Manufacturer</p>
                 
        	<div class="container-fluid text-center">
            	<div class="row row4" style="margin:0 auto;">
                	<div id="sellphoneStyle" class="col-sm-6 col-md-3">
                    	<a href="iphone.php"><?php echo '<img id="iphoneImage" src="img/iphoneThumbnail.jpg" alt="Iphone">' ?></a>
                        <br><br><a href="iphone.php"><p>Apple</p></a>
                    </div>
                    <div id="sellphoneStyle" class="col-sm-6 col-md-3">
                    	<a href="motorola.php"><img id="motorolaImage" src="img/motorolaThumbnail.jpg" alt="Motorola"></a>
                       <br><br><a href="motorola.php"><p>Motorola</p></a>
                    </div>
                    <div id="sellphoneStyle" class="col-sm-6 col-md-3">
                    	<a href="LG.php"><img id="lgImage" src="img/lgThumbnail.jpg" alt="LG"></a>
                        <br><br><a href="LG.php"><p>LG</p></a>
                    </div>
                    <div id="sellphoneStyle" class="col-sm-6 col-md-3">
                    	<a href="samsung.php"><img id="samsungImage" src="img/samsungThumbnail.jpg" alt="Samsung"></a>
                        <br><br><a href="samsung.php"><p>Samsung</p></a>
                    </div>
                </div>
            	
                
    		
           </div>

</div><br><br>
<!-- //////////Container (How It Works)////////// -->

<div class="container-fluid text-center bg-howitworks container_2">
	<h2>HOW IT WORKS</h2>
    <div class="row">
    	<div class="col-sm-4">
        	<span class="glyphicon glyphicon-phone logo-small"></span>
            <h3>&#x2460; Get an Offer</h3>
            <p><small>Select your device and<br>answer few questions.</small></p>
        </div>
        <div class="col-sm-4">
        	<span class="glyphicon glyphicon-envelope logo-small"></span>
            <h3>&#x2461; Ship it to Phones Trade</h3>
            <p><small>Device shipment is completely free.<br>We will check the device upon receiving.</small></p>
        </div>
        <div class="col-sm-4">
        	<span class="glyphicon glyphicon-usd logo-small"></span>
            <h3>&#x2462; Get Paid Quickly</h3>
            <p><small>Choose from Check or Paypal to<br>get paid quickly.</small></p>
        </div>
    </div>
    
</div>




<!-- //////////Container (CONTACT US)////////// -->
<div class="container-fluid bg-ghostwhite container_2">
	<h2 class="text-center">CONTACT</h2>
    <div class="row row2">
    	<div class="col-sm-5">
      		<p>Contact us and we'll get back to you within 24 hours.</p>
      		<p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
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

































