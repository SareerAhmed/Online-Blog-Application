<?php 

$blog_id=4;
$query_exchange_program_post = "SELECT * FROM post WHERE blog_id=$blog_id AND post_status='Active' ORDER BY post_id DESC;";
$latest_post_object = mysqli_query($connection, $query_exchange_program_post);
if($latest_post_object->num_rows>3){ ?>                	
	<!-- start EXCHANGE PROGRAM -->
	<div class="container-fluid row" id="exchange_program">
		<div class="container-fluid mt-5">
			<?php $find_name_blog = "SELECT blog_title FROM blog WHERE blog_id=$blog_id";
				$result_name_blog = mysqli_query($connection, $find_name_blog);
				$blog_name_is = mysqli_fetch_assoc($result_name_blog);
			?>
			<h5 id="title_category_homepage" style=" text-align: left;"><?php echo  strtoupper($blog_name_is['blog_title']); ?></h5>
			<div class="container-fluid border border-danger" >
			</div>
		</div>
		<div class="container-fluid row mt-3">
			<?php  $latest_post= mysqli_fetch_assoc($latest_post_object); ?>
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
								<p class="card-title" style="color: black;"><b><?php echo $latest_post['post_title'];?></b>
								</p>
								<p class="card-text" ><?php echo $latest_post['post_summary'];?></p>
							</a>
							<div class="card-body">
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php  $latest_post= mysqli_fetch_assoc($latest_post_object); ?>
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
								<p class="card-title" style="color: black;"><b><?php echo $latest_post['post_title'];?></b>
								</p>
								<p class="card-text" ><?php echo $latest_post['post_summary'];?></p>
							</a>
							<div class="card-body">
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php  $latest_post= mysqli_fetch_assoc($latest_post_object); ?>
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
								<p class="card-title" style="color: black;"><b><?php echo $latest_post['post_title'];?></b>
								</p>
								<p class="card-text" ><?php echo $latest_post['post_summary'];?></p>
							</a>
							<div class="card-body">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row container-fluid mt-5">
			<div class="col-4"></div>
			<div class="col-4 text-center">
				<a href="blog.php?action=show_blog&blog_id=<?php echo $latest_post['blog_id'] ?>" type="button" onclick="" class="btn btn-danger">Read More Posts
				</a>
			</div>
			<div class="col-4"></div>
		</div>
	</div>  
	<!-- end EXCHANGE PROGRAM -->

<?php }?>