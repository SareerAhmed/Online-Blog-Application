<?php 
require_once 'session.php';
$query_all_blogs = "SELECT * FROM blog WHERE blog_status='Active' AND user_id='{$login_user_data['user_id']}'";
$res_of_all_blogs = mysqli_query($connection, $query_all_blogs);
$location ="add-post.php";
$locat=$_REQUEST['location'];
$msg="done";
		//echo ("location:".$locat."?message=$msg&color=green&action=edit&post_id=".$_REQUEST['post_id']);

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
				<h2 class="text-center mt-2" style="color: #B92533;">Add Post Attachments</h2>
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
						<form form action="#" method="POST"  enctype="multipart/form-data">
							
						
						<tr>
							<td>
								<label><b>Please Confrim Number <br>of Attachments<b></label>
							</td>
							<td>
								<td><input type="number" class="form-control w-80" name="attachments_number"></td>
							</td>
							<td>
								<input type="submit" class="btn btn-danger w-100 " style="margin-top:2%;" name="add_post" value="Confrim" />
							</td>
						</tr>
					</table>
						</form>
						<?php 
							for ($i=1; $i <=$_REQUEST['attachments_number'] ; $i++) { ?>
							<form action="post-process.php" method="POST"  enctype="multipart/form-data">

						<table>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><label>	Post Attachment Title</label></td>
							<td><input type="text" required class="form-control w-10" name="post_attachment_title<?php echo $i; ?>"></td>
						</tr>
						<tr>

							<td> <label for="post_attachment">Post Attachment File:</label> </td>
							<td> 
								<input type="file" required class="form-control w-100" id="post_attachment_path" name="post_attachment_path<?php echo $i; ?>">
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
						</tr>


							<?php }
						 ?>
					 <input type="hidden" name="post_id" value="<?php echo $_REQUEST['post_id']?>"> 
								 <input type="hidden" name="location" value="<?php echo $_REQUEST['location']?>">
						<tr>
							<td> </td>
							<td>
								<div>
									<table>
										<tr>
											<td>
												<input type="submit" class="btn btn-danger w-100 " style="margin-top:2%;" name="add_attachments" value="Add Attachments">
											</td>
											<td>
												 &nbsp&nbsp&nbsp&nbsp
											</td>
											<td>
												<a class="btn btn-danger w-100 " style="margin-top:2%;" href="add-post.php?message=Post Added Succefully&color=green">Cancel Attachments</a>

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
