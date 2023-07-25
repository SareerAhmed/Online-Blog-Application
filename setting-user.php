<?php 
require_once 'session.php';
$post_title_font_size=32;
$post_title_font_color="#000000";
$post_title_backgourd_color="#F8F9FA";
$post_summary_font_size=28;
$post_summary_font_color="#000000";
$post_summary_background_color="#F8F9FA";
$post_description_font_size=20;
$post_description_font_color="#000000";
$post_description_background_color="#F8F9FA";


$query_to_cheack_setiing_exist="SELECT * FROM setting WHERE user_id=".$login_user_data['user_id'];
$result_to_cheack_setiing_exist = mysqli_query($connection, $query_to_cheack_setiing_exist);
	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_title_font_size= $last_setting_is['setting_value'];
	}
	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_title_font_color =$last_setting_is['setting_value'];
	}
	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_title_backgourd_color= $last_setting_is['setting_value'];
	}


	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_summary_font_size= $last_setting_is['setting_value'];
	}
	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_summary_font_color =$last_setting_is['setting_value'];
	}
	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_summary_background_color= $last_setting_is['setting_value'];
	}

	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_description_font_size= $last_setting_is['setting_value'];
	}
	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_description_font_color =$last_setting_is['setting_value'];
	}
	if ($result_to_cheack_setiing_exist->num_rows>0) {
		$last_setting_is= mysqli_fetch_assoc($result_to_cheack_setiing_exist);
		$post_description_background_color= $last_setting_is['setting_value'];
	}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SA Scholarship</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
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
		p{
			color: black;
		}


	</style>
	
</head>
<body>
		<div class=" col-12 sticky-top" id="navbar">
			<?php include_once("navbar.php");  ?>
		</div>
		<center>
			<form action="setting-user-process.php" method="POST">
			<div class="container col-6">
			<h3 class="text-center mt-2" style="color: #B92533;">User Custom Setting</h3><hr/>
			<table class="table table-bordered">
				<tr>
					<?php if (isset($_REQUEST['msg'])) {
						$bg_color = $_REQUEST['color'];
						      echo "<ul>";
					echo "<h2 style='color:".$bg_color."'>";
						       echo $_REQUEST['msg'];
						      echo "</h2>";
						      echo "</ul>";
					} ?>
				</tr>
				<tr>
					<td><label>Post Title Font Size</label> </td>
  					<td><input type="number" name="post-title-font-size" value="<?php echo $post_title_font_size; ?>"> </td>
	  			</tr>
	  			<tr>
	  				<td>
	  					<label for="exampleColorInput" class="form-label">Post Title font Color: </label>
	  				</td>
	  					<td>
							<input type="color" class="form-control form-control-color" name="post-title-font-color" value="<?php echo $post_title_font_color; ?>" title="Choose your color">
	  				</td>
	  			</tr>
	  			<tr>
	  				<td>
	  					<label for="exampleColorInput" class="form-label">Post Title Background Color: </label>
	  				</td>
	  					<td>
							<input type="color" class="form-control form-control-color" name="post-title-background-color" value="<?php echo $post_title_backgourd_color; ?>" title="Choose your color">
	  				</td>
	  			</tr>
	  			<tr>
					<td><label>Post Summary Font Size</label> </td>
  					<td><input type="number" name="post-summary-font-size" value="<?php echo $post_summary_font_size; ?>"> </td>
	  			</tr>
	  			<tr>
	  				<td>
	  					<label for="exampleColorInput" class="form-label">Post Summary Font Color: </label>
	  				</td>
	  					<td>
							<input type="color" class="form-control form-control-color" name="post-summary-font-color" value="<?php echo $post_summary_font_color; ?>" title="Choose your color">
	  				</td>
	  			</tr>
	  			<tr>
	  				<td>
	  					<label for="exampleColorInput" class="form-label">Post Summary Background Color: </label>
	  				</td>
	  					<td>
							<input type="color" class="form-control form-control-color" name="post-summary-background-color" value="<?php echo $post_summary_background_color; ?>" title="Choose your color">
	  				</td>
	  			</tr>
	  			<tr>
					<td><label>Post Description Font Size</label> </td>
  					<td><input type="number" name="post-description-font-size" value="<?php echo $post_description_font_size; ?>"> </td>
	  			</tr>
	  			<tr>
	  				<td>
	  					<label for="exampleColorInput" class="form-label">Post Description Font Color: </label>
	  				</td>
	  					<td>
							<input type="color" class="form-control form-control-color" name="post-description-font-color" value="<?php echo $post_description_font_color; ?>" title="Choose your color">
	  				</td>
	  			</tr>

	  			<tr>
	  				<td>
	  					<label for="exampleColorInput" class="form-label">Post Description Background Color: </label>
	  				</td>
	  					<td>
							<input type="color" class="form-control form-control-color" name="post-description-background-color" value="<?php echo $post_description_background_color; ?>" title="Choose your color">
	  				</td>
	  			</tr>
	  			<tr>
	  				<td>
	  					
	  				</td>
	  			</tr>
	  		</table>
	  			<input class="btn m-2" style="background-color:  #B92533; color: white" type="submit" type="submit" name="set-color" value="Set Color">
	  			<input class="btn m-2" style="background-color:  #B92533; color: white" type="submit" type="submit" name="defualt-color" value="Defualt Color">
	  		</div>
	  		</form>
	  </center>
</body>
</html>