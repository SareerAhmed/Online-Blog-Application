<div class="container-fluid">
						    <h2 class="text-center" style="color: #B92533;">Add New Blog</h2>
						<!-- start content -->
						<div class="row container-fluid mt-3">
		      					<center>
		      						<form action="add-blog-process.php" method="POST"  enctype="multipart/form-data">
		      					<table>
									<hr>
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
											<td><label>Title</label></td>
											<td> <input type="text" class="form-control w-100" name="blog_title"></td>
										</tr>
										<tr>
											<td><label>Posts Per Blog</label></td>
											<td>
												<input type="number" class="form-control w-80" cols="100" rows="10" name="posts_per_blog" value="0">
											</td>	
										</tr>
										<tr>
											<td>
											<label for="blog_background_image">Blog Background Image:</label>
											</td>
											<td>
											  <input type="file" class="form-control w-100" name="blog_background_image">
											</td>
										</tr>
										<tr>
											<td></td>
											<td>
												<div>
												<a><input type="submit"  class="btn btn-danger w-100 " style="margin-top:10%;" name="add_blog" value="Add Blog" /></a> 
									    
											</div>
											</td>
										</tr>	
								</table>
							</form>
							</center>
								
						</div>
	      				<!-- end content -->
				</div>