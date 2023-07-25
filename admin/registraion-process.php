<?php
require_once '../connection/connection.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();

$time = date("Y-m-d H:i:s"); 


if (isset($_REQUEST['register'])) {
	 echo "<pre>";
	   print_r($_REQUEST);
	 echo "</pre>";
	 echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
	 // die();
	$alpha_pattern     = "/^[A-Z]{1}[a-z]{2,}$/";
	$email_pattern     = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
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

	if(!isset($_FILES['profile_pic'])){
		$flag = false;
		$error_message.="<li>Please Upload Your Profile !...</li>";
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
	if ($role_type=='Admin') {
		$role=1;
	}elseif ($role_type=='User') {
		$role=2;
	}



	if ($flag == false) {
		
		header("location:add-new-user.php?color=red&message=".$error_message);
	}
	else{
		$query_cheack_user = "SELECT * FROM USER WHERE email = '{$email}' AND user.password = '{$confrim_password}'";
		$res_of_cheack_user = mysqli_query($connection, $query_cheack_user);
			var_dump($res_of_cheack_user);
			   if($res_of_cheack_user->num_rows>0){
			   	$error_message =" Your are already registerd";
			     header("location:add-new-user.php?message=".$error_message);
			     die();
			   }

			

		if (isset($_FILES['profile_pic'])) {
			$folder = "Images";
			if(!is_dir($folder)){
				if(!mkdir($folder)){
					$message = "Folder Not Created";
					header("location:add-new-user.php?message=$message&color=red");
					die;
				}
			}
	
			echo $filename 	= $_FILES['profile_pic']['name'];
				if (!$_FILES['profile_pic']['name']) {
						$message.="<br> Please Upload Profile ";
						header("Location:add-new-user.php?message=$message");
					}
				if ($_FILES['profile_pic']['name']) {	

						echo $temp_name 	= $_FILES['profile_pic']['tmp_name'];
						echo "<br/>";
						$filename = time()."_".$filename;
						echo $filename;
						 move_uploaded_file($temp_name, "../Images/".$filename);
						 $path_img =$folder."/".$filename;
						 echO "<BR>";
						 $user_insert_query ="INSERT INTO `user` (first_name, last_name, email, user.password, gender, date_of_birth, user_image, address, is_approved, is_active, created_at, updated_at)
						VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$confrim_password}', '{$gender}', '{$date_of_birth}','{$path_img}','{$address}', 'Approved', 'active' ,'{$time}','{$time}')";

							$res = mysqli_query($connection,$user_insert_query);
							// var_dump($res);
								if ($res){
										echo $query="UPDATE user SET role_id='{$role}',updated_at='{$time}'  WHERE email='{$email}'";
											$result=mysqli_query($connection,$query);
											var_dump($result);
										$message.="<br> Registration Successfully ";
										header("Location:add-new-user.php?message=$message&color=green");}
				}		
		}



		}
}


?>