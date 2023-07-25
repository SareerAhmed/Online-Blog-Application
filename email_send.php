<?php  
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['user_name'])) {
	if ($_SESSION['user_roll']=="user") {
		header("location:index.php");
	}
	elseif ($_SESSION['user_roll']=="Admin") {
	
	

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

require_once("require/connection.php");

require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php';
$email_flag =false;

if (isset($_REQUEST['action']) && $_REQUEST['action']=="unactive" ) {
	$query ="UPDATE `users` SET user_status ='0' WHERE user_id=".$_REQUEST['user'];
		$result = mysqli_query($connection, $query);
	$query_of_search ="SELECT * FROM `users` WHERE user_id=".$_REQUEST['user'];
		$user_result = mysqli_query($connection, $query_of_search);
		$user_fianl = mysqli_fetch_assoc($user_result);
		var_dump($user_fianl);
		echo $user_fianl['user_email'];
		$to_email = $user_fianl['user_email'];
		$message_email= "Your Account Suspended please Conatct Admin if you have query";
		$sub_email = "Suspension of your account";
		$email_flag = true;
}

if (isset($_REQUEST['action']) && $_REQUEST['action']=="active" ) {
	$query ="UPDATE `users` SET user_status ='1' WHERE user_id=".$_REQUEST['user'];
		$result = mysqli_query($connection, $query);
	$query_of_search ="SELECT * FROM `users` WHERE user_id=".$_REQUEST['user'];
		$user_result = mysqli_query($connection, $query_of_search);
		$user_fianl = mysqli_fetch_assoc($user_result);
		var_dump($user_fianl);
		echo $user_fianl['user_email'];
		$to_email = $user_fianl['user_email'];
		$message_email= "Your Account Activated Wellcome to hidaya.";
		$sub_email = "Account Activation";
		$email_flag = true;
}


if ($email_flag) {
	//Create a new PHPMailer instance
		$mail = new PHPMailer();
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// SMTP::DEBUG_OFF = off (for production use)
		// SMTP::DEBUG_CLIENT = client messages
		// SMTP::DEBUG_SERVER = client and server messages
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption mechanism to use - STARTTLS or SMTPS
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = 'sareer.ahmed.hidaya@gmail.com';
		//Password to use for SMTP authentication
		$mail->Password = 'pmumvurfvaebsgsk';
		///-----Setup Done---//

		//Set who the message is to be sent from
		$mail->setFrom('sareer.ahmed.hidaya@gmail.com');
		// //Set an alternative reply-to address
		// $mail->addReplyTo('sareerrajper@gmail.com');
		if (isset($cc_email) && !empty($cc_email)) {
		$mail->AddCc($cc_email);
		}
		if (isset($BCc_email) && !empty($BCc_email)) {
		$mail->AddBcc($BCc_email);
		}
		//Set who the message is to be sent to
		$mail->addAddress($to_email);
		//Set the subject line
		if (isset($sub_email) && !empty($sub_email)) {
		$mail->Subject = $sub_email;
		}
		//Read an HTML message body
		$mail->msgHTML("$message_email");
		//Attach an image file (optional)
		if (isset($path_attachment)) {
		$mail->addAttachment($path_attachment);
		}
		//send the message, check for errors
		if ($mail->send()) {
			echo "Send";
			$msg ="Action perform Succesfully";
		    header("location: admin.php?msg=$msg&color=green");

			
		} else {
			echo "Not Send";
			$msg ="Action Failed: ".$mail->ErrorInfo;
		    header("location: admin.php?msg=$msg.&color=red");

		}
}


}
	else{
		header("location:index.php?msg=login first");
	}

}





?>