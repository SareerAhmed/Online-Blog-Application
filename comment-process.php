<?php  

	require_once 'session.php';
	require_once("connection/connection.php");
	date_default_timezone_set("asia/karachi");

echo  $time = date("Y-m-d H:i:s"); 

// print_r($_REQUEST);
extract($_REQUEST);
extract($login_user_data);
echo $user_id;

$decoded_comment=htmlspecialchars($comment_body);

// $login_user_data['user_id'];
if (isset($_REQUEST['comment_submit'])) {
	$query_insert_comment="INSERT INTO `post_comment` (post_id, user_id, COMMENT, is_active, created_at) VALUES ('$post_id', '$user_id', '$decoded_comment', 'InActive', '$time')";
	$result_insert_comment = mysqli_query($connection, $query_insert_comment);

	if ($result_insert_comment) {
		header("Location:post.php?action=view_post&post_id=$post_id");
	}
}












?>