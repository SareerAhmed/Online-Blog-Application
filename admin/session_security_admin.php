<?php 
	require_once 'session.php';
	echo "<pre>";
	print_r($login_user_data);
	echo "</pre>";

		if (isset($login_user_data['user_id'])) {
			if ($login_user_data['role_id']==2) {
			header("location:../index.php");
			}
			
		}else{
		$error_message ="Please login First";
		header("location:../login.php?color=red&message=".$error_message);
		}


 ?>