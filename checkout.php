<?php

session_start();

include("includes/db_con.php");
require_once("./p_config.php");

$x = $_SESSION['grand_total'];

if(!isset($_SESSION['grand_total'])){

header('Location: buyphone.php');	
	
} else if ($x <= 0) {
	header('Location: buyphone.php');
}

if (isset($_SESSION['u_email'])) {
	header('Location: usercheckout.php');
}

if(isset($_SESSION['org_referer']))
{
    $_SESSION['org_referer'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>

<?php


//Displaying values in Cart
				if (isset($_SESSION['cart'])) {
					
					foreach($_SESSION['cart'] as $Id=>$value) {
						
						$query = "SELECT * FROM buyphones WHERE phone_id = '$Id'";
						$run_query = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($run_query)) {
							
							$p_model = $row['phone_model'];
$model_query = "SELECT * FROM phone_models WHERE model_id = '$p_model'";
				$model_run = mysqli_query($con, $model_query);
								while($model_row= mysqli_fetch_array($model_run)) {
									$p_title[] = $model_row['model_title'];
									$_SESSION['model_name'] = $p_title;
								} 
						}
					}
				}
?>


<?php

$_SESSION['totalDevices'] = sizeof($p_title);
$sizeofArray = sizeof($p_title);
?>





<!--HTML STARTS HERE-->






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Phones Trade - Check Out Page</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">

<!-- jQuery library -->
<script
  src="http://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<script src="https://checkout.stripe.com/checkout.js"></script>

<script type="text/javascript">

$(document).ready(function(e) {

var handler = StripeCheckout.configure({
  key: 'pk_test_nEFscUbErlin3CpU6Zj16pPI',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token, args) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
	  console.log(token);
      //alert(token.id);
	  
	  $.ajax({
        type: "POST",
        url: "./charge.php",
        data: { 
			
			stripeToken:token.id,
			stripeEmail:token.email,
			customerName:args.shipping_name,
			customerAddLine1:args.shipping_address_line1,
			customerCity:args.shipping_address_city,
			customerZipCode:args.shipping_address_zip
		  
		  },
		 success: function(data) {
		 	$("#result").html(data);
		 }
		
      })
  }
});



document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
	
  handler.open({
    name: 'Phones Trade',
	billingAddress: true,
	shippingAddress: true,
    description: '<?php for($i = 0; $i<sizeof($p_title);$i++) {
	if ($i<$sizeofArray-1) {
		$comma = ", ";
	} else {
		$comma = "";
	}
	echo $p_title[$i] . $comma; }?>',
    zipCode: true,
    amount: "<?php echo $x*100; ?>"
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});




//sign in handler

$( "#signinbutton" ).click(function(){
	
	var email = $( "#user_email" ).val();
	var pass = $( "#user_password" ).val();
	
	$.ajax({
		
		url: 'user/signinBuy.php',
		type: 'POST',
		data: {
			email:email,
			pass:pass
		},
		success: function(data) {
			$( "#signinerror" ).html(data);
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
                           
            	
            </ul>  	
        </div>
    </div>
</nav>


<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid text-center container_1">
	<h1 style="font-family: 'Maven Pro', sans-serif;">Phones Trade</h1>
    <hr><br>
    <div class="row">
    	<div class="col-md-5">
        	<h2 style="font-family: 'Maven Pro', sans-serif;">Please Sign in</h2><br>
            
            <form>
		
        <div class="form-group">
        	<input style="width:300px; margin:0 auto; padding:20px; font-size:16px;" type="email" class="form-control" id="user_email" name="user_email" placeholder="Email address">
        </div>
        <div class="form-group">
        	<input style="width:300px; margin:0 auto; padding:20px; font-size:16px;" type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
            <div id="signinerror"></div>
        </div>
    	<div class="checkbox">
        	<label><input type="checkbox">Remember me</label>
        </div>
        <button style="width:280px;" id="signinbutton" type="button" class="btn btn-primary btn-lg">Sign in</button>
    
    
    </form>
      
      <br>
    
    <label>Not a user? <a href="register.php">Register here</a></label>
      
      <br>
       
        </div>
        
        <div class="col-md-2">
        	<br><br>
        	<br><br><br><br><p class="lead">or</p><br><br>
        </div>
        
        <div class="col-md-5">
        <br><br>
        <h3>Don't have time? Quick Checkout</h3>
        <br>
            <p>We recommend to sign in</p>
            <br>
            <p class="lead">
    		<a class="btn btn-success btn-lg" id="customButton" role="button">Quick Check out</a>
  			</p>
      		<br>
      		<br>
       	<div id="result"></div>
        </div>
    </div>
    
</div> <br><br>



<!-- //////////Container (CONTACT US)////////// -->
<!-- //////////Container (CONTACT US)////////// -->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Phonestrade/includes/contact.php';?>

<!-- //////////Container (CONTACT US)////////// -->
<!-- //////////Container (CONTACT US)////////// -->




</body>
</html>
















