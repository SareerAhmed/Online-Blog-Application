<?php 
require_once 'session.php';
require_once("connection/connection.php");

	if (isset($_REQUEST['action']) && $_REQUEST['action']="show_all_category_posts" ) {
		$show_name_category= "SELECT * FROM category WHERE category_id={$_REQUEST['category_id']}";
		$result_show_name_category= mysqli_query($connection,$show_name_category);
		$category_name_is = mysqli_fetch_assoc($result_show_name_category);
		 $query_post_from_blog ="SELECT * FROM `post` INNER JOIN `post_category` ON post.`post_id`=`post_category`.`post_id` INNER JOIN `category` ON `category`.`category_id`= `post_category`.`category_id` WHERE post_status='Active'  AND `category`.`category_id`='{$_REQUEST['category_id']}' ORDER BY post.`post_id` DESC";
		$result_to_post = mysqli_query($connection, $query_post_from_blog);
		$blog_name_variable = mysqli_fetch_assoc($result_to_post);
		// start of pagination
		if (isset($_REQUEST['search_post']) && $_REQUEST['search_post']=="Search") {
			$query_count_posts ="SELECT COUNT(post.`post_id`) FROM `post` INNER JOIN `post_category` ON post.`post_id`=`post_category`.`post_id` INNER JOIN `category` ON `category`.`category_id`= `post_category`.`category_id` WHERE post_status='Active'  AND `category`.`category_id`='1' AND post_title LIKE '%{$_REQUEST['search_post_title']}%' ORDER BY post.`post_id` DESC";
		}else{
			$query_count_posts ="SELECT COUNT(post.`post_id`) FROM `post` INNER JOIN `post_category` ON post.`post_id`=`post_category`.`post_id` INNER JOIN `category` ON `category`.`category_id`= `post_category`.`category_id` WHERE post_status='Active'  AND `category`.`category_id`={$_REQUEST['category_id']} ORDER BY post.`post_id` DESC";
		}
		$result_count_posts = mysqli_query($connection,$query_count_posts);

		$array_total_posts = mysqli_fetch_row($result_count_posts);
		$total_posts =$array_total_posts[0];
		$total_links = ceil($total_posts/6); 
		if(isset($_GET['page']))
		{	
			$start = ($_GET['page']*6);
		}else
		{
			$start = 0;
			$page_is =$_GET['page'] = 0;
		}

		
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
						<div class="col-8 text-left mt-2">
							<table>
								<tr>
									<td> <h4><b><a style="text-decoration:none; color: white;" href="category-posts.php?action=show_all_category_posts&category_id=<?php echo $category_name_is['category_id']?>"><?php echo strtoupper($category_name_is['category_title']);?></a></b></h4></td>
									 <?php extract($category_name_is); ?>
									
									 </td> 									
								</tr>	
							</table>
						</div>
						<div class="col-3 ms-5 mt-2">
							<h5>
							
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
			if (isset($_REQUEST['action']) && $_REQUEST['action']="show_all_category_posts" ) {
				if (isset($_REQUEST['search_post']) && $_REQUEST['search_post']=="Search"){
					$query_post_from_blog ="SELECT * FROM `post` INNER JOIN `post_category` ON post.`post_id`=`post_category`.`post_id` INNER JOIN `category` ON `category`.`category_id`= `post_category`.`category_id` WHERE post_status='Active' AND `category`.`category_id`='{$_REQUEST['category_id']}' AND post_title LIKE '%{$_REQUEST['search_post_title']}%'ORDER BY post.`post_id` DESC  LIMIT $start,6";
				}else{
							 $query_post_from_blog ="SELECT * FROM `post` INNER JOIN `post_category` ON post.`post_id`=`post_category`.`post_id` INNER JOIN `category` ON `category`.`category_id`= `post_category`.`category_id` WHERE post_status='Active'  AND `category`.`category_id`='{$_REQUEST['category_id']}' ORDER BY post.`post_id` DESC LIMIT $start,6";

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
			} 
			else{ 
				$hide_pagenation=true; 
				?>
				<center>
					<br><br>
					<p>No Record Found</p>
					</center>

			<?php } ?> 
		</div>
	</div>
<!-- end of intiate row -->
	

	<!-- PAGINATION START -->
		<center>

				<p>
					<?php
					if (!$hide_pagenation==true) {
					 	
					 
						if($_GET['page'] > 0)
						{
							?>
								<a href="category-posts.php?action=show_all_category_posts&category_id=<?php echo $_REQUEST['category_id']?>&page=<?php echo $_GET['page'] - 1; ?>">
									Previous
								</a>
							<?php 

						}
					
					for($i=1; $i<=$total_links; $i++)
					{
						if($_GET['page'] == $i-1)
						{
							?>
							<a href="category-posts.php?action=show_all_category_posts&category_id=<?php echo $_REQUEST['category_id']?>&page=<?php echo $i-1;?>" style="font-size: 30px; color: red;">
								<?php echo $i; ?>
									
							</a>
							<?php

						}else{
							?>
							<a href="category-posts.php?action=show_all_category_posts&category_id=<?php echo $_REQUEST['category_id']?>&page=<?php echo $i-1;?>"><?php echo $i; ?></a>
							<?php
						}
						
					}
					// echo $i;
					// echo $_GET['page'];
					if(( 1 + $_GET['page']) != $i-1)
					{
						?>

						<a href="category-posts.php?action=show_all_category_posts&category_id=<?php echo $_REQUEST['category_id']?>&page=<?php echo $_GET['page'] + 1; ?>">
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


