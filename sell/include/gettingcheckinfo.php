<?php
//Getting user address

if (!session_start()) {
session_start();
}

if (isset($_POST['payTo'])) {

$payTo = $_POST['payTo'];
$addLine1 = $_POST['addLine1'];
$addLine2 = $_POST['addLine2'];
$addCity = $_POST['addCity'];
$addState = $_POST['addState'];
$addZip = $_POST['addZip'];

if (empty($payTo)) { ?>
	<label class="label label-danger" style="font-size:16px;">Please enter Payable to information!!</label>
<?php } else if (empty($addLine1)) { ?>
	<label class="label label-danger" style="font-size:16px;">Please fill Address Line 1!!</label>
<?php } else if (empty($addCity)) { ?>
	<label class="label label-danger" style="font-size:16px;">Please enter City name!!</label>
<?php } else if (empty($addState)) { ?>
	<label class="label label-danger" style="font-size:16px;">Please enter State name!!</label>
<?php } else if (empty($addZip)) { ?>
	<label class="label label-danger" style="font-size:16px;">Please enter the Zip Code!!</label>
<?php } else {
	$address = $addLine1 ." ". $addLine2 .", ". $addCity .", ". $addState .", ". $addZip;		
	$_SESSION['address'] = $address;
	$_SESSION['checkPayTo'] = $payTo; ?>
 
	<script>window.open("../../../sell/phoneoffer.php","_self");</script>

<?php }


}

?>