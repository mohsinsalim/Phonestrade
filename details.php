<?php

include('includes/db_con.php');


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

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css">
<link rel="stylesheet" media="screen and (min-width: 580px)" href="css/fixStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">

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

<!-- //////////Container (PHONE DETAILS)////////// -->
<?php 

if (isset($_REQUEST['specs'])) {
	
	$id = $_REQUEST['specs'];
	
	//For image
	
	$detail_img = "SELECT * FROM buyphones WHERE phone_model = '$id'";
	$run_img_query = mysqli_query($con, $detail_img);
	
	while($detail_img_row = mysqli_fetch_array($run_img_query)) {
		$phone_mg = $detail_img_row['phone_model'];
		$phone_img = $detail_img_row['phone_image'];
	}
	
	
	//For title of the phone
	
	$detail_query = "SELECT * FROM phone_models WHERE model_id = '$id'";
	$run_query = mysqli_query($con, $detail_query);
	
	while($detail_row = mysqli_fetch_array($run_query)) {
		
		$phone_name = $detail_row['model_title'];	
		
	}
}
?>				





<div class="container-fluid container_4">

<div class="row row5">

<div class="col-sm-4 col-md-5 text-center">
	<br><img id="detail-image" src="img/<?php echo $phone_img;?>" alt="<?php echo $phone_name;?>" width="180" height="350"><br><br><br><br>
</div>


<div class="col-sm-8 col-md-7">

<div class="table-responsive">
<table class="table table-bordered">

<thead bgcolor="lightgreen">
<tr>
	<td colspan="4" align="center"><h2 style="font-family: 'Cairo', sans-serif;
"><?php echo $phone_name;?></h2></td>
</tr>

</thead>

<tbody>
	
<tr>
	<td align="center"><b>Phone:</b></td>
    <td align="center"><?php echo $phone_name;?></td>
</tr>
<tr>
	<td align="center"><b>Carrier:</b></td>
    <td align="center">Verizon</td>
</tr>
<tr>
	<td align="center"><b>Storage:</b></td>
    <td align="center">16GB</td>
</tr>
<tr>
	<td align="center"><b>Display:</b></td>
    <td align="center">5.10 inches</td>
</tr>
<tr>
	<td align="center"><b>Connectivity:</b></td>
    <td align="center">Wifi, Bluetooth, 4GLTE</td>
</tr>
<tr>
	<td align="center"><b>Camera:</b></td>
    <td align="center">16 MP</td>
</tr>
<tr>
	<td align="center"><b>Sim Size:</b></td>
    <td align="center">Micro</td>
</tr>
<tr>
	<td align="center"><b>Battery:</b></td>
    <td align="center">2800 MAH</td>
</tr>
        
    
</tbody>


</table>
</div>
<br>
<div class="col-sm-12 text-center">
<a href="#"><button style="margin:5px;" type="button" class="btn btn-lg btn-primary">Buy Now</button></a>        
        	<a href="buyphone.php"><button style="margin:5px;" type="button" class="btn btn-lg btn-danger">Go Back</button></a><br><br>

</div> <br>



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

























