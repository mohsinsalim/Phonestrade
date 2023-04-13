<?php

session_start();

include("includes/db_con.php");
require_once("p_config.php");

$x = $_SESSION['grand_total'];

if(!isset($_SESSION['grand_total'])){

header('Location: buyphone.php');	
	
} else if ($x <= 0) {
	header('Location: buyphone.php');
}

if (!isset($_SESSION['u_email'])) {
	header('Location: login.php');
} else {
	$u_email = $_SESSION['u_email'];
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
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
	  console.log(token);
      //alert(token.id);
	  
	  $.ajax({
        type: "POST",
        url: "./charge.php",
        data: { 
			
			stripeToken:token.id,
			stripeEmail:token.email
			
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
	shippingAddress: false,
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

}); //document ready close
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

<?php
//PHP SCRIPT FOR ADDRESS
global $con;

$query = "SELECT * FROM users WHERE user_email = '$u_email'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

$adrsL1 = $row['Address_Line1'];
$adrsL2 = $row['Address_Line2'];
$adrsLCity = $row['Address_City'];
$adrsState = $row['Address_State'];
$adrsZipcode = $row['Address_ZipCode'];

if ($adrsL2 !== "") {
	$adrsL2 = " ". $adrsL2. ",";
}else {
	$adrsL2 = ",";
}

?>


<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid text-center container_1">
	<h2 style="font-family: 'Maven Pro', sans-serif; margin-bottom:-10px;">User Check Out</h2>
    <hr><br>
    
    <div id="adrsVerification">
    	

        	<div id="addressDisplay" class="well">
            <br>
            	<p class="lead">Please Verify Shipping Address</p>
                <br>
            	<h2 style="font-family: 'Open Sans', sans-serif; color:royalblue;"><?php
                	echo $adrsL1 . $adrsL2 ."<br>". $adrsLCity.", ". $adrsState.", ".$adrsZipcode;
				?></h2>
                <br>
                <br>
                <button style="margin: 5px;" type="button" id="editButton" class="btn btn-warning btn-lg">Edit Address</button>
                <button style="margin: 5px;" type="button" id="customButton" class="btn btn-success btn-lg">Check out</button>
                <br><br>
                <div id="result"></div>
            </div>
        
    </div>
    
    </div>
    <br><br><br><br>
            
            

<!-- //////////Container (CONTACT US)////////// -->
<!-- //////////Container (CONTACT US)////////// -->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Phonestrade/includes/contact.php';?>

<!-- //////////Container (CONTACT US)////////// -->
<!-- //////////Container (CONTACT US)////////// -->


</body>
</html>









