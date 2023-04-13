<?php 

$con = mysqli_connect("localhost", "root", "", "phonestrade_db");

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form action="enter.php" method="post" enctype="multipart/form-data">


<br><input type="text" name="carrier_name"><br>
<br><input type="file" name="carrier_image"><br>
<hr><input type="submit" name="enter_data" value="Insert"><br>



</form>


</body>
</html>


<?php

global $con;

if (isset($_POST['enter_data'])) {

	$get_carrier_name = $_POST['carrier_name'];
    $get_carrier_image = $_FILES['carrier_image']['name'];
    $get_carrier_image_tmp = $_FILES['carrier_image']['tmp_name'];
    
	
    move_uploaded_file($get_carrier_image_tmp, "phone_images/$get_carrier_image");
    
    
    $insert_carrier = "insert into phone_carrier (carrier_title, carrier_image) values ('$get_carrier_name', '$get_carrier_image')";
    
    $run_insert_carrier = mysqli_query($con, $insert_carrier);
	
    if ($run_insert_carrier) {
    	echo "<script>alert('Data Inserted!!')</script>";
        echo "<script>window.open('enter.php', '_self')</script>";
    }

}





?>