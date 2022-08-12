<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Change Logo
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-3 formWrapper hidden-xs"></div>
            <div class="col-md-6 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               $err = $this->session->userdata("err");
               if ($msg != NULL) {
                  echo ($err) ? "<center><p class='color-red'>{$msg}</p></center>" : "<center><p class='color-green'>{$msg}</p></center>";
                  $this->session->unset_userdata("msg");
                  $this->session->unset_userdata("err");
               }
               echo validation_errors('<div class="color-red"><center>', '</center></div>') . "<br />";
               ?>
               <form action="<?php echo base_url() ?>logo-management/insert" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">
                     <label class="mylabel">Change Logo: </label><br />
                     <div class="row">
                        <div class="col-sm-9">
                           <input type="file" name="logo" class="form-control" />
                        </div> 
                        <div class="col-sm-3" style="background: #000;">
                           <?php
                           if (file_exists("images/logo.png")) {
                              echo "<img src='" . base_url() . "images/logo.png" . "' class='img-responsive' />";
                           } else {
                              echo "No image avaliable";
                           }
                           ?>
                        </div> 
                     </div>

                  </div> 
                  <div class="form-group">
                     <input type="submit" name="sub" class="btn btn-success btn-sm" value="Save" />
                  </div>
               </form><!-- end of registerFormArea -->
            </div><!-- end of col-md-12 -->

         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 