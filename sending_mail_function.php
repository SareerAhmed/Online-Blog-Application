<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php';

function send_email($to_email,$message_email,$sub_email,$location){

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
			$mail->Password = 'ubzhyvdvmibhtirf';
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
			if (!$mail->send()) {
				echo "Not Send";
				$msg ="Action Failed: ".$mail->ErrorInfo;
				header("location:registration-here.php?message=$msg&color=red");	
			}


	} 

 ?>