<?php
require_once 'connection/connection.php';
require_once 'sending_mail_function.php';
date_default_timezone_set("asia/karachi");
require_once("FPDF/fpdf.php");

$timestamp = time();

// $time = date("Y-j-d g:i:s a");
// $time = date("d-j-Y g:i:s a",$timestamp);
// echo $date = date("Y-m-d H:i:s"); 

$time = date("Y-m-d H:i:s a"); 
$page="registration-here.php";

	
						


if (isset($_REQUEST['register'])) {
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



	if ($flag == false) {
		
		header("location:registration-here.php?message=".$error_message);
	}
	else{
		$query_cheack_user = "SELECT * FROM USER WHERE email = '{$email}' AND user.password = '{$confrim_password}'";
		$res_of_cheack_user = mysqli_query($connection, $query_cheack_user);
		
			if($res_of_cheack_user->num_rows>0){
				$error_message =" Your are already registerd";
				header("location:registration-here.php?color=green&message=".$error_message);
			   die();
			}
		if (isset($_FILES['profile_pic'])) {
			$folder = "Images";
			if(!is_dir($folder)){
				if(!mkdir($folder)){
					$message = "Folder Not Created";
					header("location:registration-here.php?message=$message&color=red");
					die;
				}
			}
		}//end of isset profile pic
			 $filename 	= $_FILES['profile_pic']['name'];
			if (!$_FILES['profile_pic']['name']) {
						$message.="<br> Please Upload Profile ";
						header("Location:registration-here.php?message=$message");
				}
			if ($_FILES['profile_pic']['name']) {	
				$temp_name = $_FILES['profile_pic']['tmp_name'];
				$filename = time()."_".$filename;
				 $filename;
				 move_uploaded_file($temp_name, "Images/".$filename);
				 $path_img = $folder."/".$filename;
								 }//end of profile pic with name 
				$user_insert_query ="INSERT INTO `user` (first_name, last_name, email, user.password, gender, date_of_birth, user_image, address, is_approved, is_active, created_at, updated_at)
					VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$confrim_password}', '{$gender}', '{$date_of_birth}','{$path_img}','{$address}', 'pending', 'InActive' ,'{$time}','{$time}')";
					$result_insert_query = mysqli_query($connection,$user_insert_query);
					if ($result_insert_query){

						extract($_REQUEST);
						$pdf = new FPDF();
						$pdf->AddPage("P", "letter");
						$pdf->setFont("Times","B",30);
						$pdf->Cell(0,20,"My Account Information",0,1,"C");
						$pdf->setLineWidth(2);
						$pdf->setDrawColor(255,153, 0);
						$pdf->Line(0,30, 500, 30);
						$pdf->ln();
						$pdf->setFont("Times","B",10);
						$pdf->setLineWidth(0);
						$pdf->setDrawColor(0,0, 0);
						$pdf->Cell(100,10, "First Name:",1,0,"C");
						$pdf->Cell(100,10, $first_name,1,1,"C");
						$pdf->Cell(100,10, "Last Name:",1,0,"C");
						$pdf->Cell(100,10, $last_name,1,1,"C");
						$pdf->Cell(100,10, "Email:",1,0,"C");
						$pdf->Cell(100,10, $email,1,1,"C");
						$pdf->Cell(100,10, "Password:",1,0,"C");
						$pdf->Cell(100,10, $confrim_password,1,1,"C");
						$pdf->Cell(100,10, "Gender:",1,0,"C");
						$pdf->Cell(100,10, $gender,1,1,"C");
						$pdf->Cell(100,10, "Date of Birth:",1,0,"C");
						$pdf->Cell(100,10, $date_of_birth,1,1,"C");
						$pdf->Cell(100,10, "Address:",1,0,"C");
						$pdf->Cell(100,10, $address,1,1,"C");
						$pdf->Cell(100,10, "Account Created Date:",1,0,"C");
						$pdf->Cell(100,10, $time,1,1,"C");
						$pdf->Output("i", "Account_Detail.pdf");


						$query_role_update="UPDATE user SET role_id=2 WHERE email='{$email}'";
						$result_update=mysqli_query($connection,$query_role_update);



						$query_all_admin = "SELECT * FROM user WHERE role_id=1";
						$res_all_admin = mysqli_query($connection, $query_all_admin);

						$query_all_admin = "SELECT * FROM user WHERE role_id=1";
						$res_all_admin = mysqli_query($connection, $query_all_admin);
						while ($admin = mysqli_fetch_assoc($res_all_admin)) {
							$to_email=$admin['email'];
							$sub_email="New User just Signup with User Name: ".$first_name." ".$last_name." with email: ".$email; 
							$message_email="New User just Signup with User Name: ".$first_name." ".$last_name." with email: ".$email; 
							send_email($to_email,$message_email,$sub_email,$page);
						}
						
						/*$message.="<br> Registration Successfully ";
						header("Location:registration-here.php?message=$message&color=green&ganerate_pdf");*/
					}//end of resu
				
	}// end body of(if there is no validation error)
}//end of righter


?>