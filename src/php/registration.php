		<!-- MAIN SECTION-->
		<div class="col-12 col-sm-6 offset-sm-3 mt-1 dangerRegistration">
		</div>
		<div class="col-sm-10 col-lg-7 m-auto">
			<div class="card my-4">
				<form class="text-center px-5 py-5 pb-3" id="registrationForm" action="" method="POST">
					<p class="h1 mb-4">Registrazione</p>
					<hr class="mb-3">
					<div class="row mb-2">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input class="form-control" id="firstname" type="text" name="firstname" placeholder="Inserisci nome" required pattern=".{2,}" title="Nome di almeno 2 caratteri">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input class="form-control" id="lastname"  type="text" name="lastname" placeholder="Inserisci cognome" required pattern=".{2,}" title="Cognome di almeno 2 caratteri">
							</div>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input class="form-control" id="email"  type="email" name="email" placeholder="Inserisci E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
							</div>
						</div>
						<div class="col-12 col-sm-6 ">
							<div class="btn-group btn-group-toggle float-none float-sm-left" data-toggle="buttons">
								<label class="btn btn-primary active">
									<input type="radio" name="userType" id="user" value="User" autocomplete="off" checked>User
								</label>
								<label class="btn btn-primary">
									<input type="radio" name="userType" id="manager" value="Manager" autocomplete="off">Manager
								</label>
								<label class="btn btn-primary">
									<input type="radio" name="userType" id="admin" value="Admin" autocomplete="off">Admin
								</label>
							</div>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Inserisci Password" required pattern=".{6,}" title="La password deve contenere almeno 7 caratteri per motivi di sicurezza">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<input type="password" name="passwordconfirmation" id="passwordconfirmation" class="form-control" placeholder="Conferma Password" required>
							</div>
						</div>
					</div>
					<button class="btn btn-ticketBlue" type="submit" id="pippo">Sign up</button>
					<div class="d-flex justify-content-center links mt-3">
						<p>Hai già un account?<a href="login.php"> Accedi</a> </p>
					</div>
				</form>
			</div>
		</div>
		<!-- MAIN SECTION-->
