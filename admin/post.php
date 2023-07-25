<?php 
	require_once("../session.php");
	include_once("../connection/connection.php");

	if (isset($_REQUEST['action']) && $_REQUEST['action']="view_post" ) {
		$query_post_from_blog ="SELECT * FROM blog INNER JOIN post ON blog.blog_id = post.blog_id
		INNER JOIN `user` ON `blog`.`user_id` = `user`.`user_id`
		INNER JOIN `post_category` ON `post`.`post_id` = `post_category`.`post_id`
		INNER JOIN category ON post_category.category_id = category.category_id 
		WHERE post.`post_id`=".$_REQUEST['post_id'];
		$result_to_post = mysqli_query($connection, $query_post_from_blog);
		if ($result_to_post->num_rows>0) {
			$blog_post = mysqli_fetch_assoc($result_to_post);
			// echo "<pre>";
			// print_r($blog_post);
			// echo "</pre>";
			extract($blog_post);
			$blog_post['post_id'];
			$time = date("Y-m-d H:i:s"); 
			if (isset($login_user_data)) {
				$query_to_cheack_setiing_exist="SELECT * FROM setting WHERE user_id=".$login_user_data['user_id'];
				$result_to_cheack_setiing_exist = mysqli_query($connection, $query_to_cheack_setiing_exist);
				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_title_font_size= $last_setting_is['setting_value'];
				}
				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_title_font_color =$last_setting_is['setting_value'];
				}
				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_title_backgourd_color= $last_setting_is['setting_value'];
				}


				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_summary_font_size= $last_setting_is['setting_value'];
				}
				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_summary_font_color =$last_setting_is['setting_value'];
				}
				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_summary_background_color= $last_setting_is['setting_value'];
				}

				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_description_font_size= $last_setting_is['setting_value'];
				}
				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_description_font_color =$last_setting_is['setting_value'];
				}
				if ($result_to_cheack_setiing_exist->num_rows>0) {
					$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
					$post_description_background_color= $last_setting_is['setting_value'];
				}
			}
		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SA Scholarship</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body{

		background-color: #eee;
		}

		.card{

		background-color: #fff;
		border: none;
		}

		.form-color{

		background-color: #fafafa;

		}

		.form-control{

		height: 48px;
		border-radius: 25px;
		}

		.form-control:focus {
		color: #495057;
		background-color: #fff;
		border-color: #B92533;
		outline: 0;
		box-shadow: none;
		text-indent: 10px;
		}

		.c-badge{
		background-color: #35b69f;
		color: white;
		height: 20px;
		font-size: 11px;
		width: 92px;
		border-radius: 5px;
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 2px;
		}

		.comment-text{
		font-size: 13px;
		}

		.wish{

		color:#35b69f;
		}


		.user-feed{

		    font-size: 14px;
		    margin-top: 12px;
		}

		#logo_and_time{
			background-color: #B92533;
			/*color: #1C76C1;*/
			color: white;
			font-family: cursive;
			text-align: center;
			margin: 10px;
			padding: 10px;
		}
		#links{
			color: #ADEFD1FF;
		}
		 .navbar-brand, .nav-link{
			color: white;

		}
		#subscibe_btn{
			background-color: #00203FFF;
			color: #ADEFD1FF; 
		}
		#navbar{
			background-color: #B92533;
		}
		#navbar_tabs{
			color: white;
		}
		#title_category_homepage{
			background-color:#B92533; 
			color: white; 
			margin-right: 60%;
			margin-bottom: 1px;	
			padding:2	px;
		}
		#post_title{
			font-size:<?php echo $post_title_font_size."px"; ?>;
			color: <?php echo $post_title_font_color?>;
			background-color: <?php echo $post_title_backgourd_color?>;;

		}
		#post_summary{

			font-size:<?php echo $post_title_font_size."px"; ?>;

			color: <?php echo $post_summary_font_color?>;
			background-color: <?php echo $post_summary_background_color?>;
		
		}
		#post_description{
			
			font-size:<?php echo $post_description_font_size."px";  ?>;

			color: <?php echo $post_description_font_color?>;
			background-color: <?php echo $post_description_background_color?>;
		
		}
		


	</style>
	
</head>
<body>
		<!-- start of nav -->
		<div class="col-12 sticky-top" id="navbar">
		<?php include_once("navbar.php");  ?>
		</div>
		<!-- end of nav <-->



<div class="container-fluid col-12 mt-3">
	<div class="container-fluid">
		<div class="card hadow-lg p-3 mb-5 bg-body-tertiary rounded">
			<div class="card-header" style="background-color: #B92533;color: white">
				<div class="container-fluid">
					<div class="row">
						<div class="col-10 text-left">
							<table>
								<tr>
									<td><label><h4>Blog:</h4></label></td></a>
									<td><a style="text-decoration:none; color:white; " href="blog.php?action=show_blog&blog_id=<?php echo $blog_id; ?>"> <h4 id="blog_title"><b> <?php echo strtoupper($blog_post['blog_title']);?></b></h4> </a></td>
									 <?php
									 	if (isset($login_user_data['user_id'])) {
									 		$query_cheack_following="SELECT * FROM `following_blog` WHERE follower_id='".$login_user_data['user_id']."' AND blog_following_id=".$blog_id;
									 		$result_cheack_following= mysqli_query($connection,$query_cheack_following);

									 		if ($result_cheack_following->num_rows>0) {
									 			$follow_blog_data= mysqli_fetch_assoc($result_cheack_following);

									 			
									 			if ($follow_blog_data['status']=='Unfollowed') { ?>
									 				<td><a  href="following-process.php?page=post.php&action=refollow&blog_id=<?php echo $blog_id; ?>&post_id=<?php echo $blog_post['post_id']; ?>" class="btn m-2   bg-primary" >Follow</a></td>
									 			<?php }
									 			if ($follow_blog_data['status']=='Followed') { ?>
									 				<td><a  href="following-process.php?page=post.php&action=unfollow&blog_id=<?php echo $blog_id; ?>&post_id=<?php echo $blog_post['post_id']; ?>" class="btn m-2   bg-primary" >Unfollow</a> </td>
									 			<?php }
									 		}else{  
									 			?>
									 			<td><a  href="following-process.php?page=post.php&action=follow&blog_id=<?php echo $blog_id; ?>&post_id=<?php echo $blog_post['post_id']; ?>" class="btn m-2   bg-primary" >Follow</a></td>
									 			<?php
									 		}	
									 ?>
									 <td> 
									 	<?php
									 	$total_followers_is=0; 
									 	$query_total_followers="SELECT * FROM `following_blog` WHERE STATUS='Followed' AND blog_following_id=$blog_id";
									 	$result_total_followers= mysqli_query($connection, $query_total_followers);
									 		if ($result_total_followers->num_rows>0) {
									 			while ($total_numb=mysqli_fetch_assoc($result_total_followers)) {
									 				++$total_followers_is;
									 			}
									 		}
									 		echo $total_followers_is;
									 	} ?>
									 </td> 									
								</tr>
								<tr>
									<td><label class="blog_title">Category:</label></td>

									<td> <a style="text-decoration:none; color: white;" href="category-posts.php?action=show_all_category_posts&category_id=<?php echo $blog_post['category_id'];?>"> <b><?php echo $blog_post['category_title'];?></b></a> </td>
								</tr>
							</table>
						</div>
						<div class="col-2">
							<h5> 
							<img src="../<?php echo $blog_post['user_image']; ?>" style="width: 50px; height: 50px; border-radius: 50%">
								<br> 
								<?php echo $blog_post['first_name']." ".$blog_post['last_name']; ?></h5>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
			    <h2 class="card-title" id="post_title"><?php echo $blog_post['post_title']; ?></h2>
			    <hr><h3 class="card-text" id="post_summary"><?php echo $blog_post['post_summary']; ?></hr>
			    </h3>
			    <hr>
			    <hp class="card-text" id="post_description"><?php echo htmlspecialchars_decode($blog_post['post_description']); ?>
			    </hp>
			    <!-- <a href="#" class="btn btn-primary">Apply</a> -->
			</div>
		</div>				
	</div>
</div>

<?php if ($blog_post['is_comment_allowed']==1 && isset($_SESSION['session_user_id']) ) { ?>
<div class="container-fluid mt-5 mb-5">
		<div class="row height d-flex justify-content-center align-items-center"> 
			<div class="col-md-10">
	<h2 style="background-color: #B92533;color: white">Comments</h2>
				<div class="card">
					<form action="comment-process.php?post_id=<?php echo $blog_post['post_id'];?>" method="POST">
					<div class="p-3">
						<h6>Comments</h6>
	                </div>
	                <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
	                	<img src="../<?php echo $login_user_data['user_image']; ?>" width="50" class="rounded-circle mr-2">
	                	<textarea class="form-control w-100" cols="60" rows="1" name="comment_body" placeholder="Enter your comment..." style="margin-right: 10px"></textarea>
	                	<input type="submit" class="btn" style="background-color: #B92533; color: white" name="comment_submit" value="Comment">
	                </div>
	                </form> 
	                <?php 

					$query_all_comment = "SELECT post.`post_id`, user.`first_name`, user.`last_name`, user.`user_image`, post.`post_title`, post_comment.`post_comment_id`, post_comment.`comment`, post_comment.`is_active`,post_comment.`created_at`  FROM `post` INNER JOIN post_comment ON post_comment.post_id = post.post_id INNER JOIN `user` ON `post_comment`.`user_id` = `user`.`user_id` WHERE post_comment.`is_active`='Active' AND post.`post_id`='".$blog_post['post_id']."' ORDER BY post_comment_id DESC";
						$res_of_all_comment = mysqli_query($connection, $query_all_comment);
						if ($res_of_all_comment->num_rows>0) {
							while ($comment_data= mysqli_fetch_assoc($res_of_all_comment)){
								echo "<pre>";
								// print_r($comment_data);
								echo "</pre>";
							  ?><hr>
								<div class="mt-2">
				                	<div class="d-flex flex-row p-3">
				                		<img src="../<?php echo $comment_data['user_image']?>" width="40" height="40" class="rounded-circle mr-3">
				                		<div class="w-100">
				                			<div class="d-flex justify-content-between align-items-center">
				                				<div class="d-flex flex-row align-items-center">
				                					<span class="mr-2"><?php echo htmlspecialchars_decode($comment_data['first_name'])." ".$comment_data['last_name']?></span>
				                				</div>
				                				<small><?php echo get_time_ago( strtotime( $comment_data['created_at']) ); ?></small>
				                			</div>
				                			<p class="text-justify comment-text mb-0"><?php echo $comment_data['comment']?></p>
				                		</div>
				                	</div>
				                </div>
				                
							<?php }//end of while loop for comments
						}//end of if

						}

	                 ?>
	                

	            	
	            </div>
	        </div>
	    </div>
</div>

<?php   ?>


		
		<!-- Modal Contact Us Start-->
			<?php  
				include("../contact-us-form.php"); 
			?>		
		<!-- Modal Contact US End -->

		<!-- Footer -->
		<footer>
			<div class="container-fluid col-12" style="padding-top: 150px">
				<?php
					include("footer.php");
				?>
			</div>
		</footer>
		<!-- Footer End -->			


</body>
</html>
<?php

function get_time_ago($time)
{
    $time_difference = time() - $time;
    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );
    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;
        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

?>