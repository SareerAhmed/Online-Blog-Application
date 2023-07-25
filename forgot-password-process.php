<?php  
require_once 'connection/connection.php';
require_once 'sending_mail_function.php';

date_default_timezone_set("asia/karachi");
$time = date("Y-m-d H:i:s");
$email_pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
if (isset($_REQUEST['page'])) {
$locat = $_REQUEST['page']; 
}


$new_rendom_password = password_generate(10);

$flag = true;

extract($_REQUEST);

if (isset($_REQUEST['email'])) {

	$flag = true;
	$error_message = null;
	if ($email == "") {
		$flag = false;
		$error_message.="Please Enter Email !...<br>";
	}else{

		if( !preg_match($email_pattern, $email) ){
			$flag = false;
		    $error_message.="Email must be like eg : sherry1@yahoo.com !...<br>";
		}
	}

	if ($flag == false) {	
		header("location:forgot-password.php?color&red&message=".$error_message);
		die();
	}

	$query_cheack_user_db = "SELECT * FROM USER WHERE email = '{$email}'";
	$res_of_cheack_user = mysqli_query($connection, $query_cheack_user_db);
	if($res_of_cheack_user->num_rows>0){
	$user_data = mysqli_fetch_assoc($res_of_cheack_user);
		$query_password_update="UPDATE user SET password='{$new_rendom_password}' 
		WHERE user_id=".$user_data['user_id'];
		$res_of_password_update = mysqli_query($connection, $query_password_update);
		if($res_of_password_update){
				echo "<pre>";
				var_dump($res_of_password_update);
				echo "</pre>";
				$query_of_search_to_mail ="SELECT * FROM `user` WHERE user_id=".$user_data['user_id'];
				$result_search_to_mail = mysqli_query($connection, $query_of_search_to_mail);
				$user_final = mysqli_fetch_assoc($result_search_to_mail);
				echo "<pre>";
				var_dump($user_final);
				echo "</pre>";
				$user_final['password'];

				if ($user_final['gender']=='Male') {
					$gen="Mr. ";
				}else{
					$gen="Ms. ";
				}
				
				echo $to_email = $user_final['email'];
				echo "<br>";
				echo $message_email= "Hi $gen <b>".$user_final['first_name']." ".$user_final['last_name']."</b> Your forgot password request has been recieved, now your account password is:<b> ".$user_final['password'];;
				echo "<br>";
				$sub_email = "Account Password Restore";
				send_email($to_email,$message_email,$sub_email,$locat);
				$msg="We Send you your new password via Email Please check inbox";
				header("location:".$locat."?message=$msg&color=green");

			}
	}else{
		$error_message.="No User Found with this email: <b>".$email." !</b>...";
		header("location:forgot-password.php?color=red&message=".$error_message);

	}

}





function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}



?>