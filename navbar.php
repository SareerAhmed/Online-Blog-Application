<?php 

	
	
		$query_all_blog = "SELECT * FROM blog WHERE blog_status='Active'";
		$res_of_all_blog = mysqli_query($connection, $query_all_blog); 
	
					

?>


	<!-- start of nav -->
	      			<nav class="navbar navbar-expand-lg bg-body-tertiary " >
					  <div class="container-fluid" id="navbar">
					    <a class="navbar-brand" href="index.php">SA Scholarships</a>
					    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					      <span class="navbar-toggler-icon"></span>
					    </button>
					    <div class="collapse navbar-collapse" id="navbarSupportedContent">
					      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
					        <li class="nav-item">
					          <a class="nav-link active" aria-current="page"id="navbar_tabs" href="index.php">HOME</a>
					        </li>
					     <!--   <li class="nav-item">
					          <a class="nav-link" href="#">Scholarship</a>
					        </li> -->
					        <li class="nav-item dropdown">
					          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            ALL BLOGS
					          </a>
					          <ul class="dropdown-menu">

					          	<li><a class="dropdown-item" href="all-blogs.php">All Blogs</a></li>
					          	
					            <li><hr class="dropdown-divider"></li>
					          </ul>
					        </li>
					          <li class="nav-item">
					          <a class="nav-link" href="all-categories.php?">All CATEGORIES</a>
					        </li>
					        
					        <li class="nav-item">
					          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">CONTACT US</a>
					        </li>
				
					      </ul>
					      <?php 
					      	if (isset($_SESSION['role_id']) && $_SESSION['role_id']==2) { ?>
							<!-- if user is login and role is user -->
								<li class="nav-item dropdown">
						          <a class="btn m-2 " role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: white; color: black; ">Account</a>
						          <ul class="dropdown-menu mr-5" >
						            <li><a  class="dropdown-item" href="profile-update.php">Update Profile</a></li>
						            <li><a class="dropdown-item" href="setting-user.php">Setting</a></li>
						            <li><a class="dropdown-item" href="logout-process.php">Logout</a></li>
						            <li><hr class="dropdown-divider"></li>
						          </ul>
						        </li>
						        <img src=" <?php echo $user_image ?>" style="width: 33px; height: 33px;">
							<!-- if user is login and role is user -->
								<?php } elseif(isset($_SESSION['role_id']) && $_SESSION['role_id']==1) { ?>
							<!-- if user is login and role is admin -->
								<li class="nav-item dropdown">
						          <a class="btn m-2 " role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: white; color: black; ">Account</a>
						          <ul class="dropdown-menu mr-5" >
						          	 <li><a  class="dropdown-item" href="admin/index.php">Admin Control</a></li>
						            <li><a  class="dropdown-item" href="profile-update.php">Update Profile</a></li>
						            <li><a class="dropdown-item" href="setting-user.php">Setting</a></li>
						            <li><a class="dropdown-item" href="logout-process.php">Logout</a></li>
						            <li><hr class="dropdown-divider"></li>
						          </ul>
						        </li>
						        <img src=" <?php echo $login_user_data['user_image']; ?>" style="width: 33px; height: 33px;">
							<!-- if user is login and role is ADMIN -->
								<?php
								
								}else{
					       ?>
					      <form class="d-flex">
					        <a  href="login.php" class="btn m-2" style="background-color: white " type="submit">Login</a>

					        <a  href="registration-here.php" class="btn m-2" style="background-color: white " type="submit">Register</a>
					      </form>
					      <?php 
					      }
					       ?>
					    </div>
					  </div>
					</nav>
	<!-- end of nav -->





