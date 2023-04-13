<?php

session_start();


echo "welcome " .$_SESSION['user_email'];

echo $_SERVER['HTTP_REFERER'];



?>