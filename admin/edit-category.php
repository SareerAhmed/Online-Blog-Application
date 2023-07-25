<?php 
	require_once '../connection/connection.php';
	require_once 'session.php';
	date_default_timezone_set("asia/karachi");
	$timestamp = time();

	$time = date("Y-m-d H:i:s");
// print_r($_REQUEST);  

        $query_category_data = "SELECT * FROM category";
        $res_of_category_data = mysqli_query($connection, $query_category_data);
                                if($res_of_category_data->num_rows>0){
                                    $category_data = mysqli_fetch_assoc($res_of_category_data);
                                    // echo "<pre>";
                                      print_r($category_data);
                                    // echo "</pre>";
                                      extract($category_data);
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


	</style>
<body>
	<!-- start of nav -->
					<div class="col-12 sticky-top" id="navbar">
	      			<?php include_once("navbar.php");  ?>
					</div>
	      			<!-- end of nav <-->

	      		<div class="row">
					   	<div class="col-3" style="background-color: #B92533; ">
					   		<div class="col-lg-1">
						 		<?php include_once("sidebar/index.php"); ?>
						 	</div>
					   	</div>
					   	<!-- start all content -->
							<div class="col-lg-9">
									<!-- start content -->
									<div class="container">
											
										<h2 class="text-center mt-2" style="color: #B92533;">Edit Category </h2>
							<form action="category-process.php" method="POST"  enctype="multipart/form-data">
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
										<td>
											<?php if (isset($_REQUEST['category_id'])) { ?>
												<input type="hidden" name="category_id" value="<?php echo $_REQUEST['category_id'] ?>">
											<input type="hidden" name="page" value="edit-category.php">
										<?php	} ?>
											
										</td>
									</tr>

	      							<tr>
										<td><label>Title</label></td>
										<td> <input type="text" class="form-control w-80" name="category_title" value="<?php echo $category_title ?>"></td>
									</tr>
									<tr>
										<td><label>Category Description</label></td>
										<td> <textarea class="form-control w-80" cols="80" rows="10" name="category_description"  ><?php echo $category_description ?></textarea>
										</td>	
									</tr>
									<tr>
									<tr>
										<td style="padding-right: 50px;">Category Status</td>
										<td>
											<?php  
											 if ($category_status=="Active") {
												$active_status="checked";
												$inactive_status="unchecked";
											}else{
												$active_status="unchecked";
												$inactive_status="checked";
											}  
											?>
											<input type="radio" name="category_status" value="Active" required <?php echo $active_status; ?> > 	Active:
											<input type="radio" name="category_status" value="InActive" required <?php echo $inactive_status; ?>>  InActive: 
											 
										</td>
									</tr>	
										<td></td>
										<td>
											<div>
											<a><input type="submit" class="btn btn-danger w-100 " style="margin-top:2%;" name="edit_category" value="Edit Category " /></a> 
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