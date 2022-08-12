<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Client Management 
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->              
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-1 formWrapper hidden-xs"></div>
            <div class="col-md-10 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               $err = $this->session->userdata("err");
               if ($msg != NULL) {
                  echo ($err) ? "<center><p class='color-red'>{$msg}</p></center>" : "<center><p class='color-green'>{$msg}</p></center>";
                  $this->session->unset_userdata("msg");
                  $this->session->unset_userdata("err");
               }
               echo validation_errors('<div class="color-red"><center>', '</center></div>') . "<br />";
               foreach ($allCustomer as $cus) {
                  ?>
                  <form action="<?php echo base_url() ?>clients-management/update" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="id" value="<?php echo $cus->id ?>" />
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                     <div class="form-group"> 
                        <div class="row">
                           <div class="col-sm-6">
                              <label class="mylabel">CCR User Name: </label><br />
                              <input type="text" name="username" value="<?php echo $cus->username ?>" class="form-control" required="" />
                           </div>
                           <div class="col-sm-6">
                              <label class="mylabel">Password: </label><br />
                              <input type="text" name="userpass" value="<?php echo $cus->userpass ?>" class="form-control" required="" />
                           </div>
                        </div>
                        <br />
                        <div class="row">
                           <div class="col-sm-6">
                              <label class="mylabel">Full Name: </label><br />
                              <input type="text" name="name" value="<?php echo $cus->name ?>" class="form-control" required="" />
                           </div>
                           <div class="col-sm-6">
                              <label class="mylabel">Email: </label><br />
                              <input type="text" name="email" value="<?php echo $cus->email ?>" class="form-control" required="" />
                           </div>
                        </div>
                        <br />
                        <div class="row">
                           <div class="col-sm-6">
                              <label class="mylabel">Address: </label><br />
                              <input type="text" name="addr" value="<?php echo $cus->address ?>" class="form-control" required="" />
                           </div>
                           <div class="col-sm-6">
                              <label class="mylabel">Contact: </label><br />
                              <input type="text" name="contact" value="<?php echo $cus->contact ?>" class="form-control" required="" />
                           </div>
                        </div>
                        <br />
                        <div class="row">
                           <div class="col-sm-6">
                              <label class="mylabel">Package: </label><br />
                              <select name="packageid" class='form-control'>
                                 <?php
                                 foreach ($allPackage as $pak) {
                                    if ($pak->id == $cus->packageid) {
                                       echo "<option selected value='{$pak->id}'>{$pak->name}</option>";
                                    } else {
                                       echo "<option value='{$pak->id}'>{$pak->name}</option>";
                                    }
                                 }
                                 ?>
                              </select>
                           </div>
                           <div class="col-sm-5">
                              <label class="mylabel">Picture: </label><br />
                              <input type="file" name="pic" id="pic" value="" class="form-control" />
                           </div>
                           <div class="col-sm-1">
                              <?php
                              if ($cus->picture) {
                                 echo "<img src='" . base_url() . "images/documents/" . md5($cus->id . "kichu-na") . "-profile.{$cus->picture}" . "'   class='img-responsive img-thumbnail' />";
                              } else {
                                 echo "<img src='" . base_url() . "images/clients/no_image.png" . "' class='img-responsive img-thumbnail'>";
                              }
                              ?>
                           </div>  
                        </div>

                        <br />
                        <div class="row">
                           <div class="col-sm-5">
                              <label class="mylabel">National ID: </label><br />
                              <input type="file" name="nid" id="nid" value="" class="form-control" />
                           </div>
                           <div class="col-sm-1">
                              <?php
                              if ($cus->nid) {
                                 echo "<img src='" . base_url() . "images/documents/" . md5($cus->id . "nid-kichu-na") . "-nid.{$cus->nid}" . "' height='100' />";
                              } else {
                                 echo "<br /><span class='label label-danger'>&nbsp;&nbsp;&nbsp;Not &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />&nbsp;Avaliable</span>";
                              }
                              ?>
                           </div>
                           <div class="col-sm-5">
                              <label class="mylabel">Passport: </label><br />
                              <input type="file" name="passport" id="pass" value="" class="form-control" />
                           </div>
                           <div class="col-sm-1">
                              <?php
                              if ($cus->passport) {
                                 echo "<img src='" . base_url() . "images/documents/" . md5($cus->id . "passport-kichu-na") . "-passport.{$cus->passport}" . "' height='100' />";
                              } else {
                                 echo "<br /><span class='label label-danger'>&nbsp;&nbsp;&nbsp;Not &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />&nbsp;Avaliable</span>";
                              }
                              ?>
                           </div>  
                        </div>
                        <br />
                        <div class="row">
                           <div class="col-sm-6">
                              <label class="mylabel">Referral: </label>
                              <select name="referralid" class='form-control'>
                                 <option value="0">No Referral</option>
                                 <?php
                                 foreach ($allClient as $cli) {
                                    if ($cli->id == $cus->referralid) {
                                       echo "<option selected value='{$cli->id}'>dd{$cli->username}</option>";
                                    } else {
                                       echo "<option value='{$cli->id}'>{$cli->username}</option>";
                                    }
                                 }
                                 ?>
                              </select>
                           </div>  
                           <div class="col-sm-6">
                              <label class="mylabel">Status: </label>
                              <select name='activation' class='form-control'>
                                 <option value='1'<?php if ($cus->activation == 1) echo " selected"; ?>>Active</option>
                                 <option value='2'<?php if ($cus->activation == 2) echo " selected"; ?>>Suspended</option>
                                 <option value='0'<?php if ($cus->activation == 0) echo " selected"; ?>>Pending</option>
                              </select>
                           </div>                      
                        </div>                      
                        <div class="form-group">
                           <br /><br />
                           <input type="submit" name="reg" class="btn btn-success btn-sm" value="Update" />
                        </div>

                  </form><!-- end of registerFormArea -->
                  <?php
               }
               ?>
            </div><!-- end of col-md-12 -->
            <div class="col-md-1 formWrapper hidden-xs"></div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 