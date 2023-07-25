<?php
session_start();
session_destroy();
$error_message =" Logout Succesfully";
header("location:login.php?color=green&message=".$error_message);







?>