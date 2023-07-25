

	<!-- start of nav -->
	      			<nav class="navbar navbar-expand-lg bg-body-tertiary " >
					  <div class="container-fluid" id="navbar">
					    <a class="navbar-brand" href="../index.php">SA Scholarships</a>
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
					            Users Managing 
					          </a>
					          <ul class="dropdown-menu">
					            <li><a class="dropdown-item" href="view-all-users.php">View All Users</a></li>
					            <li><a class="dropdown-item" href="add-new-user.php">Add New User</a></li>
					            <li><hr class="dropdown-divider"></li>
					            <li><a class="dropdown-item" href="approve-users.php">Approve</a></li>
					            <li><a class="dropdown-item" href="rejected-users.php">Reject</a></li>
					            <li><a class="dropdown-item" href="pending-users.php">Pending</a></li>
					            <li><hr class="dropdown-divider"></li>
					            <li><a class="dropdown-item" href="follower.php">Managing Followers</a></li>
					          </ul>
					        </li>
					        <li class="nav-item dropdown">
					          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            Posts Blog
					          </a>
					          <ul class="dropdown-menu">
					            <li><a class="dropdown-item" href="add-blog.php">Add Blog</a></li>
					            <li><a class="dropdown-item" href="view-all-blogs.php">View All Blog</a></li>
					             <li><a class="dropdown-item" href="blogs-follower.php">Blogs Followers</a></li>
					            <li><hr class="dropdown-divider"></li>
					          </ul>
					        </li>
					        <li class="nav-item dropdown">
					          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            Posts Managing
					          </a>
					          <ul class="dropdown-menu">
					            <li><a class="dropdown-item" href="view-all-posts.php">View All Post</a></li>
					            <li><a class="dropdown-item" href="add-post.php">Add Post</a></li>
					            <li><hr class="dropdown-divider"></li>
					          </ul>
					        </li>
					         <li class="nav-item dropdown">
					          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            Categories Managing
					          </a>
					          <ul class="dropdown-menu">
					            <li><a class="dropdown-item" href="view-all-categories.php">View All Categories</a></li>
					            <li><a class="dropdown-item" href="add-categories.php">Add Category</a></li>
					            <li><hr class="dropdown-divider"></li>
					          </ul>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="view-all-comments.php">Managing Comments</a>
					        </li>
					         <li class="nav-item">
					          <a class="nav-link" href="view-all-feedback.php">Managing Feedback</a>
					        </li>
					        	
					      </ul> 
					      	
					      	<!-- if user is login and role is admin -->
								<li class="nav-item dropdown">
						          <a class="btn m-1" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: white; color: black; ">Account</a>
						          <ul class="dropdown-menu mr-5" >
						          	 <li><a  class="dropdown-item" href="index.php">Admin Control</a></li>
						            <li><a  class="dropdown-item" href="personal-modify-user.php">Update Profile</a></li>
						            <li><a class="dropdown-item" href="../setting-user.php">Setting</a></li>
						            <li><a class="dropdown-item" href="../logout-process.php">Logout</a></li>
						            <li><hr class="dropdown-divider"></li>
						          </ul>
						        </li>
						        <img class="" src=" <?php echo "../".$login_user_data['user_image']; ?>" style="width: 33px; height: 33px;">
							<!-- if user is login and role is ADMIN -->
					      		
					         
					        <!-- <button class="btn m-2"   data-bs-toggle="modal" data-bs-target="#registration_id"style="background-color: white " type="submit">Account</button> -->
					        
					         <!-- <button class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdropLogin">Login</button> -->
		        			<!-- <button class="btn" type="submit">Register</button> -->
					      
					    </div>
					  </div>
					</nav>
	<!-- end of nav -->