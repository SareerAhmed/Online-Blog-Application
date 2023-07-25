<?php 
require_once 'session.php';
require_once("connection/connection.php");

	$_REQUEST['action']='show_all_blog';
	$_REQUEST['blog_id']=1;

	
	if (isset($_REQUEST['search_blog']) && $_REQUEST['search_blog']=='Search' ) {
		$query_count_blogs ="SELECT COUNT(blog_id) FROM `blog` WHERE blog_status='Active' AND blog_title LIKE '%{$_REQUEST['search_blog_title']}%' ORDER BY blog_title";}
		else{
			$query_count_blogs ="SELECT COUNT(blog_id) FROM `blog` WHERE blog_status='Active'";
		}
		// start of pagination		
		$result_count_blogs = mysqli_query($connection,$query_count_blogs);
		$array_total_blogs = mysqli_fetch_row($result_count_blogs);
		$total_blogs =$array_total_blogs[0];
		$total_links = ceil($total_blogs/6); 
		
		if(isset($_GET['page']))
		{	
			$start = ($_GET['page']*6);
		}else
		{
			$start = 0;
			$page_is =$_GET['page'] = 0;
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
	<div class="container-fluid row col-12 ps-5 ">
		<div class="container-fluid ">
			<div class="card-header" style="background-color: #B92533;color: white">
				<div class="container-fluid">
					<div class="row container-fluid">
						<div class="col-9 text-left">
							<table>
								<tr>
									<td> <h4><b><a style="text-decoration:none; color: white;" href="all-blogs.php?">ALL BLOGS</a></b></h4></td>
									 <?php //extract($blog_name_variable); ?>
									 </td> 									
								</tr>	
							</table>
						</div>
						<div class="col-3 mt-1">
							<form action="#" method="POST">
								<table>
									<tr>
										<td>	
											<input type="text" name="search_blog_title">
										</td>
										<td>
											<input type="submit" name="search_blog" value="Search">
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
			if (isset($_REQUEST['search_blog']) && $_REQUEST['search_blog']="Search" ) {
				$query_post_from_blog="SELECT * FROM `blog` WHERE blog_status='Active' AND blog_title LIKE '%{$_REQUEST['search_blog_title']}%' ORDER BY blog_title LIMIT 0,6";}
				else{

				$query_post_from_blog ="SELECT * FROM `blog` WHERE blog_status='Active' ORDER BY blog_title LIMIT $start,6 ";
				}
				$result_to_post = mysqli_query($connection, $query_post_from_blog);
			?>
			<?php if ($result_to_post->num_rows>0) {
				
				while ($blog_data = mysqli_fetch_assoc($result_to_post)) {
				extract($blog_data); 
					?>
					<div class="row col-4 mt-2">
						<a href="blog.php?action=show_blog&blog_id=<?php echo $blog_data['blog_id']; ?>" style="text-decoration: none ">
						<div class="card shadow-lg p-3 mb-1 bg-body-tertiary rounded" style="max-width: 540px; height: 210px;">
							<div class="row g-0">
								<div class="col-md-12">
									<div class="card-header">
										<center>
										<h3  style="background-color:#B92533; color: white; border-radius: 10px"><?php echo $blog_data['blog_title'];?></h3>
										<p class="card-text"><small> <?php
										$total_followers_is=0; 
							 			$query_total_followers="SELECT * FROM `following_blog` WHERE STATUS='Followed' AND blog_following_id=$blog_id";
							 			$result_total_followers= mysqli_query($connection, $query_total_followers);
							 			if ($result_total_followers->num_rows>0) {
							 				while ($total_numb=mysqli_fetch_assoc($result_total_followers)) {
							 				++$total_followers_is;
								 			}
								 		}
								 		echo "Followers: <b>".$total_followers_is;?> </b></small>
								 		</p>
								 	</div>
								 	<div class="card-body">
								 		<center>
								 			<img style="height: 90px;" src="<?php echo $blog_data['blog_background_image']; ?>" width="400px" class="img-fluid rounded-start" alt="...">
								 		</center>
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
								<a href="all-blogs.php?action=show_all_blog&blog_id=<?php echo $blog_name_variable['blog_id']?>&page=<?php echo $_GET['page'] - 1; ?>">
									Previous
								</a>
							<?php 

						}
					
					for($i=1; $i<=$total_links; $i++)
					{
						if($_GET['page'] == $i-1)
						{
							?>
							<a href="all-blogs.php?action=show_all_blog&page=<?php echo $i-1;?>" style="font-size: 30px; color: red;">
								<?php echo $i; ?>
									
							</a>
							<?php

						}else{
							?>
							<a href="all-blogs.php?action=show_all_blog&page=<?php echo $i-1;?>"><?php echo $i; ?></a>
							<?php
						}
						
					}
					//echo $i;
					if(( 1 + $_GET['page']) != $i-1)
					{
						?>

						<a href="all-blogs.php?action=show_all_blog&page=<?php echo $_GET['page'] + 1; ?>">
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


