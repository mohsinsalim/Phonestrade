<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sell Phone</title>

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
<script src="js/phonestrade.js"></script>
</head>

<script>
	$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#chooseBrand').offset().top
    }, 'slow');
});
</script>

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
            </ul>
        </div>
    </div>
</nav>


<!-- //////////Well (PATH)////////// -->


<div class="well well-sm well1">Sell Phone &gt;  Samsung &gt;</div>

<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid text-center container_5" id="ChoosingCarrier">
	<h2>Select The Carrier</h2>
    <small>Choose your smartphone carrier here</small>
    
    		<!-- Career Selection Row -->
            <div class="row row3 text-center">
            	<div class="col-sm-3 col-md-2">
                	<a href="samsung/verizon.php"><img class="carrierlogo" src="img/verizonLogo.jpg" alt="verizon Carrier"></a>
                    <a href="samsung/verizon.php"><p><small>Verizon</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="samsung/att.php"><img class="carrierlogo" src="img/attLogo.jpg" alt="Att Carrier"></a>
                    <a href="samsung/att.php"><p><small>AT&T</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="samsung/sprint.php"><img class="carrierlogo" src="img/sprintLogo.jpg" alt="Sprint Carrier"></a>
                    <a href="samsung/sprint.php"><p><small>Sprint</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="samsung/TMobile.php"><img class="carrierlogo" src="img/tmobileLogo.jpg" alt="T-Mobile Carrier"></a>
                    <a href="samsung/Tmobile.php"><p><small>T-Mobile</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="samsung/CarrierUnlocked.php"><img class="carrierlogo" src="img/unlockedLogo.jpg" alt="Unlocked"></a>
                    <a href="samsung/CarrierUnlocked.php"><p><small>Unlocked</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="samsung/OtherCarrier.php"><img class="carrierlogo" src="img/otherLogo.jpg" alt="Other Carrier"></a>
                    <a href="samsung/OtherCarrier.php"><p><small>Other</small></p></a>
                </div>
            </div><br>          
           </div>
    



<!-- //////////Container (CONTACT US)////////// -->
<div class="container-fluid bg-gray container_2">
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

































