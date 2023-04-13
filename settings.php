<?php

session_start();

include("includes/db_con.php");

//header("Cache-Control: no cache");
//session_cache_limiter("private_no_expire");

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

<link rel="stylesheet" href="css/profileSettings.css" type="text/css">

<link rel="stylesheet" media="screen and (max-width: 580px)" href="css/smallStyle.css" type="text/css">
<link rel="stylesheet" media="screen and (min-width: 580px)" href="css/fixStyle.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css" type="text/css">


<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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

<!--PHP SCRIPT STARTS FOR SHIPPING ADDRESS CHECK HERE-->
<?php
global $con;
//Getting user information
$query = "SELECT * FROM users WHERE user_email = '$useremail'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);


$addressline1 = $row['Address_Line1'];
$addressline2 = $row['Address_Line2'];
$addressCity = $row['Address_City'];
$addressState = $row['Address_State'];
$addressZipCode = $row['Address_ZipCode'];

if (empty($addressline1)) {
	?>
	<div class="alert alert-info text-center" style="margin-bottom:0" role="alert">
  	<a href="updateshippingaddress.php" class="alert-link">Please click here to update your <u>SHIPPING ADDRESS!!</u></a>
	</div>
<?php    
}

?>
<!--PHP SCRIPT ENDS FOR SHIPPING ADDRESS CHECK HERE-->




<!--PHP SCRIPT STARTS HERE-->
<?php
global $con;
//Getting user information
$query = "SELECT * FROM users WHERE user_email = '$useremail'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

$name = $row['user_fname'];
$u_email = $row['user_email'];
$u_mobile = $row['user_mobileNumber'];


?>
<!--PHP SCRIPT ENDS HERE-->

<!-- //////////Container (Buy and Sell) dimgrey////////// -->
<div class="container-fluid container_9">
	
	<div class="row">
		<div class="col-md-3">
			
			<div class="well">
				<div class="well text-center">
					<img class="img-circle" src="admin/phone_images/default-user-image.png" width="130" height="130" alt="User Image">
					<br><br>
					<p class="lead"><?php echo $name;?></p>
					<input type="file" name="uploadPicture">
				</div>
				
				
				<ul class="nav nav-pills nav-stacked">
                
        			<li class="text-center"><a style="color: navyblue"; href="profile.php">Purchases</a></li>
        			<li class="text-center"><a style="color: navyblue"; href="settings.php">Settings</a></li>
        			<li class="text-center"><a style="color: red"; href="logout.php">Logout</a></li>
      			</ul>
			</div>
			
		</div>
        
        <br>
		
		<div id="profileSett" class="col-md-9">
			
			<div class="text-center">
				<h2>Profile settings</h2>
                <br>
                <hr>
			</div>
            
			<p>Name: <span id="editBtn" style="margin:auto; color:grey;"><?php echo $name;?></span><span id="nameEdit">Edit</span></p>
            
            <form id="nameForm" class="form-group text-center">
            
  		  <input name="name" type="text" class="form-control" id="getNameText" placeholder="Enter full name" required>
          <div id="nameUpdateError"></div>
           <button type="button" style="margin-top: 5px;" id="nameSubmitButton" class="btn btn-primary">Save</button>

        </form>
            <hr>
            
            <p>Email: <span style="color:grey;"><?php echo $u_email;?></span><span id="emailEdit">Edit</span></p>
            
            <form id="emailForm" class="form-group text-center">
            
  		  
        	<input id="getEmailAdd" name="getEmail" type="email" class="form-control" placeholder="New email address">
        
        
        	<input id="getCfmEmailAdd" name="getCfmEmail" type="email" class="form-control" placeholder="Confirm new email address">
            
            <div id="emailUpdateError"></div>
         
           <button type="button" id="emailSubmitButton" class="btn btn-primary">Save</button>
		
        </form>
            <hr>
            
            <p>Mobile: <span style="color:grey;"><?php echo $u_mobile;?></span><span id="mobileEdit" >Edit</span></p>
            
            <form id="mblForm" class="form-group text-center">
            
  		  <input name="mobile" type="text" class="form-control" id="getMobileNo" autofocus placeholder="Enter new mobile number" required>
          
          <div id="mblUpdtError"></div>
          
           <button type="button" style="margin-top: 5px;" id="mblSubmitButton" class="btn btn-primary">Save</button>
		
        </form>
            <hr>
            
            <p>Shipping Address: <span id="addressEdit">Edit</span><span style="color:grey;"><?php echo $addressline1 ." ". $addressline2 .", ".$addressCity .", ".$addressState.", ".$addressZipCode?></span></p>
            
            <form id="addrsForm" class="form-group text-center">
            
  		  
        	<input id="adrsL1" name="adrsL1" type="text" class="form-control" placeholder="Address Line 1*">
            
            <input id="adrsL2" name="adrsL2" type="text" class="form-control" placeholder="Address Line 2">
            
            <input id="adrsCity" name="adrsCity" type="text" class="form-control" placeholder="Address City*">
        
        <input id="adrsState" name="adrsState" type="text" class="form-control" placeholder="Address State*">
        
        	<input id="adrsZip" name="adrsZip" type="text" class="form-control" placeholder="Address Zip Code*">
            
            <div id="addUpdateError"></div>
         
           <button type="button" id="adrsSubmitButton" class="btn btn-primary">Save</button>
		
        </form>
            <hr>
            
            <p>Change your password<span id="pwdEdit">Edit</span></p>
            
            <form id="pwdForm" class="form-group text-center">
            
  		  
        	<input id="currPwd" name="cpwd" type="password" class="form-control" placeholder="Enter current password">
        
        <input id="nPwd" name="nPwd" type="password" class="form-control" placeholder="Enter new password">
        
        	<input id="cPwd" name="cPwd" type="password" class="form-control" placeholder="Confirm new password">
         	
            <div id="pwdError"></div>
         
           <button type="button" id="pwdSubmitButton" class="btn btn-primary">Save</button>
		
        </form>
            <hr>
            
		</div>
		
	</div>
	

</div>


<br><br><br>





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



<!--Jquery Script Starts Here-->

<script>
//Document Ready start
$(document).ready(function(e) {
    
	//Edit name click
	$( "#nameEdit" ).click(function(){

		//Edit name slide down
		$( "#nameForm" ).slideToggle("slow", function(){
			
			//if edit name save btn is pressed
			$( "#nameSubmitButton" ).click(function(){
		
			//getting name field value
			var name = $( "#getNameText" ).val();
			$.ajax({
					url: 'user/update/updatename.php',
					type: 'POST',
					data: {
							name:name
						},
					success: function(data) {
						$( "#nameUpdateError" ).html(data);
					}
					});
				
				}); //if edit name save btn is pressed
				
			}); //Edit name slide down end
		
		}); //Edit name click end
		
		
		//Edit email click
	$( "#emailEdit" ).click(function(){
		
		//Edit email slide down
		$( "#emailForm" ).slideToggle("slow", function(){
			
			//if edit EMAIL save btn is pressed
			$( "#emailSubmitButton" ).click(function(){
		
			//getting EMAIL field value
			var email = $( "#getEmailAdd" ).val();
			var cfmEmail = $( "#getCfmEmailAdd" ).val();
			$.ajax({
					url: 'user/update/updateEmail.php',
					type: 'POST',
					data: {
							email:email,
							cfmEmail:cfmEmail
						},
					success: function(data) {
						$( "#emailUpdateError" ).html(data);
					}
					});
				
				}); //if edit EMAIL save btn is pressed
				
			
			}); //Edit email slide down end
		
		}); //Edit email click end
		
		
		//Edit Mobile click
	$( "#mobileEdit" ).click(function(){
		
		//Edit Mobile slide down
		$( "#mblForm" ).slideToggle("slow", function(){
			
			//if edit Mobile save btn is pressed
			$( "#mblSubmitButton" ).click(function(){
			
			//getting Mobile field value
			var mblNum = $( "#getMobileNo" ).val();
			$.ajax({
					url: 'user/update/updatemobile.php',
					type: 'POST',
					data: {
							mblNum:mblNum
						},
					success: function(data) {
						$( "#mblUpdtError" ).html(data);
					}
					});
				
				
				}); //if edit Mobile save btn is pressed
				
			
			}); //Edit Mobile slide down end
		
		}); //Edit Mobile click end
		
		
		//Edit Address click
	$( "#addressEdit" ).click(function(){
		
		//Edit Address slide down
		$( "#addrsForm" ).slideToggle("slow", function(){
			
			//if edit Address save btn is pressed
			$( "#adrsSubmitButton" ).click(function(){
		
			//getting Address field value
			var adrsL1 = $( "#adrsL1" ).val();
			var adrsL2 = $( "#adrsL2" ).val();
			var adrsCity = $( "#adrsCity" ).val();
			var adrsState = $( "#adrsState" ).val();
			var adrsZip = $( "#adrsZip" ).val();
			$.ajax({
					url: 'user/update/updateaddress.php',
					type: 'POST',
					data: {
							adrsL1:adrsL1,
							adrsL2:adrsL2,
							adrsCity:adrsCity,
							adrsState:adrsState,
							adrsZip:adrsZip
						},
					success: function(data) {
						$( "#addUpdateError" ).html(data);
					}
					});
				
				}); //if edit Address save btn is pressed end
			
			}); //Edit Address slide down end
		
		}); //Edit Address click end
		
		
		//Edit Password click
	$( "#pwdEdit" ).click(function(){
		
		//Edit Password slide down
		$( "#pwdForm" ).slideToggle("slow", function(){
			
			//if edit pwd save btn is pressed
			$( "#pwdSubmitButton" ).click(function(){
		
			//getting pws field value
			var oldpass = $( "#currPwd" ).val();
			var newpass = $( "#nPwd" ).val();
			var cfpass = $( "#cPwd" ).val();
			$.ajax({
					url: 'user/update/updatepass.php',
					type: 'POST',
					data: {
							oldpass:oldpass,
							newpass:newpass,
							cfpass:cfpass
						},
					success: function(data) {
						$( "#pwdError" ).html(data);
					}
					});
				
				}); //if edit pwd save btn is pressed end
				
			
			}); //Edit Password slide down end
		
		}); //Edit Password click end
	
	
	
	
}); //Document Ready end



</script>

<!--Jquery Script Ends Here-->

















