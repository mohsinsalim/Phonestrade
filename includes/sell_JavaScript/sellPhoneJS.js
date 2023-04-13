// JavaScript Document

$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#sellwithus').offset().top
    }, 'slow');
	
	var dS = "$"
	var brokenPrice = <?php echo $p1;?>;
	var goodPrice = <?php echo $p2;?>;
	var excellentPrice = <?php echo $p3;?>;
	
	
	document.getElementById("price").innerHTML = dS + goodPrice;
	
	var condition = "Good";
	$.ajax({
								
				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:goodPrice,
						sell_condition:condition
				 	}
								
				});
		
	$('input[type=radio]').change( function() {
		
		$('html, body').animate({
        scrollTop: $('#phone_title').offset().top
    }, 'slow');
		
	if (document.getElementById("broken").checked) {
		document.getElementById("price").innerHTML = dS + brokenPrice;
		var condition = "Broken";
		$.ajax({
								
				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:brokenPrice,
						sell_condition:condition
				 	}
								
				});
			
	}
	else if (document.getElementById("good").checked) {
		document.getElementById("price").innerHTML = dS + goodPrice;
	    var condition = "Good";
		$.ajax({
								
				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:goodPrice,
						sell_condition:condition
				 	}
								
				});
			
	}
	else if (document.getElementById("excellent").checked) {
		document.getElementById("price").innerHTML = dS + excellentPrice;
		var condition = "Excellent";	
		$.ajax({
								
				url: '../../../sell/include/getusersellprice.php',
				type: 'POST',
				data: {
						sellprice:excellentPrice,
						sell_condition:condition
				 	}
								
				});
				
	}
});
//get paid starts here
$( "#getPaidkey" ).click(function() {
	
	$( "#getPaidkey" ).hide( "slow", function() { //hiding paid button start
  		
		//Animation Slide down
					$('html, body').animate({
        			scrollTop: $('#offerContainer').offset().top
    				}, 'slow');	
	//End Animation
  
  $( "#gettingEmail" ).slideDown( "slow", function() { //sliding down to get email start
		 
	$( "#EmailSubmitButton" ).click(function(){
		//Email Submit Start & validation
		var getEmail = $( "#getEmailAddress" ).val();
		
		var result = isEmail(getEmail);
		if (result == false) {
			$( "#invalidEmail" ).show("fast",function(){});
		} else {
		
			$.ajax({
			url: '../../../sell/include/gettingemail.php',
			type: 'POST',
			data: {userEmail:getEmail}
		});
		//Email Submit End
		
		//Hide Email div Start
		$( "#gettingEmail" ).slideUp( "slow", function() {
			$('html, body').animate({
        			scrollTop: $('#offerContainer').offset().top
    				}, 'slow');
			//sliding down to get payment method
			$( "#gettingPayMethod" ).slideDown( "slow", function() {	
				// if check payment type is clicked
				$( "#checkPaymentType" ).click(function(){
					//Animation Slide down
					$('html, body').animate({
        			scrollTop: $('#howtoPay').offset().top
    				}, 'slow');
					//End Animation
					
					if ($('#paypalPayment').is(':visible')) {
						$( "#forPaypalForm" ).slideUp( "slow",function(){
						});
					}
						
					//For Check payment type
					$( "#forCheckForm" ).slideToggle( "slow", function() { 
							//submitting form for check type payment
							$( "#checkinfoSubmit" ).click(function(){
								
								var payTo = $( "#payTo" ).val();
								var addLine1 = $( "#addLine1" ).val();
								var addLine2 = $( "#addLine2" ).val();
								var addCity = $( "#addCity" ).val();
								var addState = $( "#addState" ).val();
								var addZip = $( "#addZip" ).val();
								
								$.ajax({
								
									url: '../../../sell/include/gettingcheckinfo.php',
									type: 'POST',
									data: {
										payTo:payTo,
										addLine1:addLine1,
										addLine2:addLine2,
										addCity:addCity,
										addState:addState,
										addZip:addZip
									},
									success: function(data) {
										$( "#checkPaymentError" ).html(data);
									}
								
								});
							
						});
					});				
				});
				
				//if Paypal button is clicked
				
				$( "#paypalPayment" ).click(function(){
					//Animation Slide down
					$('html, body').animate({
        			scrollTop: $('#howtoPay').offset().top
    				}, 'slow');
					//End Animation
					
					if ($('#forCheckForm').is(':visible')) {
						$( "#forCheckForm" ).slideUp( "slow",function(){
						});
					}			
						
						
					//For Paypal payment type
					$( "#forPaypalForm" ).slideToggle( "slow", function() { 
							
							//Paypal submit button Start
							$( "#paypalPaymentBtn" ).click(function(){
							
							var paypalEmail = $( "#paypalEmail" ).val();
							var confirmPaypalEmail = $( "#confirmPaypalEmail" ).val();
								
								$.ajax({
								
									url: '../../../sell/include/gettingpaypalinfo.php',
									type: 'POST',
									data: {
										paypalEmail:paypalEmail,
										confirmPaypalEmail:confirmPaypalEmail
									},
									success: function(data) {
										$( "#paypalError" ).html(data);
									}
								
								});
								
							});//Paypal submit button End
							
						}); //Paypal payment form end 
		
					});	
			});
			//End payment method 	
		});
		//Hide Email div End
	}
		});
		
  }); ////sliding down to get email end

	}); //hiding paid button end	

}); //get paid ends here


});
//Email validation function
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

//jQuery End