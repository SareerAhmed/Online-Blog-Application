<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>profile update</title>
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
	      			<!-- end of nav <-->

	      				<div class="row container-fluid">
	      					<h2 class="text-center mt-2" style="color: #B92533;">Profile Update</h2>
	      					<div class="col-1"></div>
	      					<div class="col-10 mt-2">
	      						<form action="#" method="POST">
								    <div class="form-group">
								        <label for="fname">First Name:</label>
								        <input type="text" class="form-control w-100" value="Sareer"   name="first_name" required>
								    </div>
								    <div class="form-group">
								        <label for="last_name">Last Name:</label>
								        <input type="text" class="form-control w-100"  value="Ahmed" name="last_name" required>
								    </div>
								     <div class="form-group">
								        <label for="email">Email:</label>
								        <input type="email" class="form-control w-100" value="sareer@gmail.com" name="email" required>
								     </div>
								     <div class="form-group m-2">
								     <label for="gender">Gender:</label>
								        <input type="radio"  name="gender" value="Male" value="" checked > Male
								        <input type="radio" name="gender"  value="Female" value="">Female
								     </div>
								     
								      <div class="form-group">
								        <label for="adrees">Address:</label>
								        <input type="text" class="form-control w-100" value="Jamshoro Sindh "   name="first_name" required>
								    </div>
								      <div class="form-group">
										  <label for="date of birth">Profile:</label>
										  <input type="file" class="form-control w-100" id="inputGroupFile01">
										</div>

									
								     <div class="form-group mb-5">
								        <label for="date of birth">Date of Birth:</label>
								        <input type="date" class="form-control w-100" value="2001-05-17" name="date_of_birth" required>
								     </div>
								    
								    
								    <a href="view-all-users.php"><input type="button"  class="btn btn-danger w-100 " style="margin-top:2%;" name="update" value="Add User" /></a> 
								    <a href="view-all-users.php"><input type="button"  class="btn btn-danger w-100 " style="margin-top:2%;" name="update" value="Go Back" /></a>
								  </form>
	      					</div>
	      				</div>

</body>
</html>