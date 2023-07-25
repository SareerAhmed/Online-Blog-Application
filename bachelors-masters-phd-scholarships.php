<?php   
	$query_scholarship_program_post = "SELECT * FROM post WHERE blog_id=1 AND post_status='Active' ORDER BY post_id DESC;";
	$res_scholarship_program_post = mysqli_query($connection, $query_scholarship_program_post);
	if($res_scholarship_program_post->num_rows>0){

	}
 ?>    



<!-- start BACHELORS, MASTERS, PHD SCHOLARSHIPS -->

<div class="container-fluid row" id="SCHOLARSHIPS">
		<div class="container-fluid mt-5">
			<h5 id="title_category_homepage" style=" text-align: left;"> BACHELORS, MASTERS, PHD SCHOLARSHIPS</h5>
			<div class="container-fluid border border-danger" ></div>
		</div>
		<div class="container-fluid row mt-3">
			<?php  $latest_post= mysqli_fetch_assoc($res_scholarship_program_post); ?>
			<div class="col-4">
				<div class="card shadow-lg p-3 mb-1 bg-body-tertiary rounded" style="max-width: 540px; height: 200px;">
					<div class="row g-0">
						<div class="col-md-4">
							<a href="post.php?action=view_post&post_id=<?php echo $latest_post['post_id']; ?>" style="text-decoration:none">
							<img src="<?php echo $latest_post['featured_image']; ?>" width="150px" class="img-fluid rounded-start" alt="...">  
						</a>
						</div>
						<div class="col-md-8 ps-3">
							<a href="post.php?action=view_post&post_id=<?php echo $latest_post['post_id']; ?>" style="text-decoration:none">
							<p class="card-title" style="color: black;"><b><?php echo $latest_post['post_title'];?></b></p>
								<p class="card-text" ><?php echo $latest_post['post_summary'];?></p>
							</a>
							<div class="card-body">
								
								<!-- <p class="card-text"><small class="text-body-secondary">Last updated updated_at</small></p> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php  $latest_post= mysqli_fetch_assoc($res_scholarship_program_post); ?>

			<div class="col-4">
				<div class="card shadow-lg p-3 mb-1 bg-body-tertiary rounded" style="max-width: 540px; height: 200px;">
					<div class="row g-0">
						<div class="col-md-4">
							<a href="post.php?action=view_post&post_id=<?php echo $latest_post['post_id']; ?>" style="text-decoration:none">
							<img src="<?php echo $latest_post['featured_image']; ?>" width="150px" class="img-fluid rounded-start" alt="...">  
						</a>
						</div>
						<div class="col-md-8 ps-3">
							<a href="post.php?action=view_post&post_id=<?php echo $latest_post['post_id']; ?>" style="text-decoration:none">
							<p class="card-title" style="color: black;"><b><?php echo $latest_post['post_title'];?></b></p>
								<p class="card-text" ><?php echo $latest_post['post_summary'];?></p>
							</a>
							<div class="card-body">
								
								<!-- <p class="card-text"><small class="text-body-secondary">Last updated updated_at</small></p> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php  $latest_post= mysqli_fetch_assoc($res_scholarship_program_post); ?>
			<div class="col-4">
				<div class="card shadow-lg p-3 mb-1 bg-body-tertiary rounded" style="max-width: 540px; height: 200px;">
					<div class="row g-0">
						<div class="col-md-4">
							<a href="post.php?action=view_post&post_id=<?php echo $latest_post['post_id']; ?>" style="text-decoration:none">
							<img src="<?php echo $latest_post['featured_image']; ?>" width="150px" class="img-fluid rounded-start" alt="...">  
						</a>
						</div>
						<div class="col-md-8 ps-3">
							<a href="post.php?action=view_post&post_id=<?php echo $latest_post['post_id']; ?>" style="text-decoration:none">
							<p class="card-title" style="color: black;"><b><?php echo $latest_post['post_title'];?></b></p>
								<p class="card-text" ><?php echo $latest_post['post_summary'];?></p>
							</a>
							<div class="card-body">
								
								<!-- <p class="card-text"><small class="text-body-secondary">Last updated updated_at</small></p> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			



			
		<div class="row container-fluid mt-5">
			<div class="col-4"></div>
			<div class="col-4 text-center">
				<a href="blog.php?action=show_blog&blog_id=1" type="button" onclick="" class="btn btn-danger">Read More Posts</a>
			</div>
			<div class="col-4"></div>
		</div>
</div> 
									
<!-- end BACHELORS, MASTERS, PHD SCHOLARSHIPS -->




