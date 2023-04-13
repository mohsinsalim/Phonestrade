<?php
$con = mysqli_connect("localhost","root","","phonestrade_db");


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

<link rel="stylesheet" href="../css/style.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">

<style>
	td{
		padding: 5px;
	}
</style>

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

<!-- INSERT PRODUCTS -->

<form action="insertsellproducts.php" method="post">

<table style="background-color:lightgreen; margin:auto"; border="1" width="500">

<tr>
	<td align="center" colspan="4"><h3><b>Insert (Sell) Products</b></h3></td>
</tr>

<tr>
	<td align="right"><b>Phone Brand:</b></td>
    <td>
    <select name="phone_brand">
    	<option>Select the Brand</option>
    	<?php
		global $con;
		$get_Brands ="select * from phone_brands";
		$run_Brands = mysqli_query($con, $get_Brands);
		while ($row_Brands = mysqli_fetch_array($run_Brands)) {
		$brand_id = $row_Brands['brand_id'];
		$brand_tit = $row_Brands['brand_title'];
		echo
		"<option value='$brand_tit'>$brand_tit</option>";		

		
		}
		
		
		?>
     </select>   
    </td>
</tr>

<tr>
	<td align="right"><b>Phone Model:</b></td>
    <td>
    <select name="phone_model">
    	<option>Select the Model</option>
    	<?php
		global $con;
		$get_Models ="select * from phone_models";
		$run_Models = mysqli_query($con, $get_Models);
		while ($row_Brands = mysqli_fetch_array($run_Models)) {
		$model_id = $row_Brands['model_id'];
		$model_tit = $row_Brands['model_title'];
		echo
		"<option value='$model_tit'>$model_tit</option>";		

		
		}
		
		
		?>
     </select>   
    </td>
</tr>


<tr>
	<td align="right"><b>Carrier:</b></td>
    <td>
    <select name="phone_carrier">
    	<option>Select Carrier</option>
    	<?php
		global $con;
		$get_Carrier ="select * from phone_carrier";
		$run_Carrier = mysqli_query($con, $get_Carrier);
		while ($row_Carrier = mysqli_fetch_array($run_Carrier)) {
		$carrier_id = $row_Carrier['carrier_id'];
		$carrier_tit = $row_Carrier['carrier_title'];
		echo
		"<option value='$carrier_tit'>$carrier_tit</option>";		

		
		}
		
		
		?>
     </select>   
    </td>
</tr>


<tr>
	<td align="right"><b>Capacity:</b></td>
    <td>
    <select name="phone_capacity">
    	<option>Select Capacity</option>
    	<?php
		global $con;
		$get_Capacity ="select * from phone_capacity";
		$run_Capacity = mysqli_query($con, $get_Capacity);
		while ($row_Capacity = mysqli_fetch_array($run_Capacity)) {
		$capacity_id = $row_Capacity['capacity_id'];
		$capacity_size = $row_Capacity['capacity_size'];
		echo
		"<option value='$capacity_size'>$capacity_size GB</option>";		

		
		}
		
		
		?>
     </select>   
    </td>
</tr>

<tr>
	<td align="right"><b>Broken Phone Price:</b></td>
    <td><input type="text" name="broken_phone_price"></td>
</tr>

<tr>
	<td align="right"><b>Good Phone Price:</b></td>
    <td><input type="text" name="good_phone_price"></td>
</tr>

<tr>
	<td align="right"><b>Excellent Phone Price:</b></td>
    <td><input type="text" name="excellent_phone_price"></td>
</tr>



<tr>
	<td colspan="4" align="center"><input type="submit" name="insert_data" value="Insert Data"></td>
</tr>

</table>


</form>


<!-- END INSERT PRODUCTS -->




</body>
</html>






<?php

global $con;

if(isset($_POST['insert_data'])){
	//taking title's not id
	$get_brand_id = $_POST['phone_brand'];
	
	$get_model_id = $_POST['phone_model'];
	
	$get_carrier_id = $_POST['phone_carrier'];
	
	$get_capacity_id = $_POST['phone_capacity'];
	
	$get_broken_price = $_POST['broken_phone_price'];
	
	$get_good_price = $_POST['good_phone_price'];
	
	$get_excellent_price = $_POST['excellent_phone_price'];
	
	//check if data already exist
	$checkQuery = "SELECT * FROM sellphones";
	$runQuery = mysqli_query($con, $checkQuery);
	while ($checkQueryRow = mysqli_fetch_array($runQuery)) {
		$titleCheck = $checkQueryRow['sellphone_title'];
		$capacityCheck = $checkQueryRow['sellphone_capacity'];
		$carrierCheck = $checkQueryRow['sellphone_carrier'];
		if ($titleCheck == $get_model_id && $capacityCheck == $get_capacity_id && $carrierCheck == $get_carrier_id) {
			?>
            <script>alert("Data Already Exist");</script>
            <?php
			exit();
		}
	}
	
	
	$insert_brand = "insert into sellphones (sellphone_brand, sellphone_title, sellphone_capacity, sellphone_carrier, broken_price, good_price, excellent_price) values ('$get_brand_id', '$get_model_id', '$get_capacity_id', '$get_carrier_id', '$get_broken_price', '$get_good_price', '$get_excellent_price')";
	
	$insert_brand_run = mysqli_query($con, $insert_brand);

	

}







?>


















