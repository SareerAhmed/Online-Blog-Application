<?php 
	require_once 'session.php';
	require_once 'show-blogs-post-function.php';
	require_once("FPDF/fpdf.php");
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
		p{
			color: black;
		}


	</style>
	
</head>
<body>
	<div class="container-fluid  col-12"> 
		<!-- start of nav -->
		<div class=" col-12 sticky-top" id="navbar">
  			<?php include_once("navbar.php");  ?>
  		</div>
  		<!-- end of nav <-->
		<!-- Start of intiate row -->
		<div class="col-12 ps-5">
			<div  class="container-fluid col-lg-12 col-md-6 col-sm-4">   		
				<!-- last updated post start -->
				<div class="container-fluid">
					<?php  include("last-updated-posts.php"); ?>
	      		</div>
	      		<!-- last updated post end -->
				
				<!-- start BACHELORS, MASTERS, PHD SCHOLARSHIPS -->
					<?php show_post_blog(1); ?>
				<!-- end BACHELORS, MASTERS, PHD SCHOLARSHIPS -->
				
				<!-- start INTERNSHIPS -->
					<?php  show_post_blog(5); ?>
	      		<!-- end INTERNSHIPS -->

	      		<!-- start EXCHANGE PROGRAMS -->
	      			<?php show_post_blog(4); ?>
	      		<!-- start EXCHANGE PROGRAMS -->
	      			
	      	</div>
	     </div>
		<!-- end of intiate row -->
		
		<!-- Modal Contact Us Start-->
			<?php include("contact-us-form.php"); ?>		
			<!-- Modal Contact US End -->	
	</div>
	

		<!-- Footer -->
			
			<?php include("footer.php"); ?>
			
		<!-- Footer End -->	
</body>
</html>