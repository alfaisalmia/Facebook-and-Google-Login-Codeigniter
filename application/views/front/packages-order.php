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
            <div class="col-md-3 formWrapper hidden-xs"></div>
            <div class="col-md-6 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-red'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }

               echo validation_errors('<div class="color-red">', '</div>') . "<br />";
               ?>
               <form action="<?php echo base_url() ?>package-order/<?php echo $id ?>" method="POST">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                     
                     <div class="row">                        
                        <div class="col-sm-3">
                           <label class="mylabel pull-right">Package: </label><br />
                        </div> 
                        <div class="col-sm-9">
                           <select name="packageid" class="form-control">
                              <?php
                              foreach ($allPackage as $value) {
                                 if($id == $value->id){
                                    echo "<option value='{$value->name}' selected>{$value->name} -> {$value->price}tk/month</option>";
                                 }
                                 else{
                                    echo "<option value='{$value->name}'>{$value->name} -> {$value->price}tk/month</option>";
                                 }
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <br />      
                     <div class="row">                        
                        <div class="col-sm-3">
                           <label class="mylabel pull-right">Full Name: </label><br />
                        </div> 
                        <div class="col-sm-9">
                           <input type="text" name="name" value="<?php echo set_value("name") ?>" class="form-control" required="" />
                        </div>
                     </div>
                     <br />      
                     <div class="row">                        
                        <div class="col-sm-3">
                           <label class="mylabel pull-right">Phone Number: </label><br />
                        </div> 
                        <div class="col-sm-9">
                           <input type="text" name="phone" value="<?php echo set_value("phone") ?>" class="form-control" required="" />
                        </div>
                     </div>
                     <br />      
                     <div class="row">                        
                        <div class="col-sm-3">
                           <label class="mylabel pull-right">Email: </label><br />
                        </div> 
                        <div class="col-sm-9">
                           <input type="email" name="email" value="<?php echo set_value("email") ?>" class="form-control" required="" />
                        </div>
                     </div>
                     <br />      
                     <div class="row">                        
                        <div class="col-sm-3">
                           <label class="mylabel pull-right">Address: </label><br />
                        </div> 
                        <div class="col-sm-9">
                           <textarea name="addr" required=""><?php echo set_value("addr") ?></textarea>
                        </div>
                     </div>
                     <br />      
                     <div class="row">                        
                        <div class="col-sm-3 hidden-xs">
                           
                        </div> 
                        <div class="col-sm-9">
                           <input type="submit" name="order" class="btn btn-success" value="Order Now" />
                        </div>
                     </div>
                  </div>
               </form><!-- end of registerFormArea -->
            </div><!-- end of col-md-12 -->
            <div class="col-md-3 formWrapper hidden-xs"></div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 