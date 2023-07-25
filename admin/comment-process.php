<?php  

require_once '../connection/connection.php';
require_once '../sending_mail_function.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();

$time = date("Y-m-d H:i:s"); 



echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

echo $locat = $_REQUEST['page']; 
										
					if (isset($_REQUEST) && $_REQUEST['action']=="active") {
							$update_comment_query ="UPDATE `post_comment` SET is_active = 'Active' WHERE post_comment_id='".$_REQUEST['post_comment_id']."'";
							$res_update_comment_query = mysqli_query($connection,$update_comment_query);
							if ($res_update_comment_query){
								 		echo $message="<br> Update Successfully ";
										header("location:".$locat."?message=$message&color=green");				 
									}
						}
					elseif (isset($_REQUEST) && $_REQUEST['action']=="inactive") {
							$update_comment_query ="UPDATE `post_comment` SET is_active = 'InActive' WHERE post_comment_id='".$_REQUEST['post_comment_id']."'";
							$res_update_comment_query = mysqli_query($connection,$update_comment_query);
							if ($res_update_comment_query){
								 		echo $message="<br> Update Successfully ";
										header("location:".$locat."?message=$message&color=green");				 
									}
						}	








?>