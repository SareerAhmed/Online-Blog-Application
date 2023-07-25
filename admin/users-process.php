<?php  

require_once '../connection/connection.php';
require_once '../sending_mail_function.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();

$time = date("Y-m-d H:i:s"); 



/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";*/


echo $locat = $_REQUEST['page']; 
/*die();
header("location:".$locat."?message=$message&color=green");*/
										

						if (isset($_REQUEST) && $_REQUEST['action']=="active") {
							 $user_insert_query ="UPDATE `user` SET is_active='active', updated_at='{$time}' WHERE user_id='".$_REQUEST['user_id']."'";
								$res = mysqli_query($connection,$user_insert_query);
							if ($res){
								$query_of_search ="SELECT * FROM `user` WHERE user_id=".$_REQUEST['user_id'];
								$user_result = mysqli_query($connection, $query_of_search);
								var_dump($user_result);
								$user_fianl = mysqli_fetch_assoc($user_result);
									var_dump($user_fianl);
									if ($user_fianl['gender']=='Male') {
										$gen="Mr. ";
									}else{
										$gen="Ms. ";
									}
								echo $user_fianl['email'];
								$to_email = $user_fianl['email'];
								$message_email= "Wellcome Back $gen ".$user_fianl['first_name']." ".$user_fianl['last_name']." Your Account Activated by Admin Now you can login in our website.";
								$sub_email = "Account Activation";
								send_email($to_email,$message_email,$sub_email,$locat);
								 		echo $message="<br> Update Successfully ";
										header("location:".$locat."?message=$message&color=green");				 
									}
						}

					elseif (isset($_REQUEST) && $_REQUEST['action']=="inactive") {
							 $user_insert_query ="UPDATE `user` SET is_active='inactive', updated_at='{$time}' WHERE user_id='".$_REQUEST['user_id']."'";
								$res = mysqli_query($connection,$user_insert_query);
									if ($res){
										$query_of_search ="SELECT * FROM `user` WHERE user_id=".$_REQUEST['user_id'];
										$user_result = mysqli_query($connection, $query_of_search);
									$user_fianl = mysqli_fetch_assoc($user_result);
									if ($user_fianl['gender']=='Male') {
										$gen="Mr. ";
									}else{
										$gen="Ms. ";
									}
									$to_email = $user_fianl['email'];
									$message_email= "".$gen." ".$user_fianl['first_name']." ".$user_fianl['last_name']." it's infrom to you that Your Account is now Deactivated by Admin if you have query contact admin.";
									$sub_email = "Account Deactivated";
									send_email($to_email,$message_email,$sub_email,$locat);
								 		echo $message="<br> Update Successfully ";
								 		header("location:".$locat."?message=$message&color=green");	
								 	}
						}		


						elseif (isset($_REQUEST) && $_REQUEST['action']=="approve") {
							 $user_insert_query ="UPDATE `user` SET is_approved='Approved', is_active='active', updated_at='{$time}' WHERE user_id='".$_REQUEST['user_id']."'";
								$res = mysqli_query($connection,$user_insert_query);
									if ($res){
										$query_of_search ="SELECT * FROM `user` WHERE user_id=".$_REQUEST['user_id'];
										$user_result = mysqli_query($connection, $query_of_search);
										$user_fianl = mysqli_fetch_assoc($user_result);
									if ($user_fianl['gender']=='Male') {
										$gen="Mr. ";
									}else{
										$gen="Ms. ";
									}
									$to_email = $user_fianl['email'];
									$message_email= "Wellcome $gen ".$user_fianl['first_name']." ".$user_fianl['last_name']."  it is inform to you that your Account is now Approved by Admin Now you can login in our website.";
									$sub_email = "Account Approval";
									send_email($to_email,$message_email,$sub_email,$locat);
								 		header("location:".$locat."?message=$message&color=green");	
								 	}
						}		
						elseif (isset($_REQUEST) && $_REQUEST['action']=="reject") {
							 $user_insert_query ="UPDATE `user` SET is_approved='Rejected', is_active='inactive', updated_at='{$time}' WHERE user_id='".$_REQUEST['user_id']."'";
								$res = mysqli_query($connection,$user_insert_query);
									if ($res){
										$query_of_search ="SELECT * FROM `user` WHERE user_id=".$_REQUEST['user_id'];
										$user_result = mysqli_query($connection, $query_of_search);
										$user_fianl = mysqli_fetch_assoc($user_result);
									if ($user_fianl['gender']=='Male') {
										$gen="Mr. ";
									}else{
										$gen="Ms. ";
									}
									$to_email = $user_fianl['email'];
									$message_email= "$gen ".$user_fianl['first_name']." ".$user_fianl['last_name']."  its inform to you that your Account is now Rejected by Admin if you have any query contact with admin.";
									$sub_email = "Account Rejection";
									send_email($to_email,$message_email,$sub_email,$locat);
								 		header("location:".$locat."?message=$message&color=green");	
								 	}
						}
						elseif (isset($_REQUEST) && $_REQUEST['action']=="blog_active") {
							 $blog_insert_query ="UPDATE `blog` SET `blog`.blog_status='Active', `blog`.updated_at='{$time}' WHERE `blog`.blog_id='".$_REQUEST['blog_id']."'";
								$res = mysqli_query($connection,$blog_insert_query);
									if ($res){
								 		header("location:".$locat."?message=$message&color=green");	
								 	}
						}
						elseif (isset($_REQUEST) && $_REQUEST['action']=="blog_inactive") {
							 $blog_insert_query ="UPDATE `blog` SET `blog`.blog_status='InActive', `blog`.updated_at='{$time}' WHERE `blog`.blog_id='".$_REQUEST['blog_id']."'";
								$res = mysqli_query($connection,$blog_insert_query);
									if ($res){
								 		header("location:".$locat."?message=$message&color=green");	
								 	}
						}		









?>