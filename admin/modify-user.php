<?php  

require_once '../connection/connection.php';
require_once 'session.php';
date_default_timezone_set("asia/karachi");
$timestamp = time();
$time = date("Y-m-d H:i:s"); 

	 	if (isset($_REQUEST['action']) && $_REQUEST['action']=="update_account") {
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
	<script type="text/javascript">
		function update_form(){
        //+92300 123567
			// alert("ok");
		var alpha_pattern = /^[A-Z]{1}[a-z]{2,}$/;
		var email_pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var first_name = document.getElementById("first_name").value;
		var last_name = document.getElementById("last_name").value;
		var gender = null;
		var male = document.getElementById("gender_male");
		var female = document.getElementById("gender_female");
		var date_of_birth = document.getElementById("date_of_birth").value;
		var address = document.getElementById("address").value;
		var role_id = document.getElementById("role_id").value;


		if (male.checked) {
			gender = male.value;
		}else if (female.checked) {
			gender = female.value;
		}

		var flag = true;

		if (first_name == "") {
            flag = false;
            document.getElementById("first_name_msg").innerHTML = "Please Enter First Name !...";
		}else{
			document.getElementById("first_name_msg").innerHTML = "";

             if (alpha_pattern.test(first_name) == false) {
             	flag = false;
            document.getElementById("first_name_msg").innerHTML = " First Name must be like eg: Sherry";
             }  
		}

		if (last_name == "") {
            flag = false;
            document.getElementById("last_name_msg").innerHTML = "Please Enter Last Name !...";
		}else{
			document.getElementById("last_name_msg").innerHTML = "";

             if (alpha_pattern.test(last_name) == false) {
             	flag = false;
            document.getElementById("last_name_msg").innerHTML = " Last Name must be like eg: Wilson";
             }  
		}

		if (!gender) {

			flag = false;
            document.getElementById("gender_msg").innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Please Select Gender !...";
		}else{
			document.getElementById("gender_msg").innerHTML = "";
		}

		if (!role_id) {

			flag = false;
            document.getElementById("role_id_msg").innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Please Select Role Type !...";
		}else{
			document.getElementById("role_id_msg").innerHTML = "";
		}

		if (date_of_birth == "") {
            flag = false;
            document.getElementById("date_of_birth_msg").innerHTML = "Please Select Your Date Of Birth !...";
		}else{
			document.getElementById("date_of_birth_msg").innerHTML = ""; 
		}

		if (address == "") {
            flag = false;
            document.getElementById("address_msg").innerHTML = "Please Enter Your Address !...";
		}else{
			document.getElementById("address_msg").innerHTML = ""; 
		}



	
          if (flag) {
          	return true;
          }else{
			return false;

          }

		}
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
				<div class="container col-lg-9">

				</center>

					<div class="col-1"> </div>
					<!-- start of col-10 -->
						<div class="col-10 mt-2">
	      						<div class="row container-fluid">
			    <center>
				<h2 class="text-center " style="color: #B92533;">Update User</h2><center>
					<!-- <h3>Update Data</h3><hr/> -->
					<hr>
					<fieldset>
						<!-- <legend>Update here</legend> -->
						<form action="../update_process-admin.php" method="POST" enctype="multipart/form-data">

							<input type="hidden" name="location" value="<?php echo $location; ?>">
							<?php 
								if (isset($_REQUEST['user_id'])) { ?>
									<input type="hidden" name="user_id" value="<?php echo $_REQUEST['user_id']; ?>"> 
								<?php }

							 ?>
							
							<table>
								<input type="hidden" name="img_path" value="<?php echo $user_image ?>">
								<center>
								<img   style="width: 180px; border-radius: 20%; padding-bottom: 10px;" src="<?php echo "../".$user_image ?>">
								</center>
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
										<input type="text" name="first_name" id="first_name" value="<?php echo $first_name ?>" >
										<span id="first_name_msg"></span>
									</td>
								</tr>
								<tr>
									<td> Last Name : </td>
									<td>
										<input type="text" name="last_name" id="last_name" value="<?php echo $last_name ?>" >
										<span id="last_name_msg"></span>
									</td>
								</tr>
								<tr>
									<td> Gender : </td>
									<td>
										<?php if ($gender=="Male") {
												$male ="checked";
												$female ="unchecked";
											}
											if ($gender=="Female") {
												$male ="unchecked";
												$female ="checked";
											}
										 ?>
										Male: <input type="radio" name="gender" id="gender_male" <?php echo $male?> checked value="Male">
										Female: <input type="radio" name="gender" id="gender_female"  <?php echo $female?> value="Female">
										<span id="gender_msg"></span>
									</td>
								</tr>
								<tr>
									<td> Date Of Birth : </td>
									<td>
										<input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo $date_of_birth ?>">
										<span id="date_of_birth_msg"></span>
									</td>
								</tr>

								<tr>
									<td> Address : </td>
									<td>
										<textarea name="address" id="address" rows="1"><?php echo $address ?></textarea>
										<span id="address_msg"></span>
									</td>
								</tr>

								<tr>
									<td> Profile Picture : </td>
									<td>
										<input type="file" name="new_profile_pic"/>
										<span id="new_profile_pic">  </span>	
									</td>
								</tr>
								<tr>
									<td> Role Type : </td>
									<td>
										<?php if ($role_id=="1") {
												$admin ="checked";
												$user ="unchecked";
											}else{
												$admin ="unchecked";
												$user ="checked";
											}
										 ?>
										Admin: <input type="radio" name="role_id" id="role_id" <?php echo $admin?> value="1">
										User: <input type="radio" name="role_id" id="role_id" <?php echo $user?> value="2">
										<span id="role_id_msg"></span>
									</td>
								</tr>

								
								<tr >
									<td></td>
									<td style="padding-top: 10px; " >
										<input style="background-color:#B92533" type="submit" name="update" value="update" onclick="return update_form()">
									</td>
								</tr>
							</table>
							
						</form>
					</fieldset>
				</center>
	    </div>

	      					</div>
						<div class="col-1">
							
						</div>
					</div>
				</div>
			<!-- end all content -->
		</div>

	      				

</body>
</html>

