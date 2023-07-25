<?php 
	require_once '../connection/connection.php';
	require_once 'session.php';
	require_once '../sending_mail_function.php';
	date_default_timezone_set("asia/karachi");
	$timestamp = time();

	$time = date("Y-m-d H:i:s");
	 "'{$login_user_data['user_id']}'";
	 if (isset($_REQUEST['location'])) {
	 	 $locat = $_REQUEST['location'];
	 }
/*	 echo "<pre>";
	 print_r($_REQUEST);
	 print_r($_FILES);
	 echo "</pre>";
*/


	 extract($_REQUEST);
 	 /*echo "<pre>";
	   print_r($_REQUEST);
	 echo "</pre>";
	 echo "<pre>";
		print_r($_FILES);*/
		echo "</pre>";
		 //("location:".$locat."?message=$msg&color=green&action=edit&post_id=".$_REQUEST['post_id']);


if (isset($_REQUEST['add_post'])) {


	extract($_REQUEST);
	$without_attachemtn =true;
	$flag = true;
	$error_message = null;
		//echo "{$post_status}";
	// die();

	if ($blog_id_to_post == "not_select") {
		$flag = false;
		$error_message.="<li>Please Select Blog !...</li>";
	}
	if ($category_id_to_post == "not_select") {
		$flag = false;
		$error_message.="<li>Please Select Category !...</li>";
	}
	if ($post_status == "not_select") {
		$flag = false;
		$error_message.="<li>Please Is Select Post Status !...</li>";
	}

	if ($post_title =="") {
		$flag = false;
		$error_message.="<li>Please Write Post Title !...</li>";
	}
	if ($post_summary == "") {
		$flag = false;
		$error_message.="<li>Please Write Post Summmary !...</li>";
	}

	if ($post_description == "") {
		$flag = false;
		$error_message.="<li>Please Write Post Description !...</li>";
	}
	if ($is_comment_allowed == "not_select") {
		$flag = false;
		$error_message.="<li>Please Is Comment Allowed !...</li>";
	}

	if((!isset($_FILES['post_attachment']['name'])) || $_FILES['post_attachment']['name']=="")
	{
		$without_attachemtn =false;
		// $error_message.="<li>Please Upload Post background image !...</li>";
	}


	if ($flag == false) {
		
		// header("location:add-post.php?color=red&message=".$error_message);
		header("location:".$locat."?message=$error_message&color=red&action=edit&post_id=".$_REQUEST['post_id']);
		die();
	}
	if ($without_attachemtn ==true) {
		$filename 	= $_FILES['post_attachment']['name'];
		if (!$_FILES['post_attachment']['name']) {
				$message.="<br> Please Upload Profile ";
				header("Location:add-post.php?color=red&message=$message");
				die();
			}
			if ($_FILES['post_attachment']['name']) {	
				$temp_name = $_FILES['post_attachment']['tmp_name'];
				$filename = time()."_".$filename;
				move_uploaded_file($temp_name, "../Images/".$filename);
				$path_img ="images/".$filename;
			}
	}
	if ($without_attachemtn ==false) {
		$path_img ="nothing";
	}
	$encoded_post=htmlspecialchars($post_description);
	if ($flag == true) {
			$user_post_query ="INSERT INTO `post` (blog_id, post_title, post_summary, post_description, featured_image, post_status, is_comment_allowed, created_at, updated_at)VALUES ('{$blog_id_to_post}', '{$post_title}', '{$post_summary}', '{$encoded_post}', '{$path_img}', '{$post_status}', '{$is_comment_allowed}', '{$time}', '{$time}')";
		
			$res = mysqli_query($connection,$user_post_query);
			if ($res){
				 $last_post_id = mysqli_insert_id($connection);
				 $insert_post_category ="INSERT INTO `post_category` (post_id, category_id, created_at, updated_at )VALUES ('{$last_post_id}', '{$category_id_to_post}', '{$time}', '{$time}' );";
				 $result_of_post_category = mysqli_query($connection,$insert_post_category);
				 if ($result_of_post_category) {
				 	$message="<br> Post Add Successfully ";
				 	echo $getting_followers_data= "SELECT `user`.`email`, `user`.`first_name`, `user`.`last_name`, `blog`.`blog_title`, `following_blog`.`status` FROM `following_blog` INNER JOIN `blog` ON `following_blog`.`blog_following_id`= `blog`.`blog_id` INNER JOIN `user` ON `following_blog`.`follower_id`=`user`.`user_id` WHERE `blog`.`blog_id`=$blog_id_to_post";
				 	$result_followed_users= mysqli_query($connection, $getting_followers_data);
				 	if ($result_followed_users->num_rows>0) {
				 		while ($followers_data= mysqli_fetch_assoc($result_followed_users)) {
					 			echo "<br>";
					 			echo "<pre>";
					 			print_r($followers_data);
					 			echo "</pre>";
					 			$to_email=$followers_data['email'];
					 			$message_email="Hi  <b>".$followers_data['first_name']." ".$followers_data['last_name']."</b> New Post: <b>".$post_title."</b> Added on Blog: <b>".$followers_data['blog_title']."</b>";
					 			$sub_email=$message_email; 
					 			send_email($to_email,$message_email,$sub_email,$page);
				 		}
				 	}							

				 	if (isset($_REQUEST['is_attachments_number']) && $_REQUEST['is_attachments_number']==1) {
						header("location:post_attachment.php?post_id=$last_post_id&attachments_number=$attachments_number&location=$locat");
						die();
					}else{
						header("location:".$locat."?message=$message&color=green&action=edit");
						die();
					}
				}
			}
		}		
}


	if (isset($_REQUEST['edit_post'])) {

		extract($_REQUEST);
		$without_attachemtn =true;
		$flag = true;
		$error_message = null;
			 "{$post_status}";

		if ($blog_id_to_post == "not_select") {
			$flag = false;
			$error_message.="<li>Please Select Blog !...</li>";
		}
		if ($category_id_to_post == "not_select") {
			$flag = false;
			$error_message.="<li>Please Select Category !...</li>";
		}
		if ($post_status == "not_select") {
			$flag = false;
			$error_message.="<li>Please Is Select Post Status !...</li>";
		}

		if ($post_title =="") {
			$flag = false;
			$error_message.="<li>Please Write Post Title !...</li>";
		}
		if ($post_summary == "") {
			$flag = false;
			$error_message.="<li>Please Write Post Summmary !...</li>";
		}

		if ($post_description == "") {
			$flag = false;
			$error_message.="<li>Please Write Post Description !...</li>";
		}
		if ($is_comment_allowed == "not_select") {
			$flag = false;
			$error_message.="<li>Please Is Comment Allowed !...</li>";
		}
		
		if(empty($_FILES['post_attachment']['name'])){
			$image_flag = false;
			 $old_profie="true";
			 $new_profie="false";
			}
		if(!empty($_FILES['post_attachment']['name'])){
				$old_profie="false";
			 	$new_profie="true";
			 	$image_flag = true;
			} 



		if ($flag == false) {
			
			// header("location:add-post.php?color=red&message=".$error_message);
			header("location:".$locat."?message=$error_message&color=red&action=edit&post_id=".$_REQUEST['post_id']);
			echo "flag chal rha hai";
			die();
		}

		$filename 	= $_FILES['post_attachment']['name'];
			if ($new_profie){
				$folder = "images";
				if(!is_dir($folder)){
					if(!mkdir($folder)){
						$message = "Folder Not Created";
						header("location:edit-post.php.php?message=$message&color=red");
						die;
					}
				}
			}
					echo "<pre>";
					// print_r($_REQUEST);
					// print_r($_FILES);
					echo "</pre>";
					if($image_flag){
						$ahead_step= true;	
						$temp_name 	= $_FILES['post_attachment']['tmp_name'];
						echo "<br/>";
						$filename = time()."_".$filename;
						$filename;
						move_uploaded_file($temp_name, "../images/".$filename);
						echo $path_img = $folder."/".$filename;
						echO "<BR>";
					}
					if(!$image_flag){
					 $path_img = $_REQUEST['featured_image'];
						$ahead_step= true;
					}
					
					$encoded_post=htmlspecialchars($post_description);
					$query_post_update="UPDATE `post` SET blog_id='{$blog_id_to_post}', post_title= '{$post_title}', post_summary='{$post_summary}',  post_description='{$encoded_post}', featured_image='{$path_img}', post_status='{$post_status}', is_comment_allowed='{$is_comment_allowed}', updated_at='{$time}' WHERE post_id=".$post_id;
					$res = mysqli_query($connection,$query_post_update);
					if ($res){
						$update_post_category ="UPDATE `post_category` SET post_id='{$post_id}', category_id='{$category_id_to_post}', updated_at='{$time}' WHERE post_category_id=".$post_category_id;
					 	$result_of_post_category = mysqli_query($connection,$update_post_category);
					 	if ($result_of_post_category) {
							$msg="<br> Post Updated Successfully ";

							if (isset($_REQUEST['is_attachments_number']) && $_REQUEST['is_attachments_number']==1) {
								$post_id = $_REQUEST['post_id'];
								header("location:post_attachment.php?post_id=$post_id&page=edit-post.php&attachments_number=$attachments_number&location=$locat");
								die();
							}else{
								header("location:edit-post.php?message=$msg&color=green&action=edit&post_id=".$_REQUEST['post_id']);
								die();
							}
						}
					}		
	}


	if (isset($_REQUEST['action']) && $_REQUEST['action']=='active_post') {
		print_r($_REQUEST);
		$query_post_update="UPDATE `post` SET post_status='Active', updated_at='{$time}' WHERE post_id=".$post_id;
			$res = mysqli_query($connection,$query_post_update);
				if ($res){
					$msg="<br> Post Updated Successfully ";
					header("location:$locat?message=$msg&color=green&action=edit&post_id=".$_REQUEST['post_id']);
					die();
				}	
	}

	if (isset($_REQUEST['action'])  && $_REQUEST['action']=='in_active_post' ) {
		print_r($_REQUEST);
		$query_post_update="UPDATE `post` SET post_status='InActive', updated_at='{$time}' WHERE post_id=".$post_id;
			$res = mysqli_query($connection,$query_post_update);
				if ($res){
					$msg="<br> Post Updated Successfully ";
					header("location:$locat?message=$msg&color=green&action=edit&post_id=".$_REQUEST['post_id']);
					die();
				}	
	}

	if (isset($_REQUEST['add_attachments'])  && $_REQUEST['add_attachments']=='Add Attachments' ) {
		echo "<pre>";
		print_r($_REQUEST);
		print_r($_FILES);
		echo "</pre>";

		/*for ($i=1; $i <=$_REQUEST['attachments_number'] ; $i++) { 
			echo $_REQUEST['post_attachment_title1'];
		}*/

		// echo $post_attachment_title=$key;
			$count=1;

		foreach ($_REQUEST as $key => $value) {
			if ($key=='add_attachments') {
				break;
			}
			
			echo $post_attachment_title[$count]= $value;
			echo "<br>";
			$count++;
		}
		$count =1;
		foreach ($_FILES as $key => $value) {
			echo "<pre>";
			print_r($value);
			echo "</pre>";

			$folder = "Images";
			if(!is_dir($folder)){
				if(!mkdir($folder)){
					$message = "Folder Not Created";
					// header("location:add-new-user.php?message=$message&color=red");
					header("location:".$locat."?message=$msg&color=green&post_id=".$_REQUEST['post_id']);
					die;
				}
			}

			$filename 	= $value['name'];
			if (!$filename 	= $value['name']) {
					$message="<br> Please Upload Attachment ";
					// header("Location:add-new-user.php?message=$message");
				}
			if ($value['name']) {
				echo $temp_name = $value['tmp_name'];
				echo "<br/>";
				$filename = time()."_".$filename;
				$filename;
				move_uploaded_file($temp_name, "../Images/".$filename);
				echo $path_img =$folder."/".$filename;
				echo "<br>";
				echo $insert_post_attachment="INSERT INTO `post_atachment` (post_id, post_attachment_title, post_attachment_path, is_active) VALUES ('{$_REQUEST['post_id']}', '{$post_attachment_title[$count]}', '$path_img','Active')";
				$count++;

				$result_post_attachment= mysqli_query($connection, $insert_post_attachment);
				if ($result_post_attachment) {
					$message= "Post Added Succefully";
					header("location:".$locat."?message=$message&color=green&post_id=".$_REQUEST['post_id']);
				}
				

			}
		}


	}

	if(isset($_REQUEST['action']) && $_REQUEST['action']=="inactive_attachment"){
		echo $update_post_attachment_status="UPDATE `post_atachment` SET `post_atachment`.`is_active`='InActive' WHERE post_atachment_id=".$_REQUEST['post_atachment_id'];
		$result_update_post_attachment_status= mysqli_query($connection, $update_post_attachment_status);
		if($result_update_post_attachment_status){
			$message ="Post Attachment Setting Updated";
			header("location:view-all-posts-attachments.php?action=view_post&post_id=$post_id&message=$message&color=green&");

		}
	}
	if(isset($_REQUEST['action']) && $_REQUEST['action']=="active_attachment"){
		echo $update_post_attachment_status="UPDATE `post_atachment` SET `post_atachment`.`is_active`='Active' WHERE post_atachment_id=".$_REQUEST['post_atachment_id'];
		$result_update_post_attachment_status= mysqli_query($connection, $update_post_attachment_status);
		if($result_update_post_attachment_status){
			$message ="Post Attachment Setting Updated";
			header("location:view-all-posts-attachments.php?action=view_post&post_id=$post_id&message=$message&color=green&");

		}
	}

	if (isset($_REQUEST['modify_attachments']) && $_REQUEST['modify_attachments']=="Modify Attachments") {
		extract($_REQUEST);
		extract($_FILES);
		$post_attachment_title1;
		$post_attachment_path1['name'];


		if (!empty($post_attachment_path1['name'])) {
			
			$folder = "Images";
			if(!is_dir("../".$folder)){
				if(!mkdir($folder)){
					$message = "Folder Not Created";
					header("location:post_attachment-edit.php?message=$message&color=red");
					die;
				}
			}
			$filename 	= $post_attachment_path1['name'];
			if (!$filename 	= $post_attachment_path1['name']) {
					$message="<br> Please Upload Attachment";
					//header("Location:post_attachment-edit.php?message=$message&color=red&post_atachment_id=$post_atachment_id");
				}

			if ($post_attachment_path1['name']) {
				echo $temp_name = $post_attachment_path1['tmp_name'];
				echo "<br/>";
				$filename = time()."_".$filename;
				$filename;
				move_uploaded_file($temp_name, "../Images/".$filename);
				echo $path_img =$folder."/".$filename;
				echo "<br>";
				$update_attachments="UPDATE `post_atachment` SET `post_atachment`.`post_attachment_title`='{$post_attachment_title1}', `post_atachment`.`post_attachment_path`='{$path_img}' WHERE `post_atachment`.`post_atachment_id`={$post_atachment_id}";
			}
		}else{
			$update_attachments="UPDATE `post_atachment` SET `post_atachment`.`post_attachment_title`='{$post_attachment_title1}'  WHERE `post_atachment`.`post_atachment_id`={$post_atachment_id}";
		}
			$result_update_attachment= mysqli_query($connection, $update_attachments);
				if ($result_update_attachment) {
					$post_id = $_REQUEST['post_id'];
								
					$message= "Post Attachment Update Succefully";
				header("location:post_attachment-edit.php?message=$message&post_id=$post_id&color=green&post_atachment_id=$post_atachment_id");	
				}
				
	}





		



 ?>