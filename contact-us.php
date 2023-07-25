<?php 
require_once 'connection/connection.php';
require_once 'sending_mail_function.php';
require_once 'session.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();

$time = date("Y-m-d H:i:s"); 

extract($_REQUEST);
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
extract($_REQUEST);

$page= "contact-us.php";

if (isset($_REQUEST['feedback_send']) && $_REQUEST['feedback_send']=="feedback_send") {
	if (isset($login_user_data)) {
		$user_name =$first_name." ".$last_name;
		$quey_feedback_send="INSERT INTO user_feedback (user_id, user_name, user_email, feedback, created_at, updated_at) VALUE('{$user_id}','{$user_name}','{$email}','$feedback','{$time}','{$time}')";
		$result_inseting_feeback = mysqli_query($connection, $quey_feedback_send);
		if ($result_inseting_feeback) {
			$query_all_admin = "SELECT * FROM user WHERE role_id=1";
			$res_all_admin = mysqli_query($connection, $query_all_admin);
			while ($admin = mysqli_fetch_assoc($res_all_admin)) {
				$to_email=$admin['email'];
				$sub_email="New Feedback registered User Name: ".$first_name." ".$last_name." with email: ".$email; 
				$message_email=$feedback; 
				die();
				send_email($to_email,$message_email,$sub_email,$page);
			}
			$message="Feedback registered Succefully";
			header("Location:index.php?message=$message&color=green");
		}
	}else{
		$quey_feedback_send="INSERT INTO user_feedback (user_name, user_email, feedback, created_at, updated_at) VALUE('{$user_name}','{$user_email}','$feedback','{$time}','{$time}')";
		$result_inseting_feeback = mysqli_query($connection, $quey_feedback_send);

		if ($result_inseting_feeback) {
			$query_all_admin = "SELECT * FROM user WHERE role_id=1";
			$res_all_admin = mysqli_query($connection, $query_all_admin);
			while ($admin = mysqli_fetch_assoc($res_all_admin)) {
				$to_email=$admin['email'];
				$sub_email="New Feedback registered User Name: ".$user_name." with email: ".$user_email; 
				$message_email=$feedback; 
				send_email($to_email,$message_email,$sub_email,$page);
			}
			$message="Feedback registered Succefully";
			header("Location:index.php?message=$message&color=green");
		}
	} 
}



 ?>