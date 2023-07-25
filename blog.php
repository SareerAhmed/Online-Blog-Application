<?php 
require_once 'session.php';
require_once("connection/connection.php");

	if (isset($_REQUEST['action']) && $_REQUEST['action']="show_blog" ) {
		$query_post_from_blog ="SELECT * FROM `blog`, user WHERE blog.`user_id`=user.`user_id` AND  blog.`blog_id`=".$_REQUEST['blog_id'];
		$result_to_post = mysqli_query($connection, $query_post_from_blog);
		$blog_name_variable = mysqli_fetch_assoc($result_to_post);
		// start of pagination
		if (isset($_REQUEST['search_post']) && $_REQUEST['search_post']=="Search") {
			$query_count_posts ="SELECT COUNT(post_description) FROM post WHERE post_status='Active' AND post_title LIKE '%{$_REQUEST['search_post_title']}%' AND `blog_id`=".$_REQUEST['blog_id'];
		}else{
			$query_count_posts ="SELECT COUNT(post_description) FROM post WHERE post_status='Active' AND `blog_id`=".$_REQUEST['blog_id'];
		}
		$result_count_posts = mysqli_query($connection,$query_count_posts);
		$array_total_posts = mysqli_fetch_row($result_count_posts);
		$total_posts =$array_total_posts[0];
		$total_links = ceil($total_posts/$blog_name_variable['post_per_page']); 
		if(isset($_GET['page']))
		{	
			$start = ($_GET['page']*$blog_name_variable['post_per_page']);
		}else
		{
			$start = 0;
			$_GET['page'] = 0;
		}
 // $_GET['page'];
		
	}
	if (isset($_GET['page'])){ 
		$page_is =$_GET['page'];
	}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SA Scholarship</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<style>
		

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


	</style>
	
</head>
<body>
	<!-- start of nav -->
	<div class="container-fluid"> 
	
					<div class=" col-12 sticky-top" id="navbar">
	      			<?php include_once("navbar.php");  ?>
					</div>
	      			<!-- end of nav <-->


<!-- Start of intiate row -->
	<div class="container-fluid row col-12 ps-5 mt-3">
		<div class="container-fluid mt-1">

			<div class="card-header" style="background-color: #B92533;color: white">
				<div class="container-fluid">
					<div class="row">
						<div class="col-9 text-left">
							<table>
								<tr>
									<td> <h4><b><a style="text-decoration:none; color: white;" href="blog.php?action=show_blog&blog_id=<?php echo $blog_name_variable['blog_id']?>"><?php echo strtoupper($blog_name_variable['blog_title']);?></a></b></h4></td>
									 <?php extract($blog_name_variable);
									 if (isset($login_user_data['user_id'])) {
									 	$query_cheack_following="SELECT * FROM `following_blog` WHERE follower_id='".$login_user_data['user_id']."' AND blog_following_id=".$blog_id;
									 		$result_cheack_following= mysqli_query($connection,$query_cheack_following);
									 		if ($result_cheack_following->num_rows>0) {
									 			$follow_blog_data= mysqli_fetch_assoc($result_cheack_following);

									 			if ($follow_blog_data['status']=='Unfollowed') { ?>
									 				<td><a  href="following-process.php?loc=blog.php&action=refollow&blog_id=<?php echo $blog_id."&page=".$page_is?>" class="btn m-2   bg-info" >Follow</a></td>
									 			<?php }
									 			if ($follow_blog_data['status']=='Followed') { ?>
									 				<td><a  href="following-process.php?loc=blog.php&action=unfollow&blog_id=<?php echo $blog_id."&page=".$page_is?>" class="btn m-2   btn-dark" >Unfollow</a> </td>
									 			<?php }
									 		}else{  
									 			?>
									 			<td><a  href="following-process.php?loc=blog.php&action=follow&blog_id=<?php echo $blog_id."&page=".$page_is?>" class="btn m-2   btn-info" >Follow</a></td>
									 			<?php
									 		} ?>
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
									<td>
										<h5>
								<?php echo "<small>Blogger:   </small>".$blog_name_variable['first_name']." ".$blog_name_variable['last_name']; ?>
							<img src=" <?php echo $blog_name_variable['user_image']; ?>" style="width: 50px; height: 50px; border-radius: 50%">
								</h5>
									</td>
								</tr>	
							</table>
						</div>
						<div class="col-3 mt-5">
								<form action="#" method="POST">
								<table>
									<tr>
										<td>	
											<input type="text" name="search_post_title">
										</td>
										<td>
											<input type="submit" name="search_post" value="Search">
										</td>
									</tr>
								</table>
							</form>
						</div>

					</div>
				</div>
			</div>
			<div class="container-fluid border border-danger" ></div>
			</div><?php 
			if (isset($_REQUEST['action']) && $_REQUEST['action']=="show_blog") {
				if (isset($_REQUEST['search_post']) && $_REQUEST['search_post']=="Search") {
					$query_post_from_blog ="SELECT * FROM `blog`,`post` WHERE `post`.`blog_id`=`blog`.`blog_id` AND post_status='Active' AND blog.`blog_id`=".$_REQUEST['blog_id']." AND post_title LIKE '%{$_REQUEST['search_post_title']}%' ORDER BY post_id DESC LIMIT $start,".$blog_name_variable['post_per_page'];
				}else{
					$query_post_from_blog ="SELECT * FROM `blog`,`post` WHERE `post`.`blog_id`=`blog`.`blog_id` AND post_status='Active' AND blog.`blog_id`=".$_REQUEST['blog_id']." ORDER BY post_id DESC LIMIT $start,".$blog_name_variable['post_per_page'];
				}
				$result_to_post = mysqli_query($connection, $query_post_from_blog);
			}?>
			<?php if ($result_to_post->num_rows>0) {
				while ($blog_post = mysqli_fetch_assoc($result_to_post)) { ?>
					<div class="row col-4 mt-3">
						<a href="post.php?action=view_post&post_id=<?php echo $blog_post['post_id']; ?>" style="text-decoration: none ">
							<div class="card shadow-lg p-3 mb-1 bg-body-tertiary rounded" style="max-width: 540px; height: 200px;">
								<div class="row g-0">
									<div class="col-md-4">
										<img src="<?php echo $blog_post['featured_image']; ?>" width="250px" class="img-fluid rounded-start" alt="...">
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h5 class="card-title"><?php echo $blog_post['post_title'];?></h5>
											<!-- <p class="card-text"><?php echo $blog_post['post_summary'];?></p> -->
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>			
				<?php }//while loop
			$hide_pagenation=false;
			} else{ 
				$hide_pagenation=true; 
				?>
				<center>
					<br><br>
					<p>No Record Found</p>
					</center> <?php
			} ?> <!-- end of if -->
		</div>
	</div>
<!-- end of intiate row -->
	

	<!-- PAGINATION START -->
		<center>
				<hr />
				<p>
					<?php 
					if (!$hide_pagenation==true) { 
						if($_GET['page'] > 0)
						{
							?>
								<a href="blog.php?action=show_blog&blog_id=<?php echo $blog_name_variable['blog_id']?>&page=<?php echo $_GET['page'] - 1; ?>">
									Previous
								</a>
							<?php 

						}
					
					for($i=1; $i<=$total_links; $i++)
					{
						if($_GET['page'] == $i-1)
						{
							?>
							<a href="blog.php?action=show_blog&blog_id=<?php echo $blog_name_variable['blog_id']?>&page=<?php echo $i-1;?>" style="font-size: 30px; color: red;">
								<?php echo $i; ?>
									
							</a>
							<?php

						}else{
							?>
							<a href="blog.php?action=show_blog&blog_id=<?php echo $blog_name_variable['blog_id']?>&page=<?php echo $i-1;?>"><?php echo $i; ?></a>
							<?php
						}
						
					}
					// echo $i;
					// echo $_GET['page'];
					if(( 1 + $_GET['page']) != $i-1)
					{
						?>

						<a href="blog.php?action=show_blog&blog_id=<?php echo $blog_name_variable['blog_id']?>&page=<?php echo $_GET['page'] + 1; ?>">
							Next
						</a>
						<?php
					}
				}	

					



				?>
				</p>
				<hr />
		</center>
	<!-- PAGINATION END -->



		
		<!-- Modal Contact Us Start-->
			<?php  
			include("contact-us-form.php");
		?>		<!-- Modal Contact US End -->	
		<!-- Modal Login -->
			<?php  
			include("login-form.php");
			?>
		<!-- Modal Login End -->

		<!-- Modal forgot Start-->
			<?php  
			include("forgot-form.php");
			?>
		<!-- Modal forgot End -->

		<!-- Modal Registration -->
			<?php  
			//include("registration-form.php");
			?>
		<!-- Modal Registration End -->
		

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


