<?php  

require_once '../connection/connection.php';
require_once 'session.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();
$time = date("Y-m-d H:i:s"); 
extract($_REQUEST);

	 	if (isset($_REQUEST['action']) && $_REQUEST['action']=="feedback_details") {
			$query_feedback = "SELECT * FROM `user_feedback` WHERE `user_feedback`.`feedback_id`='{$_REQUEST['feedback_id']}'";
			$res_of_query_feedback = mysqli_query($connection, $query_feedback);
					if($res_of_query_feedback->num_rows>0){
					   	
					   	$feedback_data = mysqli_fetch_assoc($res_of_query_feedback);
					   	// var_dump($feedback_data);
					   	extract($feedback_data);
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
				<h3 class="text-center " style="color: #B92533;">View Feedback Data</h3>
				<fieldset>
						<table>
							<?php 
							$cheack_user= "SELECT * FROM user WHERE email=$user_email";
							$result_cheack_user= mysqli_query($connection, $cheack_user);
							//if ($result_cheack_user->num_rows>0) { 
							if ($result_cheack_user) { 
								$user_data = mysqli_fetch_assoc($result_cheack_user); 
								extract($user_data); ?>
								<img style="width: 150px; border-radius: 20%; padding-bottom: 10px;" src="<?php echo "../".$user_image ?>">
							<?php } else { ?>
								<img style="width: 150px; border-radius: 20%; padding-bottom: 10px;" src="../images/boy.jpg">

							<?php }
							?>
							<tr>
								<td style="padding-right: 50px">User Name</td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $user_name?>" readonly>
								</td>
								
							</tr>
							<tr>
								<td>User Email : </td>
								<td>
									<input class="form-control" type="text" placeholder="<?php echo $user_email ?>" readonly>
								</td>
							</tr>
							<tr>
								<td> Feedback : </td>
								<td>
									<textarea name="" id="" cols="90" rows="5" readonly><?php echo $feedback?></textarea>
									<span id="gender_msg"></span>
								</td>
							</tr>
							<tr>
								<td> Feedback Time : </td>
								<!-- <td>&nbsp&nbsp&nbsp&nbsp</td> -->

								<td>
									<input class="form-control" type="text" placeholder="<?php echo $time_new_design = date("j-M-Y g:i:s a",strtotime($feedback_data['updated_at'])); ?>" readonly><span id="address_msg"></span>
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

