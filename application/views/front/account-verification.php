<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Account Verification
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-4 formWrapper hidden-xs"></div>
            <div class="col-md-4 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               $err = $this->session->userdata("err");
               if ($msg != NULL) {
                  echo ($err) ? "<center><p class='color-red'>{$msg}</p></center>" : "<center><p class='color-green'>{$msg}</p></center>";
                  $this->session->unset_userdata("msg");
                  $this->session->unset_userdata("err");
               }

               echo validation_errors('<div class="color-red">', '</div>') . "<br />";
               ?>
               <form action="<?php echo base_url() ?>account-verification" method="POST">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                     
                     <div class="row">                        
                        <div class="col-sm-12">
                           <label class="mylabel">Code: </label><br />
                           <input type="text" name="code" value="" class="form-control" required="" autocomplete="off" />
                        </div>                                                
                     </div>
                     <br />                     
                  </div> 
                  <div class="form-group">
                     <input type="submit" name="ver" class="btn btn-success" value="Confirm" />
                     &nbsp;&nbsp;&nbsp;
                     <a href="<?php echo base_url() ?>self-care" class="btn btn-success">Login</a>
                     &nbsp;&nbsp;&nbsp;
                     <a href="<?php echo base_url() ?>new-register" class="btn btn-success">Register</a>
                  </div>
               </form><!-- end of registerFormArea -->
            </div><!-- end of col-md-12 -->
            <div class="col-md-4 formWrapper hidden-xs"></div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 
