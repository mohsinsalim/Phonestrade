<?php require_once('config.php'); ?>

<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<button id="customButton">Purchase</button>

<script>
  var handler = StripeCheckout.configure({
    key: 'pk_test_NFnIHYfTd8tr1IV2BxldEO01',
    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
	locale: 'auto',
    token: function(token) {
      // Use the token to create the charge with a server-side script.
      // You can access the token ID with `token.id`
      console.log(token);
      //alert(token.id);
      
	  $.ajax({
        type: "POST",
        url: "./charge.php",
        data: { 
			
			stripeToken:token.id,
			stripeEmail:token.email
		  
		  },
		 success: function(data) {
		 	$("#result").html(data);
		 }
		
      })  
      
    }
  });
  
  document.getElementById('customButton').addEventListener('click', function(e) {
    // Open Checkout with further options
    handler.open({
      name: 'Phone',
      description: '2 widgets ($30.00)',
      amount: 3000
    });
    e.preventDefault();
  });
  
  // Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script>

<div id="result"></div>