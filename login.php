<?php  
	

	require_once 'connection/connection.php';
	date_default_timezone_set("asia/karachi");
	$timestamp = time();
		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SA Scholarship</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		function register_form(){
        //+92300 123567
			// alert("ok");
		var alpha_pattern = /^[A-Z]{1}[a-z]{2,}$/;
		var email_pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var email = document.getElementById("email").value;

		var first_password = document.getElementById("first_password").value;

		console.log(first_password);


		var flag = true;

		

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

		if (first_password == "") {
            flag = false;
            document.getElementById("first_password_msg").innerHTML = "Please Enter Password";
		}else{
			document.getElementById("first_password_msg").innerHTML = "";
		}

	
          if (flag) {
          	return true;
          }else{
			return false;

          }

		}
	</script>
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
	
</head>
<body>
	<!-- start of nav -->
					<div class="col-12 sticky-top" id="navbar">
	      			<?php include_once("navbar.php");  ?>
					</div>
	<!-- end of nav <-->
		
	    <div class="row container-fluid">
			    <center>
					<h3 class="text-center mt-2" style="color: #B92533;">Login Form</h3><hr/>
					<fieldset>
						<form action="login-process.php" method="POST" enctype="multipart/form-data">
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
									<td> Email : <span>*</span></td>
									<td>
										<input type="text" name="email" id="email">
										<span id="email_msg"></span>
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
									<td></td>
									<td style="padding-top: 10px;">
										<input class="btn m-2" style="background-color:  #B92533; color: white" type="submit" name="login" value="Login" onclick="return register_form()">

										<a  href="forgot-password.php" class="btn m-2" style="background-color: #B92533; color: white" type="submit">Forgot Password?</a>
									</td>
								</tr>
							</table>
							
						</form>
					</fieldset>
				</center>
	    </div>


</body>
</html>
		<!-- Modal Contact Us Start-->
			<?php  
			include("contact-us-form.php"); 
			?>		
		<!-- Modal Contact US End -->	

