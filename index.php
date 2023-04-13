<?php
session_start();


if(!isset($_SESSION['org_referer']))
{
    $_SESSION['org_referer'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

include("includes/db_con.php");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Phones Trade - Buy Smartphones & Sell Smartphones</title>

<META NAME="description" CONTENT="ON PHONES TRADE - WE SELL SMARTPHONES FOR THE CHEAPEST PRICE ONLINE & WE BUY SMARTPHONES ON A GREAT DEAL. PHONES TRADE OFFERS THE BEST PRICE WHEN YOU BUY OR TRADE-IN YOUR SMARTPHONES.">
<META NAME="keywords" CONTENT="Trade in smartphones, cheap smartphones, buy smartphones, buy used smartphones, sell smartphones, verizon, at&t, t-mobile, sprint, used smartphones, verizon trade-in, verizon used cellphone, at&t used smartphones, at&t trade-in, t-mobile used smartphones, t-mobile trade-in, sprint used smartphones, sprint trade-in">

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

<script>

	$(document).ready(function(e) {
        $("#messageSendButton").click(function() {
			
			var fullname = $("#name").val();
			var email = $("#email").val();
			var comments = $("#comments").val();
			
			$.ajax({
				
				url: 'contact.php',
				data: {name:fullname, email:email, comments:comments},
				type: 'POST',
				beforeSend: function() {
					$("#loaderdiv").show();
				},
				success: function(data) {
					$("#contactResult").html(data);
					$('input[type="text"],input[type="email"], textarea').val('');
				}
				
				
				
				});
			
			});
    });
	
</script>

</head>

<body>
<!--<h2 class="text-center">Website under construction!!</h2>-->
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
                
                <!-- PHP SCRIPT STARTS FOR LOGIN -->
                
                <?php
				global $con;
				if (isset($_SESSION['u_email'])) {
				$value = $_SESSION['u_email'];	
				$query = "SELECT * FROM users where user_email = '$value'";
				$run_query = mysqli_query($con, $query);
	
				$rows = mysqli_fetch_array($run_query); 
				$name = $rows['user_fname'];
				
				}
				global $name;
                if (!isset($_SESSION['u_email'])) {
				?>	
                <li id="signin" style="letter-spacing:1.8px; text-align:center;"><a id="signinanchor" style="color:blue; margin:0; padding-right:1.5px;" href="login.php">Sign in</a></li> 
                <li id="separator" style="letter-spacing:1.8px;padding-top:16px;">|</li>
                
                <li id="signup" style="letter-spacing:1.8px; text-align:center;"><a id="signupanchor" style="color:blue; margin:0; padding-right:0; padding-left:1.5px;" href="register.php">Sign up</a></li>
			<?php	}
               
               
               else { 
				?> <li style="letter-spacing:1.8px;"><a id="username" style="color:blue; margin:0; padding-right:1.5px;" href="profile.php"><?php echo strtoupper($name); ?></a>
                </li>           
			  <?php }
                ?>
                <!-- PHP SCRIPT ENDS FOR LOGIN -->
                
            </ul>  	
        </div>
    </div>
</nav>

<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid text-center container_1">
	<h1 style="font-family: 'Maven Pro', sans-serif; color: black;">Phones Trade</h1>
    <p style="color:blue;">Trading Smartphone is Easy</p><br><br>
    <div class="row row1">
    	<div class="col-sm-0 col-md-1"></div> <!--Empty Div-->
    	<div class="col-sm-6 col-md-5">
        	<a href="buyphone.php"><img id="buyPhoneImg" src="img/buyphone.jpg" alt="Buy Phone"></a><br>
            <a href="buyphone.php"><button type="button" id="buyPhoneBtn" class="btn btn-success btn-lg btnBandS">Buy Phone</button></a>
        </div>
        
         <!-- Add the extra clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
        
        <div class="col-sm-6 col-md-5">
        	<a href="sellphone.php"><img id="sellPhoneImg" src="img/sellphone.jpg" alt="Sell Phone"></a><br>
            <a href="sellphone.php"><button type="button" class="btn btn-primary btn-lg btnBandS">Sell Phone</button></a>
        </div>
        <div class="col-sm-0 col-md-1"></div> <!--Empty Div-->
    </div>
</div>


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

<!-- //////////(Carousel and Indicators)////////// -->
<div class="container-fluid text-center container_2">
	<h2>CUSTOMERS FEEDBACK</h2>
    <p>We Value Our All Customers</p>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    	<!--Indicators-->
        <ol class="carousel-indicators">
        	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
        	<div class="item active">
            	<h4>"I just spend 2 minutes to sell my old phone, never thought it would be that easy to sell a phone." <br><br> <span style="font-style:normal;">Richard Cooper</span></h4>
            </div>
            <div class="item">
            	<h4>"Quick and easy process, they paid me real fast." <br><br> <span style="font-style:normal;">Ryan Miranda</span></h4>
            </div>
            <div class="item">
            	<h4>"Checked multiple websites, got best price through Phones Trade." <br><br> <span style="font-style:normal;">Ashley Winslet</span></h4>
            </div>
        </div>
        <!--Left and Right Arrow Controlls-->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        	<span class="glyphicon glyphicon-chevron-left" aria-hidden="hidden"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        	<span class="glyphicon glyphicon-chevron-right" aria-hidden="hidden"></span>
            <span class="sr-only">Next</span>
        </a>
        
    </div>
</div>

<div class="text-center" id="contactResult"></div>

<!-- //////////Container (CONTACT US)////////// -->
<div class="container-fluid bg-ghostwhite container_2">
	<h2 class="text-center">CONTACT</h2>
    <div class="row row2">
    	<div class="col-sm-5">
      		<p>Contact us and we'll get back to you within 24 hours.</p>
      		<p><span class="glyphicon glyphicon-map-marker"></span> Virginia, US</p>
      		<p><span class="glyphicon glyphicon-phone"></span>  +1(571)969-0594</p>
      		<p><span class="glyphicon glyphicon-envelope"></span> contact@phonestrade.com</p> 
    	</div>
        <form action="#">
        <div class="col-sm-7">
      		<div class="row">
        		<div class="col-sm-6 form-group">
          			<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        		</div>
        		<div class="col-sm-6 form-group">
          			<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        		</div>
      		</div>
      		<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      		<div class="row">
        		<div class="col-sm-12 form-group">
          		<button class="btn btn-default pull-right" id="messageSendButton" type="button">Send</button>
        		</div>
      		</div> 
    	</div>
        </form>
    </div>
</div>


</body>
</html>














