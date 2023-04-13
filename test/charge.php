<?php
  require_once('./config.php');
  
  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  
  //var_dump($_POST); 
  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'card'  => $token
  ));
#testing multiples in receipt email
  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 3000,
      'currency' => 'usd',
      'description' => 'Widget, Qty 2'
  ));
  if ($charge) {
  echo '<h1>Successfully charged $30.00!</h1>';
  }
  
  else {
  	echo 'Something went wrong!!';
  	}
?>