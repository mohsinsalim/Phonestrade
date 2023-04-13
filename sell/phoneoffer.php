<?php

session_start();
include("../includes/db_con.php");

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

if (!isset($_SESSION['sellphone_id'])) {
	header('Location: ../sellphone.php');
} else if (!isset($_SESSION['user_sell_email'])) {
	header('Location: ../sellphone.php');
} else if (isset($_SESSION['sellphone_id'])) {
	
	//getting session here
	
$fixSellPrice = $_SESSION['user_sell_price'];
$sellingcondition = $_SESSION['$user_sell_phone_cond'];

	
}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Accept Offer - PhonesTrade</title>

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

<script type="text/javascript">

$(document).ready(function(e) {
		 
		 
		 $( "#checkinfoSubmit" ).click(function(){
		
		//getting values
		 var payToFname = $( "#payToFname" ).val();
		 var payToLname = $( "#payToLname" ).val();
		 var addLine1 = $( "#addLine1" ).val();
		 var addLine2 = $( "#addLine2" ).val();
		 var addCity = $( "#addCity" ).val();
		 var addState = $( "#addState" ).val();
		 var addZip = $( "#addZip" ).val();
		
			
		 //ajax
		 $.ajax({
			 
			 	url: './include/sellphoneinfoverify.php',
				type: 'POST',
				data: {
					payToFname:payToFname,
					payToLname:payToLname,
					addLine1:addLine1,
					addLine2:addLine2,
					addCity:addCity,
					addState:addState,
					addZip:addZip
				},
				success: function(data) {
					$( "#confirmationResult" ).html(data);
				}
			 
			 
			 });
		}); //click submit button 
		 
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


<!--PHP SCRIPT STARTS HERE-->
<?php
////
		global $con;
		$id = $_SESSION['sellphone_id'];
		$query = "SELECT * FROM sellphones WHERE sellphone_id='$id'";
		$run = mysqli_query($con, $query);
		$row = mysqli_fetch_array($run);

		$make = $row['sellphone_brand'];
		$model = $row['sellphone_title'];
		$size = $row['sellphone_capacity'];
		$carrier = $row['sellphone_carrier'];
		
		$_SESSION['device_make'] = $make;
		$_SESSION['device_model'] = $model;
		$_SESSION['device_size'] = $size;
		$_SESSION['device_carrier'] = $carrier;
?>
<!--PHP SCRIPT ENDS HERE-->

<!-- //////////Container (Buy and Sell) dimgrey////////// -->

<div class="container-fluid text-center container_1">
	
    <div class="row">
    	
        <div class="col-md-6 col-md-push-6" style="border: 1px solid blue;">
        	<table class="table">
    <thead>
     <h3 class="text-center">Device you are selling</h3><br>
    </thead>
    <tbody>
      <tr>
        <td>Make</td>
        <td><?php echo $make;?></td>
      </tr>
      <tr>
        <td>Model</td>
        <td><?php echo $model;?></td>
      </tr>
      <tr>
        <td>Size</td>
        <td><?php echo $size." "."GB";?></td>
      </tr>
      <tr>
        <td>Carrier</td>
        <td><?php echo $carrier;?></td>
      </tr>
      <tr>
        <td>Condition</td>
        <td><?php echo $sellingcondition;?></td>
      </tr>
      <tr>
        <td colspan="4"><h1 style="color:green;">$<?php echo $fixSellPrice;?></h1></td>
      </tr>
      
    </tbody>
  </table>	
        </div>
        
        <div class="col-md-6 col-md-pull-6">
        	<h2 class="text-left" style="font-family: 'Maven Pro', sans-serif;">Final Step!</h2>
            <p class="text-left" style="font-family: 'Maven Pro', sans-serif; font-size:15px;margin-bottom:-15px; margin-top: 5px;">Personal Information</p>
            <hr>
            <form id="forCheckForm" method="post">
            		<div class="form-group text-left" style="width:400px;">
                        <label for="payTo">First name<span style="color:red;">*</span></label>
                    	<input type="text" class="form-control" id="payToFname">
                    </div>
                    <div class="form-group text-left" style="width:400px;">
                        <label for="payTo">Last Name<span style="color:red;">*</span></label>
                    	<input type="text" class="form-control" id="payToLname">
                    </div>
                    <div class="form-group text-left" style="width:400px;">
                    	<label for="payTo">Address Line 1<span style="color:red;">*</span></label>
                    	<input type="text" class="form-control" id="addLine1">
                    </div>
                    <div class="form-group text-left" style="width:400px;">
                    	<label for="payTo">Address Line 2</label>
                    	<input type="text" class="form-control" id="addLine2">
                    </div>
                    <div class="form-group text-left" style="width:400px;">
                    	<label for="payTo">City<span style="color:red;">*</span></label>
                    	<input type="text" class="form-control" id="addCity">
                    </div>
                    <div class="form-group text-left" style="width:400px;">
                    	<label for="payTo">State<span style="color:red;">*</span></label>
                    	<input type="text" class="form-control" id="addState">
                    </div>
                    <div class="form-group text-left" style="width:400px;">
                    	<label for="payTo">Zip Code<span style="color:red;">*</span></label>
                    	<input type="text" class="form-control" id="addZip">
                    </div>
                    <div class="form-group text-left" style="margin:auto">
                        <br>
                        <button id="checkinfoSubmit" name="checkinfoSubmit" type="button" class="btn btn-success btn-lg" style="width:400px;">Get Paid</button>
                        <br><br>
                        <div id="confirmationResult"></div>
                        <div style="width:400px" class="alert alert-warning" role="alert">Note: To avoid any delays in payment, please provide correct information in all the fields</div> <br><br>
                        
                    </div>
                    
                </form>
        </div>
        
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





















