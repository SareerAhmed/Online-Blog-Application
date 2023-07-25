<?php
require_once 'connection/connection.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();
print_r($_REQUEST);

$time = date("Y-j-d g:i:s a");
$time = date("d-M-Y g:i:s a",$timestamp);
$time = date("Y-j-d G:i:s a");
$email_flag =false;
$flag = true;
$error_message = null;
$alpha_pattern = "/^[A-Z]{1}[a-z]{2,}$/";
$email_pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
	
if (isset($_REQUEST['login'])) {	
	extract($_REQUEST);
	if ($email == "") {
		$flag = false;
		$error_message.="<li>Please Enter Email !...</li>";
	}else{
		if( !preg_match($email_pattern, $email) ){
			$flag = false;
		    $error_message.="<li>Email must be like eg : sherry1@yahoo.com !...</li>";
		}
	}

	if ($first_password == "") {
		$flag = false;
		$error_message.="<li>Please Enter Password !...</li>";
	}

	if ($flag == false) {
		header("location:login.php?message=".$error_message);
	}
	
	$query_login_user = "SELECT * FROM USER WHERE email = '{$email}' AND user.password = '{$first_password}'";
	$res_of_cheack_user = mysqli_query($connection, $query_login_user);
	if($res_of_cheack_user->num_rows>0){
		$user_data = mysqli_fetch_assoc($res_of_cheack_user);
		if ($user_data['is_active']=="Active"){
			if ($user_data['is_approved']=="Approved") {
				$error_message =" Login Successfully";
				session_start();
				$_SESSION['session_user_id']=$user_data['user_id'];
				$_SESSION['role_id']=$user_data['role_id'];
				if ($user_data['role_id']==1) {
					header("location:admin/index.php?message=".$error_message);
				}
				else{ 
					header("location:index.php?message=".$error_message);
				}
			}//end of is_approved=approve
		}elseif ($user_data['is_approved']=="Pending") {
			$error_message =" Your Account is Pending state Please wait or contact to admin";
			header("location:login.php?color=red&message=".$error_message);
		} //end of is_approve=pending
		elseif ($user_data['is_approved']=="Rejected") {
			$error_message =" Your Account is Rejected by admin Please contact to admin";
			header("location:login.php?color=red&message=".$error_message);
		}//end of is_approve_rejected
		elseif ($user_data['is_active']=="InActive") {
			$error_message =" Your Account is InActive Please contact to admin";
			header("location:login.php?color=red&message=".$error_message);
		}//end of is_active= inactive
	}else{
		$error_message ="Login invaled Please try again";
		header("location:login.php?color=red&message=".$error_message);
	}
	
}

	




?>