<?php 
	require_once 'session.php';
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
		function register_form(){
        //+92300 123567
			// alert("ok");
		var alpha_pattern = /^[A-Z]{1}[a-z]{2,}$/;
		var email_pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var password_pattrn = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
		var first_name = document.getElementById("first_name").value;
		var last_name = document.getElementById("last_name").value;
		var email = document.getElementById("email").value;
		var gender = null;
		var role_is =null;
		var male = document.getElementById("gender_male");
		var female = document.getElementById("gender_female");
		var first_password = document.getElementById("first_password").value;
		var confrim_password = document.getElementById("confrim_password").value;
		var date_of_birth = document.getElementById("date_of_birth").value;
		var address = document.getElementById("address").value;
		var admin = document.getElementById("admin");
		var user = document.getElementById("user");

		/*console.log(first_password);
		console.log(confrim_password);*/
		// console.log(admin.checked);
		// console.log(admin);
	

			 //alert(user.checked);

		if (male.checked) {
			gender = male.value;
			//alert(male.checked);
		}if (female.checked) {
			gender = female.value;
			// alert(female.checked);
		}
		if (admin.checked) {
			role_is = admin.value;
			//alert(male.checked);
		}
		if (user.checked) {
			role_is = user.value;
		}
		// console.log(role_is);

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

		if (email == "") {
            flag = false;
            document.getElementById("email_msg").innerHTML = "Please Enter Email !...";
		}else{
			document.getElementById("email_msg").innerHTML = "";

             if (email_pattern.test(email) == false) {
             	flag = false;
            document.getElementById("email_msg").innerHTML = " Email must be like eg: sareerrajper@gmail.com";
             }  
		}

		if (!gender) {

			flag = false;
            document.getElementById("gender_msg").innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Please Select Gender !...";
		}else{
			document.getElementById("gender_msg").innerHTML = "";
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
		if (!role_is) {

			flag = false;
            document.getElementById("role_type_msg").innerHTML = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Please Select Role !...";
		}else{
			document.getElementById("role_type_msg").innerHTML = "";
		}

		if (first_password == "") {
			flag = false;
            document.getElementById("first_password_msg").innerHTML = "Please Enter Password !...";
        }else{
			document.getElementById("first_password_msg").innerHTML = "";
			if (password_pattrn.test(first_password) == false) {
				flag = false;
             	document.getElementById("first_password_msg").innerHTML = "Password must be like eg: Hidayaa@2";
             }
         }
         if (confrim_password != first_password) {
         	flag = false;
         	document.getElementById("confrim_password_msg").innerHTML = "Your Password is Not match";
         }else{
         	document.getElementById("confrim_password_msg").innerHTML = "";
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
			    <center>
					<h3>Add User</h3><hr/>
					<fieldset>
						<legend>Register here</legend>
						<form action="registraion-process.php" method="POST" enctype="multipart/form-data">
							<table>
								<tr>
									<th>Marked (*) Fields are required !...</th>
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
										<tr>
									<td> Role : <span>*</span></td>
									<td>
										Admin: <input type="radio" name="role_type" id="admin" value="Admin">
										User: <input type="radio" name="role_type" id="user" value="User">
										<span id="role_type_msg"></span>
									</td>
								</tr>
									<td> First Name : <span>*</span></td>
									<td>
										<input type="text" name="first_name" id="first_name">
										<span id="first_name_msg"></span>
									</td>
								</tr>
								<tr>
									<td> Last Name : <span>*</span></td>
									<td>
										<input type="text" name="last_name" id="last_name">
										<span id="last_name_msg"></span>
									</td>
								</tr>
								<tr>
									<td> Email : <span>*</span></td>
									<td>
										<input type="text" name="email" id="email">
										<span id="email_msg"></span>
									</td>
								</tr>
								<tr>
									<td> Gender : <span>*</span></td>
									<td>
										Male: <input type="radio" name="gender" id="gender_male" value="Male">
										Female: <input type="radio" name="gender" id="gender_female" value="Female">
										<span id="gender_msg"></span>
									</td>
								</tr>
								<tr>
									<td> Date Of Birth : <span>*</span></td>
									<td>
										<input type="date" name="date_of_birth" id="date_of_birth">
										<span id="date_of_birth_msg"></span>
									</td>
								</tr>

								<tr>
									<td> Address : <span>*</span></td>
									<td>
										<textarea name="address" id="address" rows="1"></textarea>
										<span id="address_msg"></span>
									</td>
								</tr>

								<tr>
									<td> Profile Picture : <span>*</span></td>
									<td>
										<input type="file" name="profile_pic" id="profile_pic" required/>
										<span id="profile_pic_id"> </span>	
									</td>
								</tr>
	

								<tr>
									<td>Password : <span>*</span></td>
									<td>
									 <input type="password" name="first_password" id="first_password">
									   <span id="first_password_msg"></span>
									</td>
								</tr>
								<tr>
									<td>Confrim Password : <span>*</span></td>
									<td>
									 <input type="password" name="confrim_password" id="confrim_password">
									   <span id="confrim_password_msg"></span>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="register" value="Register" onclick="return register_form()">
									</td>
								</tr>
							</table>
							
						</form>
					</fieldset>
				</center>
	    </div>
	      				<!-- end content -->
				</div>
			 <!-- end all content -->
		</div>	

	      			


</body>
</html>