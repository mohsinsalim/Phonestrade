<?php 

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
if(isset($_SESSION['org_referer']))
{
    $_SESSION['org_referer'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

include('functions/functions.php');


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Phones Trade - Shopping Cart</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css" type="text/css">
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


<div id="pathBar" class="well well-sm well1">Buy Phone &gt; Cart<span style="float:right" id="shoppingCartItems"><?php totalItems()?> items</span><span style="float:right; margin-right: 1px;"><a style="text-decoration:none; color: inherit;" href="cart.php">Shopping Cart:</a></span><span class="glyphicon glyphicon-shopping-cart" style="float:right; font-size:18px"></span></div>

<div id="pathBar2" class="well well-sm well1" style="text-align:center;"><a style="text-decoration:none; color: inherit;" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart: <?php totalItems()?> items </a></div>


<!-- //////////Container (Sell phone)////////// -->

<div style="clear:both"></div>
<div class="container-fluid">
<h3 align="center">Modify Shopping Cart or Checkout</h3><br>
	<div class="table-responsive">
    	<table class="table">
    		<thead>
            	<tr>
                	<th style="text-align:center">#</th>
                    <th style="text-align:center">Image</th>
                    <th style="text-align:center">Title</th>
                    <th style="text-align:center">Quantity</th>
                    <th style="text-align:center">Price</th>
                    <th style="text-align:center">Remove</th>
                </tr>
            </thead>
            <?php 
			//Grand Total
			$grand_total = 0;
			
			//Displaying values in Cart
				if (isset($_SESSION['cart'])) {
					$i = 1;
					foreach($_SESSION['cart'] as $Id=>$value) {
						
						$query = "SELECT * FROM buyphones WHERE phone_id = '$Id'";
						$run_query = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($run_query)) {
							$p_image = $row['phone_image'];
							$p_model = $row['phone_model'];
							$p_price = $row['phone_price'];
							
							$grand_total+=$p_price*$value;
							
				$model_query = "SELECT * FROM phone_models WHERE model_id = '$p_model'";
				$model_run = mysqli_query($con, $model_query);
								while($model_row= mysqli_fetch_array($model_run)) {
									$p_title = $model_row['model_title'];
								} ?>
					<tbody>
                    
                    
                    <tr>
                    	<td style="text-align:center; padding-top:38px;"><?php echo $i++; ?></td>
                        <td style="text-align:center"><?php echo "<img src='admin/phone_images/$p_image' alt='' width='40' height='80' '>"; ?></td>
                        <td style="text-align:center; padding-top:38px;"><?php echo $p_title; ?></td>
                        <td style="text-align:center; padding-top:38px;"><?php echo $value; ?></td>
                        <td style="text-align:center; padding-top:38px;"><?php echo $p_price * $value; ?></td>
                        <td style="text-align:center; padding-top:38px;">
                        <a id="deleteColumn" href="cart.php?phone_id=<?php echo $Id?>&action=delete">X</a>
                        </td>
                    </tr>		
					 </tbody>
                     			
							
					<?php	}
					}
				}
				
			?>
            
            <tfoot>
                  <tr>
                  		<td colspan="6" style="text-align:right; padding-right: 9.5%;">
                  		<h4><?php echo "Grand total: $" . $grand_total;?></h4>
                        <?php $_SESSION['grand_total'] = $grand_total; ?>
                        </td>      
                  </tr>
            </tfoot>
           
    	</table> <br><br>
        <div class="row">
        <div class="col-md-12 text-center">
			<a href="buyphone.php"><button style="margin:5px;" type="button" class="btn btn-lg btn-warning">Continue Shopping</button></a>        
        	<a href="checkout.php"><button style="margin:5px;" type="button" class="btn btn-lg btn-success">Check Out</button></a><br><br>
        <br><br>
        </div>
        </div>
        
    </div>
</div> <br><br>

<br><br>
<br><br>





<!-- //////////Container (CONTACT US)////////// -->
<!-- //////////Container (CONTACT US)////////// -->

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Phonestrade/includes/contact.php';?>

<!-- //////////Container (CONTACT US)////////// -->
<!-- //////////Container (CONTACT US)////////// -->





</body>
</html>


