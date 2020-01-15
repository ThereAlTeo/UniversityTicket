		<!-- MAIN SECTION-->
		<div class="col-12 col-sm-6 offset-sm-3 mt-1 dangerRegistration">
		</div>
		<div class="col-sm-10 col-lg-7 m-auto">
			<div class="card my-4">
				<form class="text-center px-5 py-5 pb-3" id="formValidation" action="" method="POST">
					<p class="h1 mb-4">Registration</p>
					<hr class="mb-3">
					<div class="row mb-2">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input class="form-control" id="firstname" type="text" name="firstname" placeholder="First Name" required>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input class="form-control" id="lastname"  type="text" name="lastname" placeholder="Last Name" required>
							</div>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input class="form-control" id="email"  type="email" name="email" placeholder="E-mail Address" required>
							</div>
						</div>
						<div class="col-12 col-sm-6 ">
							<div class="btn-group btn-group-toggle float-none float-sm-left" data-toggle="buttons">
								<label class="btn btn-primary active">
									<input type="radio" name="options" id="option1" autocomplete="off" checked>Utente
								</label>
								<label class="btn btn-primary">
									<input type="radio" name="options" id="option2" autocomplete="off">Promotore
								</label>
								<label class="btn btn-primary">
									<input type="radio" name="options" id="option3" autocomplete="off">Admin
								</label>
							</div>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input type="password" name="passwordconfirmation" id="passwordconfirmation" class="form-control" placeholder="Confirm Password" required>
							</div>
						</div>
					</div>
					<button class="btn btn-ticketBlue" type="submit" id="register">Sign Up</button>
					<div class="d-flex justify-content-center links mt-3">
						<p>Do you already have an account?<a href="login.php"> Sign-in</a> </p>
					</div>
				</form>
			</div>
		</div>
		<!-- MAIN SECTION-->
