<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

require("./includes/db_con.php");

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

//GETTING USER IP ADDRESS
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//Shopping Cart Function

function cart() {
	 /*?>global $con;
	$ip = getIp();
	if (isset($_GET['phone_id'])) {
		$id = $_GET['phone_id'];
	$checkPro = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$id'";	
	$runCheckPro = mysqli_query($con, $checkPro);
	if ($rowCheckPro = mysqli_fetch_row($runCheckPro)>0) {
		echo "<script>alert('This Phone is already inserted!!');</script>";
	}
	else {
	
	$insert_pro = "insert into cart (p_id, ip_add) values ('$id', '$ip')";
	
	$run_pro = mysqli_query($con, $insert_pro);
	
	echo "<script>window.open('buyphone.php', '_self')</script>";	
	}
	}<?php */
	
	global $con;	
	if (isset($_GET['phone_id'])) {
	 
	 $Id = $_GET['phone_id'];
	 $Action = $_GET['action'];
	 
	 switch($Action) {
		 
	 	case "add":
		
		if (isset($_SESSION['cart'][$Id])) {
			//Check if user enter unknown value
			$result = mysqli_query($con, "SELECT MAX(phone_id) as max from buyphones");
			$row = mysqli_fetch_array($result);
			$largestnumber = $row['max'];
			// Check if Id matchs inside DB
			if ($Id <= $largestnumber) {  
			$_SESSION['cart'][$Id]++;
			//header('Location: buyphone.php');
			header('Location: buyphone.php');
			}
		}  else {
			
			
			$result = mysqli_query($con, "SELECT MAX(phone_id) as max from buyphones");
			$row = mysqli_fetch_array($result);
			echo $largestnumber = $row['max'];
			// Check if Id matchs inside DB
			if ($Id <= $largestnumber) {  
			$_SESSION['cart'][$Id]=1;
			header('Location: buyphone.php');
			}
		} break; 
	 
	 	case "remove": 
		$_SESSION['cart'][$Id]--;  
		header('Location: buyphone.php');
		if ($_SESSION['cart'][$Id] == 0){
			unset($_SESSION['cart'][$Id]);
		} break;
		
		case "delete":
		unset($_SESSION['cart'][$Id]);
		header('Location: cart.php');
	 	break;
	 }
	 
	  /*?>$sum = 0;
	 foreach ($_SESSION['cart'] as $Id=>$value) {
	 	$sum +=$value;
	 }
	 echo $sum;<?php */
	
}
}

//Displaying total items in the cart

function totalItems() {
	
	if (isset($_SESSION['cart'])) {
		echo array_sum($_SESSION['cart']);
	}
	
	else {
		echo "0";	
	}
	
	

}



//DISPLAYING BUYPHONES ON THE PAGE FUNCTION

function dispBuyPhn() {
	
//GLOBAL VARIABLE

global $con;

//Selecting & Counting ( Phone_ID ) from Buyphones Table

$get_rows = "SELECT phone_id FROM buyphones WHERE quantity > '0'";

//Running Query

$run_rows = mysqli_query($con, $get_rows);

//Getting number of rows from table

//$num_rows = mysqli_fetch_row($run_rows);

$num_rows = mysqli_num_rows($run_rows);

//Storing Number of rows in Variable

//$rows = $num_rows[0];

$rows = $num_rows;

//Number of items per page

$page_row = 6;

//Using CEIL PHP FUNCTION TO GET PAGE NUM OF LAST PAGE

$last = ceil($rows/$page_row);

//LAST PAGE CAN'T BE LESS THAN 1

if ($last < 1) {
	
	$last = 1;
	
}

//CREATING A PAGE NUMBER VARIABLE

$page_num = 1;

//GET A PAGE NUMBER FROM URL IF IT IS PRESENT, ELSE MAKE IT PAGE 1

if (isset($_GET['page'])) {
	
	//ONLY NUMBERS CAN BE ENTERED INSIDE THE URL
	
	$page_num = preg_replace('#[^0-9]#', '', $_GET['page']);
	
}

//PAGE NUMBER CAN'T BE LESS THAN 1 OR MORE THAN OUR LAST PAGE

if ($page_num < 1) {

	$page_num = 1;	

} else if ($page_num > $last) {
	
	$page_num = $last;
	
}

//SETTING LIMIT FOR THE DATA

$limit = ($page_num * $page_row) - $page_row;

//GETTING PHONE DATA FROM BUYPHONES TABLE

$get_phone = "select * from buyphones WHERE quantity > '0' LIMIT {$limit} , {$page_row}";

//RUNNING THE QUERY

$run_phone = mysqli_query($con, $get_phone);

//Getting Values from BUYPHONES TABLE
	while($row_phone = mysqli_fetch_array($run_phone)) {
	
		$phone_id = $row_phone['phone_id'];
		$phone_mdl = $row_phone['phone_model'];
		$phone_cap = $row_phone['phone_capacity'];
		$phone_img = $row_phone['phone_image'];
		$phone_car = $row_phone['phone_carrier'];
		$phone_pri = $row_phone['phone_price'];
	
	
	//GETTING PHONE TITLE FROM PHONE_MODELS TABLE	
	$get_model_name = "select * from phone_models where model_id = '$phone_mdl'";
	
	$run_model_name = mysqli_query($con, $get_model_name);
	
	while ($row_model_name = mysqli_fetch_array($run_model_name)) {
		
		$model_name = $row_model_name['model_title'];
	
	}
	
	//GETTING PHONE CAPACITY FROM PHONE_CAPACITY TABLE
	$get_phone_capacity = "select * from phone_capacity where capacity_id = '$phone_cap'";
	
	$run_phone_capacity = mysqli_query($con, $get_phone_capacity);
	
	while ($row_phone_cap = mysqli_fetch_array($run_phone_capacity)) {
			
			$phone_capacity = $row_phone_cap['capacity_size'];
	}
	
	//GETTING CARRIER FROM PHONE_CARRIER TABLE
	$get_carrier_image = "select * from phone_carrier where carrier_id = '$phone_car'";
	
	$run_carrier_image = mysqli_query($con, $get_carrier_image);
	
	while ($row_carrier_image = mysqli_fetch_array($run_carrier_image)) {
		
			$carrier_image = $row_carrier_image['carrier_image'];
	} ?>
	
	
	<!--PRINTING DATA ON BUYPHONE SCREEN-->
	
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4"><div class="panel panel-danger">
	<div class="panel-body">
    <h4 class="colorRB" style="font-family: Open Sans, sans-serif;"><?php echo $model_name ." ".$phone_capacity ?>GB</h4><br>
    <div class="row">
    <div class="col-sm-6">
    <img src="admin/phone_images/<?php echo $phone_img ?>" alt="<?php echo $phone_mdl ?>">
    </div>
    <div class="col-sm-6">
    <br><img src="admin/phone_images/<?php echo $carrier_image ?>"></img><br>
    	<h2 style="font-family: Open Sans Condensed, sans-serif; color: #F78E1E;">$<?php echo $phone_pri?></h2>
    </div>
    </div>
    </div>
    <div class="panel-footer">
    <a href="cart.php?phone_id=<?php echo $phone_id;?>&action=add"><button type="button" class="btn btn-info" style="background-color:#3276b1; border-color: #285e8e;"><strong>Buy Now</strong></button></a>
	<a href="buyphone.php?phone_id=<?php echo $phone_id;?>&action=add"><button type="button" class="btn btn-warning" style="background-color:orange; border-color: gold;"><strong>Add to Cart</strong></button><br><br></a>
    <p><a href="details.php?specs=<?php echo $phone_mdl;?>">Learn More</a></p>
    </div>
</div>
</div>


<?php } ?> <!--Main While Loops Ends Here-->

</div>

<?php
$first = 1;
$previous = $page_num-1;
if ($previous < $first) {
	$previous = $first;
}
?>
	<ul class='pagination'>   
	<li>
      <a href='buyphone.php?page=<?php echo $previous;?>'   aria-label='Previous'>
        <span aria-hidden='true'>&laquo;</span>
      </a>
    </li>  
	
    <?php
	for($i = 1; $i <= $last; $i++) {
	?>
	<li><a href='buyphone.php?page=<?php echo $i;?>'><?php echo $i; ?></a></li>
	
	<?php } ?> 	

<?php
$next = $page_num+1;
if ($next > $last) {
	$next = $last;
}
?>
	<li>
        <a href='buyphone.php?page=<?php echo $next;?>' aria-label='Next'>
        <span aria-hidden='true'>&raquo;</span>
      </a>
    </li>
</ul>

<?php
};
?>