<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Fill up the form below and click Register
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-1 formWrapper hidden-xs"></div>
            <div class="col-md-10 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-red'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }
               
               echo validation_errors('<div class="color-red">', '</div>') . "<br />";
              
               ?>
               <form action="<?php echo base_url() ?>new-register" method="POST">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                     
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="mylabel">Full Name: </label><br />
                           <input type="text" name="name" value="<?php echo set_value("name") ?>" class="form-control" required="" />
                        </div>
                        <div class="col-sm-6">
                           <label class="mylabel">Email: </label><br />
                           <input type="text" name="email" value="<?php echo set_value("email") ?>" class="form-control" required="" />
                        </div>
                     </div>
                     <br />
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="mylabel">Password: </label><br />
                           <input type="password" name="pass1" value="<?php echo set_value("pass1") ?>" class="form-control" required="" />
                        </div>
                        <div class="col-sm-6">
                           <label class="mylabel">Retype Password: </label><br />
                           <input type="password" name="pass2" value="<?php echo set_value("pass2") ?>" class="form-control" required="" />
                        </div>
                     </div>
                     <br />
                     <div class="row">
                        <div class="col-sm-6">
                           <label class="mylabel">Address: </label><br />
                           <input type="text" name="addr" value="<?php echo set_value("addr") ?>" class="form-control" required="" />
                        </div>
                        <div class="col-sm-6">
                           <label class="mylabel">Contact: </label><br />
                           <input type="text" name="contact" value="<?php echo set_value("contact") ?>" class="form-control" required="" />
                        </div>
                     </div>
                  </div> 
                  <div class="form-group">
                     <input type="submit" name="reg" class="btn btn-success btn-sm" value="Register" />&nbsp;&nbsp;&nbsp;
                     <a href="<?php echo base_url() ?>self-care" class="btn btn-success">Login</a>
                     
                  </div>
                  
               </form><!-- end of registerFormArea -->
            </div><!-- end of col-md-12 -->
            <div class="col-md-1 formWrapper hidden-xs"></div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 