<!-- start all content -->
	<div class="col-lg-9">
		<!-- start content -->
		<div class="row container-fluid">
			<form action="post-process.php" method="POST"  enctype="multipart/form-data">
			<h2 class="text-center mt-2" style="color: #B92533;">Add Post</h2>
			<table>
			<tr>
				<td><label>Blog Name</label></td>
				<td>
					<select name="blogs_name" id="blogs_name">
						<option value="not_select">Select Blog</option>
						<?php while ($all_blogs = mysqli_fetch_assoc($res_of_all_blogs)) { ?>
							<option value="<?php echo $all_blogs['blog_id'] ?>"> <?php echo ($all_blogs['blog_title']); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Title</label></td>
				<td><input type="text" class="form-control w-80" name="post_title"></td>
			</tr>
			<tr>
				<td><label>Post Summary</label></td>
				<td> <textarea class="form-control w-80" cols="60" rows="1" name="post_summary"></textarea>
				</td>	
			</tr>
			<tr>
				<td><label>Post Description</label></td>
				<td> <textarea class="form-control w-80" cols="60" rows="8" name="post_description"></textarea>
				</td>	
			</tr>
			<tr>
				<td> <label for="post_attachment">Attachment:</label> </td>
				<td>
					<input type="file" class="form-control w-100" id="post_attachment" name="post_attachment">
				</td>
			</tr>
			<tr>
				<td>Comment Allowd</td>
				<td>
					<select name="is_comment_allowed" id="">
						<option value="not_select">Select</option>
						<option value="yes">Yes</option>
						<option value="no">NO</option>
					</select>
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
			</form>
		</div>
		<!-- end content -->
	</div>
	<!-- end all content -->