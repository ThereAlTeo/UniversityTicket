          <!-- MAIN SECTION-->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <div class="row bgLoginImage">
                            <div class="col-md-5 col-lg-6 col-xl-7 d-none d-md-block "></div>
                            <div class="col-md-7 col-lg-6 col-xl-5 bg-light">
                                <div class="p-5">
                                    <form class="py-md-5 text-ticketBlue needs-validation formInvalidFB" action="<?php echo $templateParams["action"].".php"; ?>" method="POST" id="loginForm" novalidate="">
                                         <h3 class="text-center">Login</h3>
                                         <hr class="mb-3">
                                         <div class="form-group">
                                              <label for="username" class="">Username</label><br>
                                              <input type="email" id="loginEmail" class="form-control formControlUser" placeholder="Inserisci E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="La mail deve rispettare le convenzioni internazionali" required/>
                                              <div class="invalid-feedback"></div>
                                         </div>
                                         <div class="form-group">
                                              <label for="password" class="">Password</label><br>
                                              <input type="password" id="loginPassword" class="form-control formControlUser" placeholder="Inserisci Password" pattern=".{1,}" title="La password deve essere presente" required/>
                                              <div class="invalid-feedback"></div>
                                         </div>
                                         <button class="btn btn-ticketBlue formBtnUser btn-block my-4" type="submit" id="login">Sign in</button>
                                         <hr class="my-3">
                                         <div class="text-center links">
                                              <p>Non hai ancora un account?<a href="registerAccount.php"> Registrati</a></p>
                                         </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- MAIN SECTION-->
