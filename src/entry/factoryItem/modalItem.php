<div class="modal fade" id="<?php echo $templateParams["modal"] ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $templateParams["modal"]?>Label" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
               <div class="modal-body">
                    <form action="" method="POST" class="text-center modalStyle" id="<?php echo $templateParams["modal"]?>Form">
               <?php
               switch ($templateParams["modal"]) {
                   case "addArtist":
                         $_GET["progressLineItems"] = array("Inserimento artista", "fas fa-info", "Info", "fas fa-wrench", "Carriera", "fas fa-audio-description", "Extra");
                         require ("modalProgressLine.php");
                   ?>
                         <div class="fieldSet">
                              <fieldset>
                                   <h5 class="text-left">Informazioni Personali</h5>
                                   <div class="row">
                                        <div class="col-6 form-group">
                                             <input type="text" placeholder="Inserisci Nome" class="form-control formControlUser" id="artistName" pattern=".{2,}" title="Campo di almeno 2 caratteri" required/>
                                             <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-6 form-group">
                                             <input type="text" placeholder="Inserisci Cognome" class="form-control formControlUser" id="artistCognome" required/>
                                             <div class="invalid-feedback"></div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-6 form-group">
                                             <input type="text" placeholder="Inserisci Codice Fiscale" class="form-control formControlUser" id="artistCF"/>
                                        </div>
                                        <div class="col-6 form-group">
                                             <div class="input-group date" id="birthDatePicker" data-target-input="nearest">
                                                  <input type="text" class="form-control datetimepicker-input formControlUser"  placeholder="Data di Nascita" data-target="#birthDatePicker"/>
                                                   <div class="input-group-append" data-target="#birthDatePicker" data-toggle="datetimepicker">
                                                       <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                                                   </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="text-right">
                                        <button type="button" class="btn btn-info btnNext">Next</button>
                                   </div>
                              </fieldset>
                              <fieldset>
                                   <h5 class="text-left">Biografia</h5>
                                   <div class="form-group">
                                       <textarea placeholder="Inserisci Biografia." class="form-control" id="artistBiografia" required></textarea>
                                   </div>
                                   <div class="f1-buttons text-right">
                                        <button type="button" class="btn btn-light btnPrevious">Previous</button>
                                        <button type="button" class="btn btn-info btnNext">Next</button>
                                   </div>
                              </fieldset>
                              <fieldset>
                                   <h5 class="text-left">Informazioni Professionali</h5>
                                   <div class="form-group">
                                        <div class="form-group">
                                             <input type="text" placeholder="Inserisci Nome D'arte" class="form-control formControlUser" id="artistArtName">
                                        </div>
                                   </div>
                                   <div class="f1-buttons text-right">
                                        <button type="button" class="btn btn-light btnPrevious">Previous</button>
                                        <button type="submit" class="btn btn-success btnSubmit">Submit</button>
                                   </div>
                              </fieldset>
                         </div>
               <?php
                  break;
             case "addEvent":
                  $_GET["progressLineItems"] = array("Inserimento Evento", "fas fa-info", "Info", "fas fa-map-marked-alt", "Location", "fas fa-audio-description", "Extra");
                  require ("modalProgressLine.php");
                  ?>
                  <div class="fieldSet">
                       <fieldset>
                            <h5 class="text-left">Informazioni Generali Evento</h5>
                            <div class="form-group">
                                 <input type="text" placeholder="Inserisci Titolo" class="form-control formControlUser" id="eventTitle" required/>
                            </div>                            
                            <div class="row text-left">
                                 <div class="col-12 form-group mb-3" id="typeEvent">
                                      <label>Scegli tipologia d'evento</label></br>
                                      <div class="btn-group btn-group-toggle d-flex flex-wrap" data-toggle="buttons">
                                           <?php
                                             foreach ($dbh->getEventType() as $key => $value) { ?>
                                                  <label class="btn btn-ticketBlue my-1">
                                                      <input type="radio" name="typeEventOptions" id="option<?php echo $value["IDTipologia"] ?>" autocomplete="off"> <?php echo $value["Nome"] ?>
                                                 </label>
                                       <?php } ?>
                                     </div>
                                 </div>
                            </div>
                            <div class="row text-left" id="optionalInfo">
                                 <div class="col-12 col-md-6 form-group mb-3">
                                     <label>Scegli genere d'vento</label>
                                     <select class="custom-select" id="kindMusicSelect">
                                        <optgroup label="">
                                        </optgroup>
                                   </select>
                                 </div>
                                 <div class="col-12 col-md-6 form-group mb-3">
                                   <label>Scegli artista</label>
                                   <select class="custom-select" id="ArtistSelect">
                                        <?php
                                             foreach ($dbh->getArtistByManager($_SESSION["accountLog"][2]) as $key => $value) {
                                                  if(isset($value["NomeDArte"]) && strcmp($value["NomeDArte"], "") != 0)
                                                       echo ('<option value="'.$value["IDArtista"].'">'.$value["NomeDArte"].'</option>');
                                                  else
                                                       echo ('<option value="'.$value["IDArtista"].'">'.$value["Nome"].' '.$value["Cognome"].'</option>');
                                             }
                                        ?>
                                   </select>
                                 </div>
                            </div>
                            <div class="input-group text-left mb-3">
                                <div class="custom-file">
                                     <input type="file" class="custom-file-input" id="locandinaImage" accept="image/*" name="locandinaImage" required>
                                     <label class="custom-file-label" for="locandinaImage">Carica Locandina</label>
                                </div>
                            </div>
                            <div class="text-right">
                                 <button type="button" class="btn btn-info btnNext">Next</button>
                            </div>
                       </fieldset>
                       <fieldset>
                            <h5 class="text-left">Informazioni Location</h5>
                            <div class="row text-left" id="locationEvent">
                                 <div class="col-12 form-group mb-3">
                                   <label>Scegli Location</label>
                                   <select class="custom-select" id="locationSelect">
                                        <?php
                                             foreach ($dbh->getAllLocation() as $key => $value)
                                                  echo ('<option value="'.$value["IDLocation"].'">'.$value["Nome"].'</option>');
                                        ?>
                                   </select>
                                 </div>
                            </div>
                            <div id="locationSectors">
                            </div>
                            <div class="f1-buttons text-right">
                                 <button type="button" class="btn btn-light btnPrevious">Previous</button>
                                 <button type="button" class="btn btn-info nextFieldset">Next</button>
                            </div>
                       </fieldset>
                       <fieldset>
                            <h5 class="text-left">Informazioni Aggiuntive</h5>
                         <div class="form-row">
                              <div class="col-md-4 mb-3">
                                   <div class="input-group date" id="startDatePicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input formControlUser"  placeholder="Data Inizio" data-target="#startDatePicker" required/>
                                         <div class="input-group-append" data-target="#startDatePicker" data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                                         </div>
                                   </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                   <div class="input-group date" id="endDatePicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input formControlUser"  placeholder="Data Fine" data-target="#endDatePicker" required/>
                                         <div class="input-group-append" data-target="#endDatePicker" data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                                         </div>
                                   </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                   <div class="input-group date" id="publicedDatePicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input formControlUser"  placeholder="Data Pubblicazione" data-target="#publicedDatePicker"/>
                                         <div class="input-group-append" data-target="#publicedDatePicker" data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                                         </div>
                                   </div>
                              </div>
                         </div>
                         <div class="form-group">
                             <textarea placeholder="Inserisci descrizione evento." class="form-control" id="eventDescription"></textarea>
                         </div>
                         <div class="f1-buttons text-right">
                              <button type="button" class="btn btn-light btnPrevious">Previous</button>
                              <button type="submit" class="btn btn-success btnSubmit">Submit</button>
                         </div>
                       </fieldset>
                  </div>
             <?php
                  break;
              default:
              ?>
              <div class="">
              </div>
               <?php
          }
          ?>
                    </form>
               </div>
          </div>
     </div>
</div>
