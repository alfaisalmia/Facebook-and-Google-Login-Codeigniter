<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Self care Login
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-4 formWrapper hidden-xs"></div>
            <div class="col-md-4 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-red'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }

               echo validation_errors('<div class="color-red">', '</div>') . "<br />";
               ?>
               <form action="<?php echo base_url() ?>check" method="POST">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                     
                     <div class="row">                        
                        <div class="col-sm-12">
                           <label class="mylabel">Email: </label><br />
                           <input type="text" name="email" value="<?php echo set_value("email") ?>" class="form-control" required="" />
                        </div>                        
                        <div class="col-sm-12">
                           <br />
                           <label class="mylabel">Password: </label><br />
                           <input type="password" name="pass" value="<?php echo set_value("pass") ?>" class="form-control" required="" />
                        </div>
                     </div>
                     <br />                     
                  </div> 
                  <div class="form-group">
                     <input type="submit" name="login" class="btn btn-success" value="Login" />&nbsp;&nbsp;&nbsp;
                     <a href="<?php echo base_url() ?>new-register" class="btn btn-success">Register</a>
                  </div>
                     <a href="<?php echo base_url() ?>password-recovery" style="color: red">Forget Password?</a></p>
               </form><!-- end of registerFormArea -->
            </div><!-- end of col-md-12 -->
            <div class="col-md-4 formWrapper hidden-xs"></div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 