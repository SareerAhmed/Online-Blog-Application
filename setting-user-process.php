<?php 
require_once 'connection/connection.php';
require_once 'session.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
$count=1;

	if (isset($_REQUEST['set-color']) && $_REQUEST['set-color']='Set Color') {
		$query_to_cheack_setiing_exist="SELECT * FROM setting WHERE user_id=".$login_user_data['user_id'];
		$result_to_cheack_setiing_exist = mysqli_query($connection, $query_to_cheack_setiing_exist);
			if (!$result_to_cheack_setiing_exist->num_rows>0) {
				foreach ($_REQUEST as $key => $value) {
					if ($count==10) {
						break;
					}else{
						$insert_setting="INSERT INTO`setting` (user_id, setting_key, setting_value, setting_status)VALUES('{$login_user_data['user_id']}','{$key}','$value','Active')";
						$result_stting= mysqli_query($connection, $insert_setting);
						if (!$result_stting) {
					 	header("location:setting-user.php?msg=Setting Update Unsucssefull&color=red");
					 	} 
					 }
					$count++;
				}
				header("location:setting-user.php?msg=Setting Update Sucssefully&color=green");
			}
			if ($result_to_cheack_setiing_exist->num_rows>0) {
				$setting_update=" SELECT setting_id FROM `setting` WHERE user_id='{$login_user_data['user_id']}'";
				$result_setting_update= mysqli_query($connection, $setting_update);
				
				foreach ($_REQUEST as $key => $value) {
					echo $value;
					if ($count==10) {
						break;
					}else{
						$setting_id_is = mysqli_fetch_assoc($result_setting_update);
						extract($setting_id_is);
						$setting_id;
						$update_setting="UPDATE `setting` SET setting_key='{$key}', setting_value='$value' WHERE setting_id=$setting_id";
						$result_update_setting= mysqli_query($connection, $update_setting);
						if (!$result_update_setting) {
					 	header("location:setting-user.php?msg=Setting Update Unsucssefull&color=red");
					 	} 
					 }
					$count++;
				}
				header("location:setting-user.php?msg=Setting Update Sucssefully&color=green");
			}
	}
	if (isset($_REQUEST['defualt-color']) && $_REQUEST['defualt-color']=='Defualt Color' ) {
		$default_setting="DELETE FROM `setting` WHERE user_id=".$login_user_data['user_id'];
		$result_default_setting= mysqli_query($connection, $default_setting);
		if (!$result_default_setting) {
			header("location:setting-user.php?msg=Setting Update Unsucssefull&color=red");
		}else{
			header("location:setting-user.php?msg=Setting Update Sucssefully&color=green");
		}

	}


?>