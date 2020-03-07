<div class="modal fade" id="<?php echo $templateParams["modal"] ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $templateParams["modal"]?>Label" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
               <div class="modal-body">
               <?php
               switch ($templateParams["modal"]) {
                   case "addArtist":
                   ?>
                    <form role="form" action="" method="post" class="f1 text-center">
                         <h3>Register To Our App</h3>
                         <p>Fill in the form to get instant access</p>
                         <div class="f1-steps">
                              <div class="f1-progress">
                                   <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                              </div>
                              <div class="d-flex justify-content-around">
                                   <div class="f1-step text-center ">
                                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                        <p>about</p>
                                   </div>
                                   <div class="f1-step text-center active">
                                        <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                        <p>account</p>
                                   </div>
                                   <div class="f1-step text-center">
                                        <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                                        <p>social</p>
                                   </div>
                              </div>
                         </div>
                         <fieldset>
                              <h4 class="text-left">Tell us who you are:</h4>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-first-name">First name</label>
                                   <input type="text" name="f1-first-name" placeholder="First name..." class="f1-first-name form-control" id="f1-first-name">
                              </div>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-last-name">Last name</label>
                                   <input type="text" name="f1-last-name" placeholder="Last name..." class="f1-last-name form-control" id="f1-last-name">
                              </div>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-about-yourself">About yourself</label>
                                   <textarea name="f1-about-yourself" placeholder="About yourself..." class="f1-about-yourself form-control" id="f1-about-yourself"></textarea>
                              </div>
                              <div class="f1-buttons text-right">
                                   <button type="button" class="btn btn-next">Next</button>
                              </div>
                         </fieldset>
                         <fieldset>
                              <h4 class="text-left">Set up your account:</h4>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-email">Email</label>
                                   <input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control" id="f1-email">
                              </div>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-password">Password</label>
                                   <input type="password" name="f1-password" placeholder="Password..." class="f1-password form-control" id="f1-password">
                              </div>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                   <input type="password" name="f1-repeat-password" placeholder="Repeat password..." class="f1-repeat-password form-control" id="f1-repeat-password">
                              </div>
                              <div class="f1-buttons text-right">
                                   <button type="button" class="btn btn-previous">Previous</button>
                                   <button type="button" class="btn btn-next">Next</button>
                              </div>
                         </fieldset>
                         <fieldset>
                              <h4 class="text-left">Social media profiles:</h4>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-facebook">Facebook</label>
                                   <input type="text" name="f1-facebook" placeholder="Facebook..." class="f1-facebook form-control" id="f1-facebook">
                              </div>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-twitter">Twitter</label>
                                   <input type="text" name="f1-twitter" placeholder="Twitter..." class="f1-twitter form-control" id="f1-twitter">
                              </div>
                              <div class="form-group">
                                   <label class="sr-only" for="f1-google-plus">Google plus</label>
                                   <input type="text" name="f1-google-plus" placeholder="Google plus..." class="f1-google-plus form-control" id="f1-google-plus">
                              </div>
                              <div class="f1-buttons text-right">
                                   <button type="button" class="btn btn-previous">Previous</button>
                                   <button type="submit" class="btn btn-submit">Submit</button>
                              </div>
                         </fieldset>
                    </form>
               <?php
                  break;
              default:
              ?>
              <div class="">
              </div>
               <?php
          }
          ?>
               </div>
          </div>
     </div>
</div>
