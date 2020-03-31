		<!-- MAIN SECTION-->
		<div class="row justify-content-center">
            <div class="col-12">
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <div class="row bgLoginImage">
							<div class="col-md-6 bg-light">
                                <div class="p-5">
									<form class="text-center py-md-5 text-ticketBlue needs-validation formInvalidFB" id="registrationForm" action="" method="POST" novalidate="">
									    <h3 class="text-center">Registrazione</h3>
									    <hr class="mb-3">
									    <div class="row text-left">
									        <div class="col-md-6">
												<div class="form-group">
													<input class="form-control formControlUser" id="firstname" type="text" name="firstname" placeholder="Inserisci nome" required pattern=".{2,}" title="Nome di almeno 2 caratteri">
													<div class="invalid-feedback"></div>
												</div>
									        </div>
									        <div class="col-md-6">
									            <div class="form-group">
									                <input class="form-control formControlUser" id="lastname"  type="text" name="lastname" placeholder="Inserisci cognome" required pattern=".{2,}" title="Cognome di almeno 2 caratteri">
													<div class="invalid-feedback"></div>
									            </div>
									        </div>
									    </div>
									    <div class="row text-left">
									        <div class="col-md-6">
									            <div class="form-group">
									                 <input class="form-control formControlUser" id="CF" type="text" name="CF" placeholder="Inserisci Codice Fiscale" pattern="[A-Za-z0-9]{10,}" title="Codice fiscale consente solo caratteri alfanumerici e lunghezza minima 10">
													 <div class="invalid-feedback"></div>
												</div>
									        </div>
									        <div class="col-md-6">
									            <div class="form-group">
													<div class="input-group date" id="birthDatePicker" data-target-input="nearest">
				                                         <input type="text" class="form-control datetimepicker-input formControlUser"  placeholder="Inserisci data di Nascita" data-target="#birthDatePicker"/>
				                                          <div class="input-group-append" data-target="#birthDatePicker" data-toggle="datetimepicker">
				                                              <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
				                                          </div>
				                                    </div>
									            </div>
									        </div>
									    </div>
									    <div class="row text-left">
									        <div class="col-md-6">
									            <div class="form-group">
									                <input class="form-control formControlUser" id="email"  type="email" name="email" placeholder="Inserisci E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="La mail deve rispettare le convenzioni internazionali">
													<div class="invalid-feedback"></div>
												</div>
									        </div>
									        <div class="col-md-6 mb-3 text-uppercase">
									            <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
									                <label class="btn btn-primary formBtnUser active">
									                    <input type="radio" name="userType" id="user" value="User" autocomplete="off" checked>User
									                </label>
									                <label class="btn btn-primary formBtnUser">
									                    <input type="radio" name="userType" id="manager" value="Manager" autocomplete="off">Manager
									                </label>
									            </div>
									        </div>
									    </div>
									    <div class="row text-left">
									        <div class="col-md-6">
									            <div class="form-group">
									                <input type="password" name="password" id="password" class="form-control formControlUser" placeholder="Inserisci Password" required pattern=".{6,}" title="La password deve contenere almeno 7 caratteri per motivi di sicurezza">
													<div class="invalid-feedback"></div>
												</div>
									        </div>
									        <div class="col-md-6">
									            <div class="form-group">
									                <input type="password" name="passwordconfirmation" id="passwordconfirmation" class="form-control formControlUser" placeholder="Conferma Password" required title="Le password devo coincidere">
													<div class="invalid-feedback"></div>
												</div>
									        </div>
									    </div>
									    <button class="btn btn-ticketBlue formBtnUser btn-block my-4" type="submit" id="registration">Sign up</button>
									    <hr class="my-3">
									    <div class="links mt-3">
									        <p>Hai già un account?<a href="login.php"> Accedi</a> </p>
									    </div>
									</form>
                                </div>
                            </div>
                            <div class="col-md-6 d-none d-md-block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- MAIN SECTION-->
