<?php 
require_once 'session.php';
$query_all_blogs = "SELECT * FROM blog WHERE blog_status='Active' AND user_id='{$login_user_data['user_id']}'";
$res_of_all_blogs = mysqli_query($connection, $query_all_blogs);
$location ="add-post.php";
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
			<form action="post-process.php" method="POST"  enctype="multipart/form-data">
		<input type="hidden" name="location" value="<?php echo $location; ?>">
			<h2 class="text-center mt-2" style="color: #B92533;">Add Post</h2>
			<center>
			<table>
				<tr>
					<?php if (isset($_REQUEST['message'])) {
						$bg_color = $_REQUEST['color'];
						echo "<ul>";
						echo "<h2 style='color:".$bg_color."'>";
						echo $_REQUEST['message'];
						echo "</h2>";
						echo "</ul>";
					} ?>
				</tr>
			<tr>
				<td><label>Blog Name</label></td>
				<td>
					<select name="blog_id_to_post" id="blog_id_to_post">
						<option value="not_select">Select Blog</option>
						<?php while ($all_blogs = mysqli_fetch_assoc($res_of_all_blogs)) { ?>
							<option value="<?php echo $all_blogs['blog_id'] ?>"> <?php echo ($all_blogs['blog_title']); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
			<tr>
				<td><label>Category</label></td>
				<td>
					<select name="category_id_to_post" id="category_id_to_post">
					<option value="not_select">Select Category</option>	
                <?php 
                $query_all_category ="SELECT * FROM category WHERE category_status='Active'";
                $result_all_category = mysqli_query($connection,$query_all_category); 
                while ($all_category = mysqli_fetch_assoc($result_all_category)) { ?>
				<option value="<?php echo $all_category['category_id']; ?>"> <?php echo ($all_category['category_title']); ?></option>
						<?php } ?>
                } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="padding-right: 50px;">Post Status</td>
				<td>
					<input type="radio" name="post_status" value="Active" required> 	Active &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="post_status" value="InActive" required> InActive 
					 
				</td>
			</tr>
			<tr>
				<td style="padding-right: 50px;">Comment Allowd</td>
				<td>
					<input type="radio" name="is_comment_allowed" value="1" required> 	Yes
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="is_comment_allowed" value="0" required>  NO 
					 
				</td>
			</tr>
			<tr>
				<td> <label for="post_attachment">Do you have Post Attachments?:</label> </td>
				<td>
					<!-- <input type="number" name="is_attachments_number" id="attachments_number"> -->
					<input type="radio" name="is_attachments_number" value="1" required> 	Yes
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="is_attachments_number" value="0" required>  NO 
				</td>
			</tr>
			<tr>
				<td> <label for="post_attachment">if yes Write the Post Attachment Number:</label> </td>
				<td>
					<input type="number" name="attachments_number" id="attachments_number">
				</td>
			</tr>
			<tr>
				<td><label>Title</label></td>
				<td><input type="text" class="form-control w-10" name="post_title"></td>
			</tr>
			<tr>
				<td><label>Post Summary</label></td>
				<td> <textarea class="form-control w-100"  rows="1" name="post_summary"></textarea>
				</td>	
			</tr>
			<tr>
				<td><label>Post Description</label></td>
				<td> <textarea class="form-control w-100" cols="1" rows="1" name="post_description" id="mytextarea"></textarea>
				</td>	
			</tr>
			<tr>
				<td> <label for="post_attachment">Post Thumbnail:</label> </td>
				<td>
					<input type="file" class="form-control w-100" id="post_attachment" name="post_attachment">
				</td>
			</tr>

			
			<tr>
				<td></td>
				<td>
					<div>
						<a><input type="submit" class="btn btn-danger w-100 " style="margin-top:2%;" name="add_post" value="Add Post" /></a> 
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
