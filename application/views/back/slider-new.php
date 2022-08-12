<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Slider Management
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
               <a href="<?php echo base_url() ?>slider-management" class="btn btn-danger">New Entry</a>&nbsp;&nbsp;
               <a href="<?php echo base_url() ?>slider-management/view" class="btn btn-danger">View Entry</a>
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
               echo validation_errors("<span class='color-red'>", "</span>");
               ?>
               <form action="<?php echo base_url() ?>slider-management/insert" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <div class="form-group">
                     <label class="mylabel">Title: </label><br />
                     <input type="text" name="title" class="form-control" value="<?php echo set_value("title") ?>" />
                  </div>
                  <div class="form-group">
                     <label class="mylabel">Description: </label><br />
                     <textarea name="descr"><?php echo set_value("descr") ?></textarea>
                  </div>
                  <div class="form-group">
                     <label class="mylabel">Large Image: </label><br />
                     <input type="file" name="large_img" class="form-control" />
                  </div>
                  <div class="form-group">
                     <label class="mylabel">Small Image: </label><br />
                     <input type="file" name="small_img" class="form-control" />
                  </div>      
                  <div class="form-group">
                     <label for="status">Status</label><br />
                     <input type="radio" value="1" name="status" <?php if (set_value("status") == 1) echo " checked" ?>> Active&nbsp;&nbsp;&nbsp;
                     <input type="radio" value="2" name="status" <?php if (set_value("status") == 2) echo " checked" ?>> Inactive
                  </div>
                  <div class="form-group">
                     <label class="mylabel">Serial: </label><br />
                     <input type="text" name="serial" class="form-control" value="<?php echo set_value("serial") ?>" />
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