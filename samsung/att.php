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


<link rel="stylesheet" href="../css/style.css" type="text/css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="../css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="../css/xsmallStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<script src="../js/phonestrade.js"></script>
</head>

<script>
	$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#selectModelHeader').offset().top
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
            <a href="../index.php"><img class="navbar-brand logo" src="../img/phonestradel_logo.jpg" alt="Phones Trade"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        	<ul class="nav navbar-nav navbar-right">
            	<li><a href="../buyphone.php">Buy</a></li>
                <li><a href="../sellphone.php">Sell</a></li>           
            </ul>
        </div>
    </div>
</nav>

<!-- //////////Well (PATH)////////// -->


<div class="well well-sm well1">Sell Phone &gt;  Samsung &gt;  AT&amp;T</div>

<!-- //////////Container (Buy and Sell)////////// -->
<div class="container-fluid text-center container_5" id="ChoosingCarrier">
	<h2>Select The Carrier</h2>
    <small>Choose your smartphone carrier here</small>
    
    		<!-- Career Selection Row -->
            <div class="row row3 text-center">
            	<div class="col-sm-3 col-md-2">
                	<a href="verizon.php"><img class="carrierlogo" src="../img/verizonLogo.jpg" alt="verizon Carrier"></a>
                    <a href="verizon.php"><p><small>Verizon</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="att.php"><img class="carrierlogo" src="../img/attLogo.jpg" alt="Att Carrier"></a>
                    <a href="att.php"><p><small>AT&T</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="sprint.php"><img class="carrierlogo" src="../img/sprintLogo.jpg" alt="Sprint Carrier"></a>
                    <a href="sprint.php"><p><small>Sprint</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="TMobile.php"><img class="carrierlogo" src="../img/tmobileLogo.jpg" alt="T-Mobile Carrier"></a>
                    <a href="Tmobile.php"><p><small>T-Mobile</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="CarrierUnlocked.php"><img class="carrierlogo" src="../img/unlockedLogo.jpg" alt="Unlocked"></a>
                    <a href="CarrierUnlocked.php"><p><small>Unlocked</small></p></a>
                </div>
                <div class="col-sm-3 col-md-2">
                	<a href="OtherCarrier.php"><img class="carrierlogo" src="../img/otherLogo.jpg" alt="Other Carrier"></a>
                    <a href="OtherCarrier.php"><p><small>Other</small></p></a>
                </div>
            </div>          
           </div><hr>
           
           

<!-- //////////Container (Select Smartphone Model)////////// -->
<div class="container-fluid text-center container_8" id="SmartPhoneModel">
	<h3 id="selectModelHeader" style="color:royalblue; padding-top:20px; font-size: 26px;">Select the Model <span class="glyphicon glyphicon-question-sign" style="color:orange;"></span></h3>
    
    		<div class="row row2">
            	<div class="col-sm-3">
                	<a href="AT&amp;T/Note8.php"><img src="../img/Note8Thumbnail.jpg" alt="Samsung Note 8"></a><br><br>
                    <a href="AT&amp;T/Note8.php"><p><small>Samsung Note 8</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	<a href="AT&amp;T/S8Plus.php"><img src="../img/S8plusThumbnail.jpg" alt="Samsung Galaxy S8 Plus"></a><br><br>
                    <a href="AT&amp;T/S8Plus.php"><p><small>Samsung Galaxy S8+</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	<a href="AT&amp;T/S8.php"><img src="../img/S8Thumbnail.jpg" alt="Samsung Galaxy S8"></a><br><br>
                    <a href="AT&amp;T/S8.php"><p><small>Samsung Galaxy S8</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	<a href="AT&amp;T/S7Edge.php"><img src="../img/SamsungS7EdgeVerizonThumbnail.jpg" alt="Samsung Galaxy S7 Edge"></a><br><br>
                    <a href="AT&amp;T/S7Edge.php"><p><small>Samsung Galaxy S7<br>Edge</small></p></a>
                </div>
            </div>
    
            <div class="row row2">
            	<div class="col-sm-3">
                	<a href="AT&amp;T/S7.php"><img src="../img/SamsungS7VerizonThumbnail.jpg" alt="Samsung Galaxy S7"></a><br><br>
                    <a href="AT&amp;T/S7.php"><p><small>Samsung Galaxy S7</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	<a href="AT&amp;T/Note5.php"><img src="../img/SamsungNote5VerizonThumbnail.jpg" alt="Samsung Note 5"></a><br><br>
                    <a href="AT&amp;T/Note5.php"><p><small>Samsung Note 5</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	<a href="AT&amp;T/S6.php"><img src="../img/SamsungS6VerizonThumbnail.jpg" alt="Samsung Galaxy S6"></a><br><br>
                    <a href="AT&amp;T/S6.php"><p><small>Samsung Galaxy S6</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	 <a href="AT&amp;T/S6EdgePlus.php"><img src="../img/SamsungS6EdgePlusVerizonThumbnail.jpg" alt="Samsung Galaxy S6 Edge Plus"></a><br><br>
                    <a href="AT&amp;T/S6EdgePlus.php"><p><small>Samsung Galaxy S6<br>Edge Plus</small></p></a>
                </div>
            </div>
            <div class="row row2">
            	<div class="col-sm-3">
                	<a href="AT&amp;T/S6Edge.php"><img src="../img/SamsungS6EdgeVerizonThumbnail.jpg" alt="Samsung Galaxy S6 Edge" style="margin-top:10px;"></a><br><br>
                    <a href="AT&amp;T/S6Edge.php"><p><small>Samsung Galaxy S6<br>Edge</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	<a href="AT&amp;T/Note4.php"><img src="../img/SamsungNote4VerizonThumbnail.jpg" alt="Samsung Note 4"></a><br><br>
                    <a href="AT&amp;T/Note4.php"><p><small>Samsung Note 4</small></p></a><br>
                </div>
                <div class="col-sm-3">
                	<a href="AT&amp;T/S5.php"><img src="../img/SamsungS5VerizonThumbnail.jpg" alt="Samsung Galaxy S5"></a><br><br>
                    <a href="AT&amp;T/S5.php"><p><small>Samsung Galaxy S5</small></p></a><br>
                </div>
                
                <!--Phone list Ends here-->
                
            </div>
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

































