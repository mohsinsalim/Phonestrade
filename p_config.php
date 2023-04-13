<?php
require_once('./vendor/autoload.php');
$stripe = array(
  "secret_key"      => "sk_test_Fa8d4MavOnF4g2YFL0S5DRLO",
  "publishable_key" => "pk_test_nEFscUbErlin3CpU6Zj16pPI"
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>