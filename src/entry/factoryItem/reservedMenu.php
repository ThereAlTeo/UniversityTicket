          <div class="row d-block">
          <?php
          foreach ($templateParams["menuPage"] as $key => $value) { ?>
               <div class="col-12 mb-1">
                    <button type="button" class="btn btn-outline-<?php echo $value[0]  ?> btn-block" data-toggle="modal" data-target="#<?php echo $value[3] ?>">
                         <i class="<?php echo $value[1] ?> mr-1"></i> <?php echo $value[2] ?>
                    </button>
               </div>
          <?php
          } ?>
          </div>
