<?php 
	require_once '../connection/connection.php';
	require_once 'session.php';
	date_default_timezone_set("asia/karachi");
	$timestamp = time();

	$time = date("Y-m-d H:i:s");
	echo "'{$login_user_data['user_id']}'";
/*	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";
*/

if (isset($_REQUEST['add_blog'])) {
	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";
	extract($_REQUEST);

	$flag = true;
	$error_message = null;

	if ($blog_title == "") {
		$flag = false;
		$error_message.="<li>Please Enter Title !...</li>";
	}

	
	if ($posts_per_blog == "0") {
		$flag = false;
		$error_message.="<li>Please Enter Number of post per page !...</li>";
	}


	if((!isset($_FILES['blog_background_image']['name'])) ||	 $_FILES['blog_background_image']['name']==""){
		$flag = false;
		$error_message.="<li>Please Upload Blog background image !...</li>";
	}

	if ($flag == false) {
		
		header("location:add-blog.php?color=red&message=".$error_message);
		die();
	}
			echo $filename 	= $_FILES['blog_background_image']['name'];
				if (!$_FILES['blog_background_image']['name']) {
						$message.="<br> Please Upload Profile ";
						header("Location:add-blog.php?message=$message");
					}
				if ($_FILES['blog_background_image']['name']) {	

						echo $temp_name = $_FILES['blog_background_image']['tmp_name'];
						echo "<br/>";
						$filename = time()."_".$filename;
						echo $filename;
						 move_uploaded_file($temp_name, "../Images/".$filename);
						 $path_img ="images/".$filename;
						 echO "<BR>";
						 $user_insert_query ="INSERT INTO `blog` (user_id, blog_title, post_per_page, blog_background_image, blog_status, created_at, updated_at)
						VALUES ('{$login_user_data['user_id']}', '{$blog_title}', '{$posts_per_blog}', '{$path_img}', 'active' ,'{$time}','{$time}')";

							$res = mysqli_query($connection,$user_insert_query);
								if ($res){
										$message.="<br> Blog Add Successfully ";
									header("Location:add-blog.php?message=$message&color=green");
									}
				}		
}

if (isset($_REQUEST['update_blog'])) {
	echo "<pre>";
	print_r($_REQUEST);echo "</pre>";
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";
	if (empty($_FILES['blog_background_image']['name'])) {
		extract($_REQUEST);
		$flag = true;
		$error_message = null;

		if ($blog_title == "") {
			$flag = false;
			$error_message.="<li>Please Enter Title !...</li>";
		}

		if ($posts_per_blog == "0") {
			$flag = false;
			$error_message.="<li>Please Enter Number of post per page !...</li>";
		}

		if ($flag == false) {
			header("location:edit-blog.php?color=red&message=".$error_message."&blog_id=".$_REQUEST['blog_id']);
			die();
		}
		$blog_update_query ="UPDATE `blog` SET blog.`blog_title`='{$blog_title}', blog.`post_per_page`='{$posts_per_blog}' WHERE blog.`blog_id`=$blog_id";
		$res = mysqli_query($connection,$blog_update_query);
		if ($res){
			$message.="<br> Blog Update Successfully ";
			header("Location:edit-blog.php?message=$message&color=green&blog_id=$blog_id");
		}
		
	}
	if (!empty($_FILES['blog_background_image']['name'])) {

		extract($_REQUEST);
		$flag = true;
		$error_message = null;

		if ($blog_title == "") {
			$flag = false;
			$error_message.="<li>Please Enter Title !...</li>";
		}

		if ($posts_per_blog == "0") {
			$flag = false;
			$error_message.="<li>Please Enter Number of post per page !...</li>";
		}

		if ($flag == false) {
			header("location:edit-blog.php?color=red&message=".$error_message."&blog_id=".$_REQUEST['blog_id']);
			die();
		}

		echo $filename 	= $_FILES['blog_background_image']['name'];
				if (!$_FILES['blog_background_image']['name']) {
						$message.="<br> Please Upload Profile ";
						header("Location:add-blog.php?message=$message");
					}
				if ($_FILES['blog_background_image']['name']) {	

						echo $temp_name = $_FILES['blog_background_image']['tmp_name'];
						echo "<br/>";
						$filename = time()."_".$filename;
						echo $filename;
						 move_uploaded_file($temp_name, "../Images/".$filename);
						 $path_img ="images/".$filename;
						 echO "<BR>";}
		$blog_update_query ="UPDATE `blog` SET blog.`blog_title`='{$blog_title}', blog.`post_per_page`='{$posts_per_blog}', blog.`blog_background_image`='{$path_img}' WHERE blog.`blog_id`=$blog_id";
		$res = mysqli_query($connection,$blog_update_query);
		if ($res){
			$message.="<br> Blog Update Successfully ";
			header("Location:edit-blog.php?message=$message&color=green&blog_id=$blog_id");
		}
	}		
}







		



 ?>