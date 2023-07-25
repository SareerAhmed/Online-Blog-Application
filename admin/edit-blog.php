<?php 
	require_once 'session.php';

		if (isset($_REQUEST['blog_id'])) {
			$query_of_blog_get="SELECT * FROM Blog WHERE blog_id=".$_REQUEST['blog_id'];
			$result_blog= mysqli_query($connection, $query_of_blog_get);
			if ($result_blog->num_rows>0) {
				$blog_data = mysqli_fetch_assoc($result_blog);
				extract($blog_data);
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
</head>
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
<body>
	<!-- start of nav -->
					<div class="col-12 sticky-top" id="navbar">
	      			<?php include_once("navbar.php");  ?>
					</div>




		   		 <div class="row">
		   	<div class="col-3" style="background-color: #B92533; ">
		   		<div class="col-lg-1">
			 		<?php include_once("sidebar/index.php"); ?>
			 	</div>
		   	</div>
		   	<!-- start all content -->
				<div class="col-lg-8">
						<!-- start content -->
						<div class="row container-fluid mt-3">
						    <h2 class="text-center" style="color: #B92533;">Edit Blog</h2>
		      					<center>
		      						<form action="add-blog-process.php" method="POST"  enctype="multipart/form-data">
		      						<?php 
		      						if (isset($_REQUEST['blog_id'])) { ?>
		      							<input type="hidden" name="blog_id" value="<?php echo $_REQUEST['blog_id'] ?>">
		      						<?php }
		      						?>

		      					<table>

									<hr>
		      						<tr>
									<?php if (isset($_REQUEST['message'])) {
										$bg_color = $_REQUEST['color'];
										      echo "<ul>";
									echo "<h2 style='color:".$bg_color."'>";
										       echo $_REQUEST['message'];
										      echo "</h2>";
										      echo "</ul>";
									} ?>
								</tr>
		      							<tr>
											<td><label>Title</label></td>
											<td> <input type="text" class="form-control w-100" name="blog_title" value="<?php echo $blog_title ?>"></td>
										</tr>
										<tr>
											<td><label>Posts Per Blog</label></td>
											<td>
												<input type="number" class="form-control w-80" cols="100" rows="10" name="posts_per_blog" value="<?php echo $post_per_page ?>">
											</td>	
										</tr>
										<tr>
											<td>
											<label for="blog_background_image">Blog Background Image:</label>
											</td>
											<td>
											  <input type="file" class="form-control w-100" name="blog_background_image">
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" name="blog_id" value="<?php echo $blog_id ?>">
											</td>
											<td>
												<div>
												<a><input type="submit"  class="btn btn-danger w-100 " style="margin-top:10%;" name="update_blog" value="Update Blog" /></a> 
									    
											</div>
											</td>
										</tr>	
								</table>
							</form>
							</center>
								
						</div>
	      				<!-- end content -->
				</div>
			 <!-- end all content -->
		</div>	



</body>
</html>