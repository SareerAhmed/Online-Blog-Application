<?php  

require_once 'session.php'; 
require_once 'connection/connection.php';
date_default_timezone_set("asia/karachi");
$time = date("Y-m-d H:i:s");
echo "<pre>";
print_r($_REQUEST);						 
echo "</pre>";


if (isset($_REQUEST['loc']) && $_REQUEST['loc']=="blog.php" )  {
	extract($_REQUEST);
	if (isset($_REQUEST['action']) && $_REQUEST['action']=='follow') {
		$locat = $_REQUEST['loc']; 
		$query_follow_blog="INSERT INTO `following_blog` (follower_id, blog_following_id, STATUS, created_at, updated_at) VALUES ('{$login_user_data['user_id']}','{$_REQUEST['blog_id']}','Followed', '{$time}', '{$time}')";
		$resul_follow_blog= mysqli_query($connection, $query_follow_blog);
		if ($resul_follow_blog) {
			echo $message="<br> Follow Successfully";
			header("location:".$loc."?action=show_blog&blog_id=$blog_id&page=$page");
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action']=='unfollow') {
		$locat = $_REQUEST['loc']; 
		$query_unfollow_blog="UPDATE `following_blog` SET `following_blog`.`status`='Unfollowed', updated_at='{$time}' WHERE blog_following_id='{$_REQUEST['blog_id']}' AND follower_id='{$login_user_data['user_id']}'";
		$result_unfollow_blog= mysqli_query($connection, $query_unfollow_blog);
		if ($result_unfollow_blog) {
		echo $message="<br> Unfollow Successfully ";
		header("location:".$loc."?action=show_blog&blog_id=$blog_id&page=$page");
		}
	}
	if (isset($_REQUEST['action']) && $_REQUEST['action']=='refollow') {
		$locat = $_REQUEST['loc']; 
		$query_refollow_blog="UPDATE `following_blog` SET `following_blog`.`status`='followed', updated_at='{$time}' WHERE blog_following_id='{$_REQUEST['blog_id']}' AND follower_id='{$login_user_data['user_id']}'";
		$result_refollow_blog= mysqli_query($connection, $query_refollow_blog);
		if ($result_refollow_blog) {
			echo $message="<br> follow Successfully ";
			header("location:".$loc."?action=show_blog&blog_id=$blog_id&page=$page");
		}
	}



}

if (isset($_REQUEST['page']) && $_REQUEST['page']=="post.php" )  {
	if (isset($_REQUEST['action']) && $_REQUEST['action']=='follow') {
		echo "done";
		
		$locat = $_REQUEST['page']; 
		$post_id = $_REQUEST['post_id']; 
		$query_follow_blog="INSERT INTO `following_blog` (follower_id, blog_following_id, STATUS, created_at, updated_at) VALUES ('{$login_user_data['user_id']}','{$_REQUEST['blog_id']}','Followed', '{$time}', '{$time}')";
		$resul_follow_blog= mysqli_query($connection, $query_follow_blog);
		if ($resul_follow_blog) {
			echo $message="<br> Follow Successfully ";
			header("location:".$locat."?action=view_post&post_id=$post_id");
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action']=='unfollow') {
		$locat = $_REQUEST['page']; 
		$post_id = $_REQUEST['post_id']; 
		$query_unfollow_blog="UPDATE `following_blog` SET `following_blog`.`status`='Unfollowed', updated_at='{$time}' WHERE blog_following_id='{$_REQUEST['blog_id']}' AND follower_id='{$login_user_data['user_id']}'";
		$result_unfollow_blog= mysqli_query($connection, $query_unfollow_blog);
		if ($result_unfollow_blog) {
			echo $message="<br> Unfollow Successfully ";
			header("location:".$locat."?action=view_post&post_id=$post_id");
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action']=='refollow') {
		$locat = $_REQUEST['page']; 
		$post_id = $_REQUEST['post_id']; 
		$query_refollow_blog="UPDATE `following_blog` SET `following_blog`.`status`='followed', updated_at='{$time}' WHERE blog_following_id='{$_REQUEST['blog_id']}' AND follower_id='{$login_user_data['user_id']}'";
		$result_refollow_blog= mysqli_query($connection, $query_refollow_blog);
		if ($result_refollow_blog) {
			echo $message="<br> follow Successfully ";
			header("location:".$locat."?action=view_post&post_id=$post_id");
		}
	}
}











?>