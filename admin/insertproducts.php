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

<form action="insertproducts.php" method="post" enctype="multipart/form-data">

<table style="background-color:lightgreen; margin:auto"; border="2" width="500">

<tr>
	<td align="center" colspan="4"><h3><b>Insert Products</b></h3></td>
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
		"<option value='$brand_id'>$brand_tit</option>";		

		
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
		"<option value='$model_id'>$model_tit</option>";		

		
		}
		
		
		?>
     </select>   
    </td>
</tr>

<tr>
	<td align="right"><b>Phone Price:</b></td>
    <td><input type="text" name="phone_price"></td>
</tr>

<tr>
	<td align="right"><b>Choose Image:</b></td>
    <td><input type="file" name="phone_img"></td>
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
		"<option value='$carrier_id'>$carrier_tit</option>";		

		
		}
		
		
		?>
     </select>   
    </td>
</tr>

<tr>
	<td align="right"><b>Color:</b></td>
    <td>
    <select name="phone_color">
    	<option>Select Color</option>
    	<?php
		global $con;
		$get_Color ="select * from phone_color";
		$run_Color = mysqli_query($con, $get_Color);
		while ($row_Color = mysqli_fetch_array($run_Color)) {
		$Color_id = $row_Color['color_id'];
		$Color_name = $row_Color['color_name'];
		echo
		"<option value='$Color_id'>$Color_name</option>";		

		
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
		"<option value='$capacity_id'>$capacity_size GB</option>";		

		
		}
		
		
		?>
     </select>   
    </td>
</tr>

<tr>
	<td align="right"><b>Desciption:</b></td>
    <td><textarea name="phone_desc" cols="30" rows="10"></textarea></td>
</tr>

<tr>

	<td align="right"><b>Condition:</b></td>
    <td>
    <select name="phone_condition">
    	<option>Select Condition</option>
    	<?php
		global $con;
		$get_Condition = "select * from phone_condition";
		$run_Condition = mysqli_query($con, $get_Condition);
		while ($row_Condition = mysqli_fetch_array($run_Condition)) {
		$cond_id = $row_Condition['condition_id'];
		$cond_title = $row_Condition['condition_title'];
		echo
		"<option value='$cond_id'>$cond_title</option>";		

		
		}
		
		
		?>
     </select>   
    </td>

</tr>

<tr>
	<td align="right"><b>Quantity:</b></td>
    <td><input type="text" name="quantity"></td>
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
	
	$get_brand_id = $_POST['phone_brand'];
	
	$get_model_id = $_POST['phone_model'];
	
	$get_price = $_POST['phone_price'];
	
	$get_carrier_id = $_POST['phone_carrier'];
	
	$get_color_id = $_POST['phone_color'];
	
	$get_capacity_id = $_POST['phone_capacity'];
	
	$get_condition_id = $_POST['phone_condition'];
	
	$get_desc = $_POST['phone_desc'];
	
	$get_quantity = $_POST['quantity'];
	
	$get_image = $_FILES['phone_img']['name'];
	$get_image_tmp = $_FILES['phone_img']['tmp_name'];
	
	move_uploaded_file($get_image_tmp, "phone_images/$get_image");
	
	$insert_brand = "insert into buyphones (phone_brand, phone_model, quantity, phone_price, phone_carrier, phone_color, phone_capacity, phone_condition, phone_desc, phone_image) values ('$get_brand_id', '$get_model_id', '$get_quantity', '$get_price', '$get_carrier_id', '$get_color_id', '$get_capacity_id', '$get_condition_id', '$get_desc', '$get_image')";
	
	$insert_brand_run = mysqli_query($con, $insert_brand);

	if ($insert_brand_run) {
		echo "<script>alert('Data Successfully Inserted!!')</script>";
		echo "<script>window.open('insertproducts.php','_self')</script>";
	}

}







?>


















