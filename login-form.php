<!-- Modal Login -->
			<div class="modal fade" id="staticBackdropLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h1 class="modal-title fs-5 p-3" id="staticBackdropLabel">Login Here</h1>
			        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#forgot_password" >Forgot Password</button>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      	<form class="row g-3 needs-validation" method="POST" action="login-process.php">
					  <div class="col-md-12 position-relative">
					    <label for="validationTooltipUsername" class="form-label">Email</label>
					    <div class="input-group has-validation">
					      <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
					      <input type="text" name="email" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
					      <div class="invalid-tooltip">
					        Please choose a unique and valid username.
					      </div>
					    </div>
					  </div>
					  <div class="col-md-12 position-relative">
					    <label for="validationTooltipPassword" class="form-label">Password</label>
					    <div class="input-group has-validation">
					      <input type="password" class="form-control" id="validationTooltipPassword" aria-describedby="validationTooltipUsernamePrepend" required>
					      <div class="invalid-tooltip">
					        Password Must 8 to 12 Character
					      </div>
					    </div>
					  </div>
					  <div class="col-12">
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button class="btn btn-primary" type="submit">Login Here</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
		<!-- Modal Login End -->