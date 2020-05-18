          <!-- Footer -->
          <?php if (isset($templateParams["templateType"]) && strcmp($templateParams["templateType"], "D") === 0): ?>
              <footer class="p-3 bg-white text-ticketBlue dashboardFooter">
          <?php else: ?>
              <footer class="p-3 bg-ticketBlue text-white footer">
          <?php endif; ?>
               <div class="row d-flex align-items-center">
                    <div class="col-md-4">
                         <p class="text-center text-md-left font-italic <?php if(isset($templateParams["templateType"]) && strcmp($templateParams["templateType"], "dashboard.php") === 0) echo " font-weight-bold"; ?>">
                              Universiticket S.r.l. - Sede: Via Cesare Pavese 50, 47521 Cesena(FC)
                         </p>
                  </div>
                  <div class="col-md-4">
                       <p class="text-center small font-italic <?php if(isset($templateParams["templateType"]) && strcmp($templateParams["templateType"], "dashboard.php") === 0) echo " font-weight-bold"; ?>">
                            © 2020 Copyright - Tutti i diritti riservati. </br>
                            <a href="./privacyPolicy.php" class="text-decoration-none text-warning">Informativa COOKIE</a>
                       </p>
                  </div>
                  <div class="col-md-4">
                       <ul class="list-unstyled list-inline text-center text-md-right">
                           <li class="list-inline-item">
                                <span class="fa-stack fa-lg">
                                     <a class="fab fa-facebook-f" href="https://www.facebook.com/"></a>
                                </span>
                           </li>
                           <li class="list-inline-item">
                                <span class="fa-stack fa-lg">
                                     <a class="fab fa-instagram" href="https://www.instagram.com/?hl=it"></a>
                                </span>
                           </li>
                           <li class="list-inline-item">
                                <span class="fa-stack fa-lg">
                                     <a class="fab fa-twitter" href="https://twitter.com/login?lang=it"></a>
                                </span>
                           </li>
                           <li class="list-inline-item">
                                <span class="fa-stack fa-lg">
                                     <a class="fab fa-google-plus-g" href="https://www.google.it/"></a>
                                </span>
                           </li>
                       </ul>
                  </div>
               </div>
          </footer>
          <!-- Footer -->
