<?php
if (!session_start()) {
	session_start();
}
include("../../../includes/db_con.php");
global $con;
//iphone 6S PLUS 128GB Verizon
$_SESSION['sellphone_id'] = "31";
$query = "SELECT * FROM sellphones where sellphone_id = '31'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

$p1 = $row['broken_price'];
$p2 = $row['good_price'];
$p3 = $row['excellent_price'];
$cell_carrier = $row['sellphone_carrier'];
$cell_capacity = $row['sellphone_capacity'];
$cell_name = $row['sellphone_title'];
$cell_brand = $row['sellphone_brand'];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $cell_name ." ". $cell_capacity."GB"." ". $cell_carrier;?> - Phones Trade</title>

<meta NAME="description" CONTENT="ON PHONES TRADE - WE SELL SMARTPHONES FOR THE CHEAPEST PRICE ONLINE & WE BUY SMARTPHONES ON A GREAT DEAL. PHONES TRADE OFFERS THE BEST PRICE WHEN YOU BUY OR TRADE-IN YOUR SMARTPHONES.">
<meta NAME="keywords" CONTENT="Trade in smartphones, cheap smartphones, buy smartphones, buy used smartphones, sell smartphones, verizon, at&t, t-mobile, sprint, used smartphones, verizon trade-in, verizon used cellphone, at&t used smartphones, at&t trade-in, t-mobile used smartphones, t-mobile trade-in, sprint used smartphones, sprint trade-in">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->


<!-- Latest compiled JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../../../css/style.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 1280px)" href="../../../css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="../../../css/xsmallStyle.css">
<link rel="stylesheet" media="screen and (min-width: 580px)" href="../../../css/fixStyle.css">
<link rel="stylesheet" href="../../../css/wellLinkStyle.css" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script
  src="http://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>


<script type="text/javascript">
//jQuery Start
$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#sellwithus').offset().top
    }, 'slow');
	
	var dS = "$"
	var brokenPrice = <?php echo $p1;?>;
	var goodPrice = <?php echo $p2;?>;
	var excellentPrice = <?php echo $p3;?>;
	
	
	document.getElementById("price").innerHTML = dS + goodPrice;
	
	var condition = "Good";
	$.ajax({
								
				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:goodPrice,
						sell_condition:condition
				 	}
								
				});
		
	$('input[type=radio]').change( function() {
		
		$('html, body').animate({
        scrollTop: $('#phone_title').offset().top
    }, 'slow');
		
	if (document.getElementById("broken").checked) {
		document.getElementById("price").innerHTML = dS + brokenPrice;
		var condition = "Broken";
		$.ajax({
								
				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:brokenPrice,
						sell_condition:condition
				 	}
								
				});
			
	}
	else if (document.getElementById("good").checked) {
		document.getElementById("price").innerHTML = dS + goodPrice;
	    var condition = "Good";
		$.ajax({
								
				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:goodPrice,
						sell_condition:condition
				 	}
								
				});
			
	}
	else if (document.getElementById("excellent").checked) {
		document.getElementById("price").innerHTML = dS + excellentPrice;
		var condition = "Excellent";	
		$.ajax({
								

				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:excellentPrice,
						sell_condition:condition
				 	}
								
				});
				
	}
});
//get paid starts here
$( "#getPaidkey" ).click(function() {
	
	$( "#getPaidkey" ).hide( "slow", function() { //hiding paid button start
  		
		//Animation Slide down
					$('html, body').animate({
        			scrollTop: $('#offerContainer').offset().top
    				}, 'slow');	
	//End Animation
  
  $( "#gettingEmail" ).slideDown( "slow", function() { //sliding down to get email start
		 
	$( "#EmailSubmitButton" ).click(function(){
		//Email Submit Start & validation
		var getEmail = $( "#getEmailAddress" ).val();
		
		var result = isEmail(getEmail);
		if (result == false) {
			$( "#invalidEmail" ).show("fast",function(){});
		} else {
		
			$.ajax({
			url: '../../../sell/include/gettingemail.php',
			type: 'POST',
			data: {userEmail:getEmail}
		});
		//Email Submit End
		
		//Hide Email div Start
		$( "#gettingEmail" ).slideUp( "slow", function() {
			$('html, body').animate({
        			scrollTop: $('#offerContainer').offset().top
    				}, 'slow');
			//sliding down to get payment method
			$( "#gettingPayMethod" ).slideDown( "slow", function() {	
				// if check payment type is clicked
				$( "#checkPaymentType" ).click(function(){
					//Animation Slide down
					$('html, body').animate({
        			scrollTop: $('#howtoPay').offset().top
    				}, 'slow');
					//End Animation
					
					if ($('#paypalPayment').is(':visible')) {
						$( "#forPaypalForm" ).slideUp( "slow",function(){
						});
					}
						
					//For Check payment type
					$( "#forCheckForm" ).slideToggle( "slow", function() { 
							//submitting form for check type payment
							$( "#checkinfoSubmit" ).click(function(){
								
								var payTo = $( "#payTo" ).val();
								var addLine1 = $( "#addLine1" ).val();
								var addLine2 = $( "#addLine2" ).val();
								var addCity = $( "#addCity" ).val();
								var addState = $( "#addState" ).val();
								var addZip = $( "#addZip" ).val();
								
								$.ajax({
								
									url: '../../../sell/include/gettingcheckinfo.php',
									type: 'POST',
									data: {
										payTo:payTo,
										addLine1:addLine1,
										addLine2:addLine2,
										addCity:addCity,
										addState:addState,
										addZip:addZip
									},
									success: function(data) {
										$( "#checkPaymentError" ).html(data);
									}
								
								});
							
						});
					});				
				});
				
				//if Paypal button is clicked
				
				$( "#paypalPayment" ).click(function(){
					//Animation Slide down
					$('html, body').animate({
        			scrollTop: $('#howtoPay').offset().top
    				}, 'slow');
					//End Animation
					
					if ($('#forCheckForm').is(':visible')) {
						$( "#forCheckForm" ).slideUp( "slow",function(){
						});
					}			
						
						
					//For Paypal payment type
					$( "#forPaypalForm" ).slideToggle( "slow", function() { 
							
							//Paypal submit button Start
							$( "#paypalPaymentBtn" ).click(function(){
							
							var paypalEmail = $( "#paypalEmail" ).val();
							var confirmPaypalEmail = $( "#confirmPaypalEmail" ).val();
								
								$.ajax({
								
									url: '../../../sell/include/gettingpaypalinfo.php',
									type: 'POST',
									data: {
										paypalEmail:paypalEmail,
										confirmPaypalEmail:confirmPaypalEmail
									},
									success: function(data) {
										$( "#paypalError" ).html(data);
									}
								
								});
								
							});//Paypal submit button End
							
						}); //Paypal payment form end 
		
					});	
			});
			//End payment method 	
		});
		//Hide Email div End
	}
		});
		
  }); ////sliding down to get email end

	}); //hiding paid button end	

}); //get paid ends here


});
//Email validation function
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

//jQuery End
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
            <a href="../../../index.php"><img class="navbar-brand logo" src="../../../img/phonestradel_logo.jpg" alt="Phones Trade"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav navbar-right">
            	<li><a href="buyphone.php">Buy</a></li>
                <li><a href="../../../sellphone.php">Sell</a></li>           
            </ul>
        </div>
    </div>
</nav>

<!-- //////////Well (PATH)////////// -->


<div class="well well-sm well1"><a href="../../../sellphone.php">Sell Phone</a> &gt;  <a href="../../../iphone.php"><?php echo $cell_brand;?></a> &gt;  <a href="../../iphone6splus.php"><?php echo $cell_name;?></a> &gt;  <a href="../verizon.php"><?php echo $cell_carrier;?></a> &gt;  <?php echo $cell_capacity;?> GB</div>

<!-- //////////CONTAINER (Sell Phone & PRiCE)////////// -->
<div class="container-fluid text-center">
<h2 id="sellwithus" style="padding-top: 15px;">Sell Your SmartPhone</h2>
<p><small>Best Price Guaranteed!!</small></p><br>
<hr>
 <div class="row">
 	<div class="col-sm-1 col-md-2 col-lg-3">
   	<br>
    	<img src="../../../img/iphone6splusThumbnail2.jpg" alt="<?php echo $cell_name;?>">
    </div>
    
    <div class="col-sm-11 col-md-10 col-lg-9">
    	<div class="row rowtextAdjust">
    	<h2 class="lead" id="phone_title" style="color: #222;"><?php echo $cell_name." ".$cell_capacity?> GB (<?php echo $cell_carrier?>)</h2>

    		<h3 class="lead colorRB">What is the Condition of SmartPhone?</h3>
    		
    		<div class="col-lg-4">
    <label style="color: orange"; class="radio-inline input-lg radiobtn1"><input id="broken" type="radio" name="optradio" value="broken">Broken</label>
    <p><small>Device does not turn on, <br>screen is cracked</small></p>
    </div>
    <div class="col-lg-4">
        <label style="color: orange"; class="radio-inline input-lg radiobtn1"><input checked id="good" type="radio" name="optradio">Good</label>
    	<p><small>Device is in good working condition <br>minor signs of use</small></p>
    </div>
    <div class="col-lg-4">
        <label style="color: orange"; class="radio-inline input-lg radiobtn1"><input id="excellent" type="radio" name="optradio">Excellent</label>
		<p><small>Device is working perfectly fine, <br> no signs of previous use</small></p>
    </div>
    
    	</div>

        
        
    </div>
    
    <br><br><br><br>
    
 </div> 
 
 <!--Slide down start-->
 <br id="slideHere">
 <!--Slide down end-->
 
 	<br>
 	<div id="offerContainer" class="container-fluid bg-ghostwhite" style="border:1px double silver; width:85%; padding: 15px;"> 
    	<h3 style="color:#333;">PhonesTrade Offer</h3>
		
        <h1 id="price" style="color:#282;"></h1>
    	
        <button type="button" id="getPaidkey" style="font-size:20px;" class="btn btn-success btn-lg">Get Paid</button>
        <hr>
        <p id="noteLostStolen" style="font-size:14px;">Note: This offer is not for lost or stolen phones.</p>
    </div>
    
    <!--For email-->
    
    <div id="gettingEmail" class="container-fluid" style="border:0.5px solid darkgrey; border-top: none; width:85%; padding: 15px; margin-top:0.2px; display:none;">
    	<h3>Enter Email Address</h3>
        <p>We will use the email address for shipment purposes and for updating status</p>
        <br>
        <!--For email INPUT-->
        <form>
        <div id="getEmailDiv" class="input-group input-group-lg" style="width:50%; margin:auto;">
		  <span class="input-group-addon">
    		<span class="glyphicon glyphicon-envelope"></span>
  		  </span>
  		  <input name="email" type="email" class="form-control" id="getEmailAddress" autofocus placeholder="Email address" required>
		</div>
		<!--Email INPUT END-->
        <div id="invalidEmail" style="display:none;">
        <br>
        	<label class="label label-danger" style="font-size:16px;">Invalid email address</label>
        </div>
        <br>
        <button type="button" style="font-size:25px;" id="EmailSubmitButton" class="btn btn-success btn-lg">Next Step</button>
        </form>
        <br><br>
        
    </div>
    
    <!--Div For Payment Method-->
    
    <div id="gettingPayMethod" class="container-fluid" style="border:0.5px solid darkgrey; border-top: none; width:85%; padding: 15px; margin-top:0.2px; display:none;">
    	<h3 id="howtoPay">How would you like to get Paid?</h3>
        <p>Once we recieve the phone, we will use your preffered payment method to Pay!!</p>
        <br>
        <!--For Payment image-->
        <br>
        <div class="row">
        <div class="col-sm-1">
        </div>
        	<div class="col-sm-5">
            	<img id="checkPaymentType" src="../../../img/bank_check2.png" class="img-rounded" alt="Check" width="250" height="125" style="border:0.5px solid silver; padding:2px; cursor:pointer; background:ghostwhite">
                
                <!--Form for the check type payment-->
                
                <form id="forCheckForm" style="display:none;">
                	<div class="form-group text-left" style="width:250px; margin:auto;">
                    	<br>
                        <label for="payTo">Payable to</label>
                    	<input type="text" class="form-control" id="payTo">
                    </div>
                    <div class="form-group text-left" style="width:250px; margin:auto;">
                    	<label for="payTo">Address Line 1</label>
                    	<input type="text" class="form-control" id="addLine1">
                    </div>
                    <div class="form-group text-left" style="width:250px; margin:auto;">
                    	<label for="payTo">Address Line 2</label>
                    	<input type="text" class="form-control" id="addLine2">
                    </div>
                    <div class="form-group text-left" style="width:250px; margin:auto;">
                    	<label for="payTo">City</label>
                    	<input type="text" class="form-control" id="addCity">
                    </div>
                    <div class="form-group text-left" style="width:250px; margin:auto;">
                    	<label for="payTo">State</label>
                    	<input type="text" class="form-control" id="addState">
                    </div>
                    <div class="form-group text-left" style="width:250px; margin:auto;">
                    	<label for="payTo">Zip Code</label>
                    	<input type="text" class="form-control" id="addZip">
                    </div>
                    <div class="form-group" style="margin:auto;">
                    	<br>
                        <button id="checkinfoSubmit" name="checkinfoSubmit" type="button" class="btn btn-success btn-lg" style="width:240px;">Next</button>
                    </div>
                    	<br>
                        <div id="checkPaymentError"></div>
                    	<br>
                     <div style="width:240px; margin:auto;" class="alert alert-info text-left" role="alert">Note: Please provide correct information to avoid delays in payment</div>
                </form>
                <br>
                <br>
            </div>
            
            <div class="col-sm-5">
            	<img id="paypalPayment" src="../../../img/PayPal.png" class="img-rounded" width="250" height="125" alt="Paypal" style="background:ghostwhite; border:0.5px solid silver; padding:5px; cursor:pointer;">
                
                <form id="forPaypalForm" style="display:none;">
                	<div class="form-group text-left" style="width:250px; margin:auto;">
                    	<br>
                        <label for="payTo">Paypal Email Address</label>
                    	<input type="text" class="form-control" id="paypalEmail">
                    </div>
                    <div class="form-group text-left" style="width:250px; margin:auto;">
                    	<br>
                        <label for="payTo">Confirm Paypal Email Address</label>
                    	<input type="text" class="form-control" id="confirmPaypalEmail">
                    </div>
                    <div class="form-group" style="margin:auto;">
                    	<br>
                        <button id="paypalPaymentBtn" type="button" class="btn btn-success btn-lg" style="width:240px;">Next</button>
                    </div>
                    <br>
                    <div id="paypalError"></div>
                    <br>
                    <div style="width:240px; margin:auto;" class="alert alert-info text-left" role="alert">Note: For Paypal users only. Please provide correct Paypal information to avoid delays in payment</div>
                 </form>
                 
                
            </div>
            <div class="col-sm-1">
        </div>
        </div>
        
		<!--Payment INPUT END-->
        <br>
        
        <br><br>
        
    </div>
    
</div>

<br><br><br><br>



<!-- //////////Container (CONTACT US)////////// -->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Phonestrade/includes/contact.php';?>










</body>
</html>



















