<?php  

require_once '../connection/connection.php';
require_once 'session.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();
$time = date("Y-m-d H:i:s"); 

	 	if (isset($_REQUEST['action']) && $_REQUEST['action']=="all_details") {
			$query_login_user = "SELECT * FROM USER WHERE user_id='".$_REQUEST['user_id']."'";
			$res_of_cheack_user = mysqli_query($connection, $query_login_user);
					if($res_of_cheack_user->num_rows>0){
					   	
					   	$user_data = mysqli_fetch_assoc($res_of_cheack_user);
					   	extract($user_data);
					   	$location ="modify-user.php";
					}   
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

<div class="container row">
	<div class="col-3" style="background-color: #B92533; ">
		<div class="col-lg-1">
			<?php include_once("sidebar/index.php"); ?>
		</div>
	</div>
	<!-- start all content -->
	<div class="container col-lg-9">
		<!-- start of col-10 -->
		<div class="col-12 mt-1">
			<div class="row container-fluid">
			<center>
				<h2 class="text-center " style="color: #B92533;">View User Data</h2>
				<!-- <h3>Update Data</h3><hr/> --><hr>
				<fieldset>
					<!-- <legend>Update here</legend> -->
					<form action="../update_process-admin.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="location" value="<?php echo $location; ?>">
						<?php 
						if (isset($_REQUEST['user_id'])) { ?>
							<input type="hidden" name="user_id" value="<?php echo $_REQUEST['user_id']; ?>"> 
						<?php } ?>
						<table>
							<input type="hidden" name="img_path" value="<?php echo $user_image ?>">
							<img style="width: 180px; border-radius: 20%; padding-bottom: 10px;" src="<?php echo "../".$user_image ?>">
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
								<td> First Name : </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $first_name ?>" readonly><span id="first_name_msg"></span>
								</td>
								<td>&nbsp&nbsp&nbsp&nbsp</td>
								<td> Last Name : </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $last_name ?>" readonly>
									<span id="last_name_msg"></span>
								</td>
							</tr>
							<tr>
								<td> Email : </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $email ?>" readonly><span id="first_name_msg"></span>
								</td>
								<td>&nbsp&nbsp&nbsp&nbsp</td>
								<td> Status : </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $is_active ?>" readonly>
									<span id="last_name_msg"></span>
								</td>
							</tr>
							<tr>
								<td> Gender : </td>
								<td>
									<?php
									if ($gender=="Male") {
										$male ="checked";
										$female ="unchecked";
									}
									if ($gender=="Female") {
										$male ="unchecked";
										$female ="checked";
									}
									?>
									<input class="form-control" type="text" placeholder="<?php echo $gender ?>" readonly>
									<span id="gender_msg"></span>
								</td>
								<td>&nbsp&nbsp&nbsp&nbsp</td>
								<td>Date Of Birth : </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $date_of_birth ?>" readonly>
									<span id="date_of_birth_msg"></span>
								</td>
							</tr>
							<tr>
								<td> Address : </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $address ?>" readonly><span id="address_msg"></span>
								</td>
								<td>&nbsp&nbsp&nbsp&nbsp</td>
								<td> Role Type : </td>
								<td>
									<?php if ($role_id=="1") {
												$roll_is ="Admin";
											}else{
												$roll_is ="User";
											}
										 ?>
									<input class="form-control" type="text" placeholder="<?php echo $roll_is ?>" readonly>
									<span id="role_id_msg"></span>
								</td>
							</tr>
							<tr>
								<td> Account Created: </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$created_at")); ?>" readonly><span id="first_name_msg"></span>
								</td>
								<td>&nbsp&nbsp&nbsp&nbsp</td>
								<td>  Account Updated: </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime("$updated_at")); ?>" readonly>
									<span id="last_name_msg"></span>
								</td>
							</tr>
						</table>
					</form>
				</fieldset>
				</center>
			</div>
		</div>
	</div>
</div>
<!-- end all content -->
</div>

	      				

</body>
</html>

