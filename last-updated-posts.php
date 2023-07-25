<?php   
$query_all_post = "SELECT * FROM post WHERE post_status='Active' ORDER BY post_id DESC;";
$res_of_all_post = mysqli_query($connection, $query_all_post);
/*if($res_of_all_post->num_rows>0){

}*/

 ?>


	<div class="container-fluid row text-center">
			<div class="container-fluid mt-3">
				<h5 id="title_category_homepage" style=" text-align: left;">LATEST POST</h5>
				<div class="container-fluid border border-danger " ></div>
			</div>
		<?php 
		$new_post = mysqli_fetch_assoc($res_of_all_post);
		?>
			<div class="col-3  p-2">
				<div class="card shadow-lg  bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
			<?php 
			$new_post = mysqli_fetch_assoc($res_of_all_post);
			?>
			<div class="col-3  p-2">
				<div class="card shadow-lg  bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
			 <?php 
			   $new_post = mysqli_fetch_assoc($res_of_all_post);
			   ?>
			<div class="col-3  p-2">
				<div class="card shadow-lg   bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
			 <?php 
			   $new_post = mysqli_fetch_assoc($res_of_all_post);
			   ?>
			<div class="col-3  p-2">
				<div class="card shadow-lg  bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
	</div>
	<div class="container-fluid row  text-center">
		<?php 
		$new_post = mysqli_fetch_assoc($res_of_all_post);
		?>
		<div class="col-3  p-2">
				<div class="card shadow-lg  bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
			<?php 
			$new_post = mysqli_fetch_assoc($res_of_all_post);
			?>
			<div class="col-3  p-2">
				<div class="card shadow-lg  bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
			 <?php 
			   $new_post = mysqli_fetch_assoc($res_of_all_post);
			   ?>
			<div class="col-3  p-2">
				<div class="card shadow-lg   bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
			 <?php 
			   $new_post = mysqli_fetch_assoc($res_of_all_post);
			   ?>
			<div class="col-3  p-2">
				<div class="card shadow-lg  bg-body-tertiary rounded" style="width: 16rem; height: 270px;">
					<a href="post.php?action=view_post&post_id=<?php echo $new_post['post_id']; ?>" style="text-decoration:none">
						<img src="<?php echo $new_post['featured_image'];?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><b><?php echo $new_post['post_title'];?>
							</b></p>
						</div>
					</a>
				</div>
			</div>
	</div>
	




<!-- last updated post end -->