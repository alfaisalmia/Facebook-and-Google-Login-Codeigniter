<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Order Your Package Now
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-2 formWrapper hidden-xs"></div>
            <div class="col-md-8 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-red'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }

               echo validation_errors('<div class="color-red">', '</div>') . "<br />";
               ?>
               <form action="<?php echo base_url() ?>referral" method="POST" novalidate="">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                                             
                     <div class="row">                        
                        <div class="col-sm-6">
                           <h5>Details of your Friend/Family</h5><br />
                           <label class="mylabel">Your Friend Full Name: </label><br />
                           <input type="text" name="name" value="<?php echo set_value("name") ?>" class="form-control" required="" /><br />
                           <label class="mylabel">Your Friend Contact: </label><br />
                           <input type="text" name="phone" value="<?php echo set_value("phone") ?>" class="form-control" required="" /><br />
                           <label class="mylabel">Address: </label><br />
                           <input type="text" name="addr" value="<?php echo set_value("addr") ?>" class="form-control" required="" />
                        </div> 
                        <div class="col-sm-6">
                           <h5>Your Details</h5><br />
                           <label class="mylabel">Email: </label><br />
                           <input type="email" name="email" value="<?php echo set_value("email") ?>" class="form-control" required="" /><br />
                           <label class="mylabel">Password: </label><br />
                           <input type="password" name="pass" value="" class="form-control" required="" />
                        </div>
                     </div>
                     <br />      <br />      
                     
                         
                     <div class="row">                                                
                        <div class="col-sm-12">
                           <center>
                              <input type="submit" name="referral" class="btn btn-success" value="&nbsp;&nbsp;&nbsp;Send&nbsp;&nbsp;&nbsp;" />
                           </center>
                           
                        </div>
                     </div>
                  </div>
               </form><!-- end of registerFormArea -->
            </div><!-- end of col-md-12 -->
            <div class="col-md-2 formWrapper hidden-xs"></div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 