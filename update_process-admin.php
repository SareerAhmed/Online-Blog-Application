<?php
session_start();
require_once 'connection/connection.php';	
date_default_timezone_set("asia/karachi");
$timestamp = time();
echo $locat = "admin/".$_REQUEST['location']; 

if ($_REQUEST['location']=="profile-update.php") {
	 $locat = $_REQUEST['location']; 
}
$time = date("Y-j-d g:i:s a");
$time = date("d-M-Y g:i:s a",$timestamp);
$time = date("Y-j-d G:i:s");
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";




if (isset($_REQUEST['update'])) {
	$alpha_pattern     = "/^[A-Z]{1}[a-z]{2,}$/";
	$email_pattern     = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
	$password_pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
	extract($_REQUEST);
	$flag = true;
	$error_message = null;
	if ($first_name == "") {
		$flag = false;
		$error_message.="<li>Please Enter First Name !...</li>";
	}else{

		if( !preg_match($alpha_pattern, $first_name) ){
			$flag = false;
		    $error_message.="<li>First Name must be like eg : Sherry !...</li>";
		}
	}

	
	if ($last_name == "") {
		$flag = false;
		$error_message.="<li>Please Enter Last Name !...</li>";
	}else{

		if( !preg_match($alpha_pattern, $last_name) ){
			$flag = false;
		    $error_message.="<li>Last Name must be like eg : Wilson !...</li>";
		}
	}

	if ($email == "") {
		$flag = false;
		$error_message.="<li>Please Enter Email !...</li>";
	}else{

		if( !preg_match($email_pattern, $email) ){
			$flag = false;
		    $error_message.="<li>Email must be like eg : sherry1@yahoo.com !...</li>";
		}
	}

	if (!isset($gender)) {
		$flag = false;
		    $error_message.="<li>Please Select Gender !...</li>";
	}

	if ($date_of_birth == "") {
		$flag = false;
		$error_message.="<li>Please Select Your Date of Birth !...</li>";
	}
	if ($address == "") {
		$flag = false;
		$error_message.="<li>Please Enter Your Address !...</li>";
	}


	if ($first_password == "") {
		$flag = false;
		$error_message.="<li>Please Enter Password !...</li>";
	}else{
		if ($confrim_password != $first_password) {
			$flag = false;
			$error_message.="<li>Your Password is Not match..</li>";
		   }
	}
	if ($first_password == "") {
		$flag = false;
		$error_message.="<li>Please Enter Password !...</li>";
	}else{

		if( !preg_match($password_pattern, $first_password) ){
			$flag = false;
		    $error_message.="<li>Password must be like eg: Hidayaa@2";
		}
		if ($confrim_password != $first_password) {
			$flag = false;
			$error_message.="<li>Your Password is Not match..</li>";
		   }
	}

	if(empty($_FILES['new_profile_pic']['name'])){
		$image_flag = false;
		$old_profie="true";
		$new_profie="false";
	}
	if(!empty($_FILES['new_profile_pic']['name'])){
		$old_profie="false";
	 	$new_profie="true";
	 	$image_flag = true;
	}
	if ($flag == false) {
		header("location:echo $locat?message=".$error_message);
	}
	$filename 	= $_FILES['new_profile_pic']['name'];
	if ($new_profie){
		$folder = "images";
		if(!is_dir($folder)){
			if(!mkdir($folder)){
				$message = "Folder Not Created";
				header("location:view-all-users.php?message=$message&color=red");
				die;
			}
		}
		if($image_flag){
			$ahead_step= true;	
			$temp_name 	= $_FILES['new_profile_pic']['tmp_name'];
			echo "<br/>";
			$filename = time()."_".$filename;
			$filename;
			move_uploaded_file($temp_name, "images/".$filename);
			echo $path_img = $folder."/".$filename;
			echO "<BR>";
		}
		if(!$image_flag){
			 $path_img = $_REQUEST['img_path'];
			 $ahead_step= true;
		}
		if ($ahead_step) {
			if ($locat =="admin/personal-modify-user.php") {
				$user_insert_query ="UPDATE `user` SET role_id='{$role_id}', first_name='{$first_name}', last_name= '{$last_name}',  user.password='{$confrim_password}', gender='{$gender}', date_of_birth='{$date_of_birth}', user_image='{$path_img}', address='{$address}', updated_at='{$time}' WHERE user_id='".$_REQUEST['user_id']."'";
				$res = mysqli_query($connection,$user_insert_query);
				if ($res){
					$message.="<br> Update Successfully ";					
					header("location:".$locat."?message=$message&color=green&action=update_account&user_id=".$_REQUEST['user_id']);
					die();
				}	
			}if ($locat =="profile-update.php") {
				$user_insert_query ="UPDATE `user` SET  first_name='{$first_name}', last_name= '{$last_name}',  user.password='{$confrim_password}', gender='{$gender}', date_of_birth='{$date_of_birth}', user_image='{$path_img}', address='{$address}', updated_at='{$time}' WHERE user_id='".$_REQUEST['user_id']."'";
				$res = mysqli_query($connection,$user_insert_query);
				if ($res){
					$message.="<br> Update Successfully ";					
					header("location:".$locat."?message=$message&color=green&action=update_account&user_id=".$_REQUEST['user_id']);
					die();
				}	
			}




			else {
				$user_insert_query ="UPDATE `user` SET  first_name='{$first_name}', last_name= '{$last_name}', gender='{$gender}', date_of_birth='{$date_of_birth}', user_image='{$path_img}', address='{$address}', updated_at='{$time}' WHERE user_id='".$_REQUEST['user_id']."'";
				$res = mysqli_query($connection,$user_insert_query);
				if ($res){
					$message.="<br> Update Successfully ";
					header("location:".$locat."?message=$message&color=green&action=update_account&user_id=".$_REQUEST['user_id']);
					die();
				}
			}					 	
		}
	}
}


?>