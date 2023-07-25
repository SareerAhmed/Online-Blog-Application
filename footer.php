<div class="row mt-5" style="background-color: #B92533; color: white;">
	<div class="col-lg-3 col-md-6 col-sm-12 text-center">
		<img src="images/logo.jpg"  class="p-5" style="width: 220px; border-radius: 50%;">
	</div>

	<div class="col-lg-3 col-md-6 col-sm-12 mt-5 text-center">
	
	
		<p>
			<a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Contact Us</a>
		</p>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12 my-5">
		<p class="text-left fw-bold" style="color: white;">
			SA Scholarships is the online educational platform for browsing Fully Funded Scholarships, Jobs, Internships, and Exchange Programs for Free. Get in touch with us in case of any information or Branding & Advertisement with us:
			Contact us: sareerrajper@gmail.com
		</p>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-12">
		<div class="row mt-3">
			<h4 class="text-center fw-bold">Recents Posts</h4>
			<?php 
			$recents_posts= "SELECT * FROM `post` WHERE post_status='Active'  ORDER BY post_id DESC LIMIT 0,6";
			$result_recents_posts= mysqli_query($connection, $recents_posts);
			if ($result_recents_posts->num_rows>0) {
				while ($post_data_recents= mysqli_fetch_assoc($result_recents_posts)) { ?>
					<div class="col-4">
						<a href="post.php?action=view_post&post_id=<?php echo $post_data_recents['post_id'] ?>" style="text-decoration:none">
							<img src="<?php echo $post_data_recents['featured_image'] ?>" class="img-fluid h-100 shadow rounded">
						</a>
					</div>


					<?php 
				}
			}

			?>
			
			
		</div>
		<div class="row mt-2">
			
		</div>
	</div>
</div>
<div class="row">
	<div class="col text-center text-white py-2 bg-secondary">
		<span class="fw-lighter">@Copyright <?php date_default_timezone_set("Asia/Karachi"); echo date("Y"); ?></span><span class="fw-bold"> | Developed By: Sareer Ahmed </span>
	</div>
</div>