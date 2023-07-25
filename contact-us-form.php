<!-- Modal Contact Us Start-->
<form action="contact-us.php" method="POST">
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h1 class="modal-title fs-5" id="staticBackdropLabel">Message Here</h1>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      	<?php 
			      		if (!isset($_SESSION['session_user_id'])) {?>
			      		<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Name</label>
					  <input type="text" class="form-control" id="user_name" name="user_name">
					</div>
			        <div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Email</label>
					  <input type="email" class="form-control" id="user_email" name="user_email">
					</div>
			      		<?php }


			      	 ?>
			        
					<div class="mb-3">
					  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
					  <textarea class="form-control" name="feedback" id="feedback" rows="3"></textarea>
					</div>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" name="feedback_send" value="feedback_send" class="btn btn-primary">Send Message</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
		<!-- Modal Contact US End -->	