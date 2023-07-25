<?php 
require_once 'session.php';
$select_all_attachments="SELECT user.user_id, post.`post_id`, post.`post_title`, `post_atachment`.`post_atachment_id`, `post_atachment`.`post_attachment_title`,`post_atachment`.`post_attachment_path`,`post_atachment`.`is_active`,`post_atachment`.`updated_at`, `post_atachment`.`created_at` FROM `user`  INNER JOIN `blog` ON `user`.`user_id`=`blog`.`user_id` INNER JOIN `post` ON `post`.`blog_id`= `blog`.`blog_id` INNER JOIN `post_atachment` ON `post_atachment`.`post_id`=`post`.`post_id` WHERE `post_atachment`.`post_atachment_id`=".$_REQUEST['post_atachment_id']; 
     $result_all_attachments = mysqli_query($connection, $select_all_attachments);


   
$location ="add-post.php";
if (isset($_REQUEST['post_id'])) {
	$post_id=$_REQUEST['post_id'];
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
	 <script src="tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: ['advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview','anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen','insertdatetime', 'media', 'table', 'help', 'wordcount'], toolbar: 'undo redo | blocks | ' + 'bold italic backcolor | alignleft aligncenter ' + 'alignright alignjustify | bullist numlist outdent indent | ' + 'removeformat | help',
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
		td{
			padding-top: 10px;
		}
	</style>
<body>
<!-- start of nav -->
	<div class="col-12 sticky-top" id="navbar">
	     <?php include_once("navbar.php");  ?>
	</div>
<!-- end of nav <-->
<div class="container row">
	<div class="col-3" style="background-color: #B92533; ">
		<div class="col-lg-1">
			<?php include_once("sidebar/index.php"); ?>
		</div>
	</div>
	<!-- start all content -->
	<div class="col-lg-9">
		<!-- start content -->
		<div class="row container-fluid">
				<input type="hidden" name="location" value="<?php echo $location; ?>">
				<h2 class="text-center mt-2" style="color: #B92533;">Edit Post Attachments</h2>
				<center>
					<table>
						<tr>
							<?php if (isset($_REQUEST['message'])) {
								$bg_color = $_REQUEST['color'];
								echo "<ul>";
								echo "<h2 style='color:".$bg_color."'>";
								echo $_REQUEST['message'];
								echo "</h2>";
								echo "</ul>"; } ?>	
						</tr>
					</table>
					<center>
						<?php 
							 ?>
							<form action="post-process.php" method="POST"  enctype="multipart/form-data">
						<table>
							<?php
						$count=1;
						if ($result_all_attachments->num_rows>0) {
							$attachment_data = mysqli_fetch_assoc($result_all_attachments); 
							extract($attachment_data);
							/*echo "<pre>";
							print_r($attachment_data); 
							echo "<pre>";*/
							  ?>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><label>	Post Attachment Title</label></td>
							<td><input type="text" required value="<?php echo $post_attachment_title; ?>" class="form-control w-10" name="post_attachment_title<?php echo $count; ?>" ></td>
						</tr>
						<tr>
							<td>
								<label>Previous Attachment</label>
							</td>
							<td>
								<a href="../<?php echo $post_attachment_path; ?>" download><?php echo $post_attachment_title; ?></a>
							</td>
						</tr>
						<tr>

							<td> <label for="post_attachment">Post Attachment File New:</label> </td>
							<td> 
								<input type="file"  class="form-control w-100" id="post_attachment_path" name="post_attachment_path<?php echo $count; ?>">
							</td>

						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr> <?php
						$count++;
						}
                        ?>
						</table>
							<input type="hidden" name="post_atachment_id" value="<?php echo $_REQUEST['post_atachment_id']?>"> 
							<input type="hidden" name="post_id" value="<?php echo $_REQUEST['post_id']?>"> 
							<td>
								<div>
									<table>
										<tr>
											<td>
									<input type="submit" class="btn btn-danger w-100 " style="margin-top:2%;" name="modify_attachments" value="Modify Attachments">
												
											</td>
											<td>
												<td>
												 &nbsp&nbsp&nbsp&nbsp
											</td>
											<td>
												<a class="btn btn-danger w-100 " style="margin-top:2%;" href="view-all-posts-attachments.php?action=view_post&post_id=<?php echo $post_id?>">Cancel Attachments</a>
											</td>

										</tr>
									</table>
								</div>
							</td>
						</tr>	
					</table>
				</center>
			</form>
		</div>
		<!-- end content -->
	</div>
	<!-- end all content -->
</div>	

	      					

</body>
</html>
