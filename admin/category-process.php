<?php 
	require_once '../connection/connection.php';
	require_once 'session.php';
	date_default_timezone_set("asia/karachi");
	$timestamp = time();
	$time = date("Y-m-d H:i:s");

/*
	$time = date("Y-j-d g:i:s a");
	$time = date("d-M-Y g:i:s a",$timestamp);
	$time = date("Y-j-d G:i:s a");*/

	// echo "'{$login_user_data['user_id']}'";
	if (isset($_REQUEST['page'])) {
	 echo $locat = $_REQUEST['page']; 
	}
	// edit_category
	echo "<pre>";
	   print_r($_REQUEST);
	 echo "</pre>";

if (isset($_REQUEST['add_category'])) {
	 echo "<pre>";
	   print_r($_REQUEST);
	 echo "</pre>";
	 echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		extract($_REQUEST);
		$without_attachemtn =true;
		$flag = true;
		$error_message = null;

		if ($category_title =="") {
			$flag = false;
			$error_message.="<li>Please Write Category Title !...</li>";
		}

		if ($category_description == "") {
			$flag = false;
			$error_message.="<li>Please Write Category Description !...</li>";
		}
		if ($category_status == "not_select") {
			$flag = false;
			$error_message.="<li>Please Is Category Status !...</li>";
		}



		if ($flag == false) {
			
			header("location:add-categories.php?color=red&message=".$error_message);
			die();
		}

			
			echo $add_category_query ="INSERT INTO `category` (category_title, category_description, category_status, created_at, updated_at )
			VALUES ('{$category_title}', '{$category_description}', '{$category_status}', '{$time}', '{$time}');";
			
			$res = mysqli_query($connection,$add_category_query);
				if ($res){
					 
						$message.="<br> Category Added Successfully ";
						header("Location:add-categories.php?message=$message&color=green");
				}		
}

if (isset($_REQUEST['edit_category'])) {
	 echo "<pre>";
	   print_r($_REQUEST);
	 echo "</pre>";
	 echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		extract($_REQUEST);
		$flag = true;
		$error_message = null;

		if ($category_title =="") {
			$flag = false;
			$error_message.="<li>Please Write Category Title !...</li>";
		}

		if ($category_description == "") {
			$flag = false;
			$error_message.="<li>Please Write Category Description !...</li>";
		}
		if ($category_status == "not_select") {
			$flag = false;
			$error_message.="<li>Please Is Category Status !...</li>";
		}



		if ($flag == false) {
			header("location:".$locat."?message=$error_message&color=red");
			die();
		}


			$edit_category_query ="UPDATE `category` SET category_title='{$category_title}', category_description='{$category_description}', category_status='{$category_status}', updated_at='{$time}' WHERE category_id='".$_REQUEST['category_id']."'";
		$res = mysqli_query($connection,$edit_category_query);
		if ($res){
			echo $message="<br> Update Successfully ";
			header("location:".$locat."?message=$message&color=green");
		}	
			
				
}







if (isset($_REQUEST['action']) && $_REQUEST['action']=="inactive") {
	 echo "<pre>";
	 print_r($_REQUEST);
	 echo "</pre>";
		$inactive_category_query ="UPDATE `category` SET category_status='inactive', updated_at='{$time}' WHERE category_id='".$_REQUEST['category_id']."'";
		$res = mysqli_query($connection,$inactive_category_query);
		if ($res){
			echo $message="<br> Update Successfully ";
			header("location:".$locat."?message=$message&color=green");
		}		
}

if (isset($_REQUEST['action']) && $_REQUEST['action']=="active") {
	 // echo "<pre>";
	 // print_r($_REQUEST);
	 // echo "</pre>";
		$inactive_category_query ="UPDATE `category` SET category_status='active', updated_at='{$time}' WHERE category_id='".$_REQUEST['category_id']."'";
		$res = mysqli_query($connection,$inactive_category_query);
		if ($res){
			echo $message="<br> Update Successfully ";
			header("location:".$locat."?message=$message&color=green");
		}		
}

		



 ?>