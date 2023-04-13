<?php 
session_start();
include('functions/functions.php');

if(isset($_SESSION['org_referer']))
{
    $_SESSION['org_referer'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Phones Trade - Buy Used Smartphones</title>

<META NAME="description" CONTENT="ON PHONES TRADE - WE SELL SMARTPHONES FOR THE CHEAPEST PRICE ONLINE & WE BUY SMARTPHONES ON A GREAT DEAL. PHONES TRADE OFFERS THE BEST PRICE WHEN YOU BUY OR TRADE-IN YOUR SMARTPHONES.">
<META NAME="keywords" CONTENT="Trade in smartphones, cheap smartphones, buy smartphones, buy used smartphones, sell smartphones, verizon, at&t, t-mobile, sprint, used smartphones, verizon trade-in, verizon used cellphone, at&t used smartphones, at&t trade-in, t-mobile used smartphones, t-mobile trade-in, sprint used smartphones, sprint trade-in">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" media="screen and (max-width: 580px)" href="css/smallStyle.css">
<link rel="stylesheet" media="screen and (max-width: 400px)" href="css/xsmallStyle.css">
<link rel="stylesheet" media="screen and (min-width: 580px)" href="css/fixStyle.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">



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
                
                <!-- PHP SCRIPT STARTS FOR LOGIN -->
                
                <?php
				global $con;
				if (isset($_SESSION['u_email'])) {
				$value = $_SESSION['u_email'];	
				$query = "SELECT * FROM users where user_email = '$value'";
				$run_query = mysqli_query($con, $query);
	
				$rows = mysqli_fetch_array($run_query); 
				$name = $rows['user_fname'];
				
				}
				global $name;
                if (!isset($_SESSION['u_email'])) {
				?>	
                <li id="signin" style="letter-spacing:1.8px; text-align:center;"><a id="signinanchor" style="color:blue; margin:0; padding-right:1.5px;" href="login.php">Sign in</a></li> 
                <li id="separator" style="letter-spacing:1.8px;padding-top:16px;">|</li>
                
                <li id="signup" style="letter-spacing:1.8px; text-align:center;"><a id="signupanchor" style="color:blue; margin:0; padding-right:0; padding-left:1.5px;" href="register.php">Sign up</a></li>
			<?php	}
               
               
               else { 
				?> <li style="letter-spacing:1.8px;"><a id="username" style="color:blue; margin:0; padding-right:1.5px;" href="profile.php"><?php echo strtoupper($name); ?></a>
                </li>           
			  <?php }
                ?>
                <!-- PHP SCRIPT ENDS FOR LOGIN -->
                        
            </ul>
        </div>
    </div>
</nav>

<!--Add items in Cart Function Start-->
<?php cart(); ?>
<!--Add items in Cart Function End-->

<!-- //////////Well (PATH)////////// -->



<div id="pathBar" class="well well-sm well1">Buy Phone &gt;<span style="float:right" id="shoppingCartItems"><?php totalItems()?> items</span><span style="float:right; margin-right: 1px;"><a style="text-decoration:none; color: inherit;" href="cart.php">Shopping Cart:</a></span><span class="glyphicon glyphicon-shopping-cart" style="float:right; font-size:18px"></span></div>

<div id="pathBar2" class="well well-sm well1" style="text-align:center;"><a style="text-decoration:none; color: inherit;" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart: <?php totalItems()?> items </a></div>

<!-- //////////Container (Sell phone)////////// -->

<div class="container-fluid text-center">
	<div class="row">
    	<div class="col-sm-4 col-md-3 col-lg-3 well font1" style="background-color:#f4f4f4;">
        <div class="well" style="background-color:ghostwhite;">
            <h4 class="colorRB">Enter Price Range</h4>
            	<form class="form-inline" method="post" action="buyphone.php">
                	<input type="text" class="PriceIntInput" name="minPrice" placeholder="Min Price" required>
                    <input type="text" class="PriceIntInput" name="maxPrice" placeholder="Max Price" required>
                    <br><br><button class="btn btn-success" name="priceSubmit" type="submit">Search</button>
                </form><br>	
          </div>
          <div class="well" style="background-color:ghostwhite;">
          	<h4 class="colorRB">Select A Brand</h4>
            <div class="checkbox text-left tBStyle">
            <label><input type="checkbox" value="">Apple</label>
            </div>
            <div class="checkbox text-left tBStyle">
            <label><input type="checkbox" value="">Motorola</label>
            </div>
            <div class="checkbox text-left tBStyle">
            <label><input type="checkbox" value="">LG</label>
            </div>
            <div class="checkbox text-left tBStyle">
            <label><input type="checkbox" value="">Samsung</label>
            </div>
            <button class="btn btn-success" type="button">Search</button>        
          </div>     
        </div>
        
        <!-- //////////MAIN BODY STARTS HERE////////// -->
        
        <!--MyModal Starts-->
        <div class="modal fade" id="myModal" role="dialog">
        	<div class="modal-dialog modal-lg">
            	<div class="modal-content">
                	<div class="modal-header">
                    	<h4 class="modal-title">Order Confirmation</h4>
                    </div>
                    <div class="modal-body">
                    	<p>Hi this is a test Modal</p>
                    </div>
                    <div class="modal-footer">
                    	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--MyModal Ends-->
        
        <!--/////////Phones List Start From here/////////-->
        
<div class="col-sm-8 col-md-9 col-lg-9">
        	<h1 style="font-family: 'Work Sans', sans-serif; font-size:46px; letter-spacing:3px;">Buy Smartphones</h1>
            <p class="colorRB">We give Smartphones a new Life!!</p>
            
            <!-- Smartphone Display Start Here -->
            <div class="row row5">
     
            <?php 
			if (isset($_POST['priceSubmit'])) {
				$min = $_POST['minPrice'];
				$max = $_POST['maxPrice'];
				
			//GLOBAL VARIABLE

global $con;

//Selecting & Counting ( Phone_ID ) from Buyphones Table

$get_rows = "SELECT COUNT(phone_id) FROM BUYPHONES WHERE quantity > '0' AND phone_price BETWEEN {$min} AND {$max}";

//Running Query

$run_rows = mysqli_query($con, $get_rows);

//Getting number of rows from table

$num_rows = mysqli_fetch_row($run_rows);

//Storing Number of rows in Variable

$rows = $num_rows[0];

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

$get_phone = "select * from buyphones WHERE quantity > '0' AND phone_price BETWEEN {$min} and {$max}  LIMIT {$limit} , {$page_row}";

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
    <h4 class="colorRB" style="font-family: Open Sans, sans-serif;"><?php echo $model_name . " " .$phone_capacity ?>GB</h4><br>
    <div class="row">
    <div class="col-sm-6">
    <img src="admin/phone_images/<?php echo $phone_img ?>" alt="<?php echo $phone_mdl ?>" width="70" height="140">
    </div>
    <div class="col-sm-6">
    <br><img src="admin/phone_images/<?php echo $carrier_image ?>"></img><br>
    	<h2 style="font-family: Open Sans Condensed, sans-serif; color: #F78E1E;">$<?php echo $phone_pri ?></h2>
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
      <a href='?page=<?php echo $previous;?>' aria-label='Previous'>
        <span aria-hidden='true'>&laquo;</span>
      </a>
    </li>  
	
    <?php
	for($i = 1; $i <= $last; $i++) {
	?>
	<li><a href='?page=<?php echo $i;?>'><?php echo $i; ?></a></li>
	
	<?php } ?> 	

<?php
$next = $page_num+1;
if ($next > $last) {
	$next = $last;
}
?>
	<li>
        <a href='?page=<?php echo $next;?>' aria-label='Next'>
        <span aria-hidden='true'>&raquo;</span>
      </a>
    </li>
</ul>

<?php	
		
			}
			
			//**Displaying All Phones In This Function**
			
			else {
			
			
				dispBuyPhn();	
				
			}
			?>
    		</div>
            
<!-- Smartphone Display Ends Here -->


            </div>
            
            
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





