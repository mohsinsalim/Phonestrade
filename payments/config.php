<?php
require_once('./vendor/autoload.php');
$stripe = array(
  "secret_key"      => getenv('sk_test_SWaVEQHumkWdqP1ZZDnoPnhs'),
  "publishable_key" => getenv('pk_test_NFnIHYfTd8tr1IV2BxldEO01')
);
\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>