<?php require_once 'connection/connection.php'; ?>
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
		var email_pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		var email = document.getElementById("email").value;

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
					<h3 class="text-center mt-2" style="color: #B92533;">Forgot Password </h3><hr/>
					<fieldset>
						
					<form action="forgot-password-process.php" method="POST" enctype="multipart/form-data">
							<table>
								<input type="hidden" name="page" value="forgot-password.php">
								<tr>
									<?php if (isset($_REQUEST['message'])) {
										$bg_color = $_REQUEST['color'];
										      echo "<ul>";
									echo "<h3 style='color:".$bg_color."'>";
										       echo $_REQUEST['message'];
										      echo "</h3>";
										      echo "</ul>";
									} ?>
								</tr>
								<tr>
									<td> Email : <span>*</span></td>
									<td>
										<input type="email" name="email" id="email">
										<span id="email_msg"></span>
									</td>
								</tr>
								
								
								<tr>
									<td></td>
									<td style="padding-top: 10px;">
										<input class="btn m-2" style="background-color:  #B92533; color: white" type="submit" name="forgot_password" value="Forgot Password" onclick="return register_form()">
									</td>
								</tr>
							</table>
						</form>
					</fieldset>
				</center>
	    </div>


</body>
</html>