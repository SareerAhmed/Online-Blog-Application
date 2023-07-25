<?php 
	session_start();
	require_once 'connection/connection.php';
	date_default_timezone_set("asia/karachi");
	$timestamp = time();
	$time = date("Y-m-d H:i:s"); 


				if (isset($_SESSION['session_user_id'])) {
					$query_login_user = "SELECT * FROM USER WHERE user_id='".$_SESSION['session_user_id']."'";
					$res_of_cheack_user = mysqli_query($connection, $query_login_user);
					if($res_of_cheack_user->num_rows>0){
						$login_user_data = mysqli_fetch_assoc($res_of_cheack_user);
						/*echo "<pre>";
						print_r($login_user_data);
						echo "</pre>";*/
						extract($login_user_data);
					} 			
				}

 ?>