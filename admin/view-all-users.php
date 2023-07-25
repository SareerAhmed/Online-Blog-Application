<?php require_once 'session.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Users</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Table Data/jquery.dataTables.min.css">
	<script type="text/javascript" src="Table Data/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="Table Data/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function () {
    	$('#all_users_table').DataTable();
	});
	</script>

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
	      			<!-- end of nav <-->

	   <div class="container row">
		   	<div class="col col-3" style="background-color: #B92533; ">
		   		<div class="col-lg-1">
			 		<?php include_once("sidebar/index.php"); ?>
			 	</div>
		   	</div>
		   	<!-- start all content -->
		   	<div class="col container col-lg-9">
		   		<div class="container">
		   			<h2 class="text-center mt-2" style="color: #B92533;">View All User</h2>
		   			<div  class="col-lg-12 col-md-6 col-sm-4">
		   				<div class="row container">
		   					<?php include_once("Table Data/Table-Data.php"); ?>	
		   				</div>	
		   			</div>	     
		   		</div>	
		   	</div>
		   </div>

</body>
</html>