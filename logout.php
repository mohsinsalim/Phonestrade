<?php

session_start();

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");




if (session_destroy()) {
	header("location: index.php");
}


?>