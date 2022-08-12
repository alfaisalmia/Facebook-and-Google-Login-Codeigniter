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
               ?>
               <?php
               foreach ($allSlider as $value) {
                  ?>
                  <form action="<?php echo base_url() ?>slider-management/update" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                     <input type="hidden" name="id" value="<?php echo $value->id ?>" />
                     <div class="form-group">
                        <label class="mylabel">Title: </label><br />
                        <input type="text" name="title" class="form-control" value="<?php echo $value->title ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Description: </label><br />
                        <textarea name="descr"><?php echo $value->description ?></textarea>
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Large Image: </label><br />
                        <div class="row">
                           <div class="col-sm-9">
                              <input type="file" name="large_img" class="form-control" />
                           </div> 
                           <div class="col-sm-3">
                              <?php
                              if ($value->large_img) {
                                 echo "<img src='" . base_url() . "images/large-slider/slider-{$value->id}.{$value->large_img}" . "' class='img-responsive' />";
                              } else {
                                 echo "No image avaliable";
                              }
                              ?>
                           </div> 
                        </div>


                     </div>
                     <div class="form-group">
                        <label class="mylabel">Small Image: </label><br />
                        <div class="row">
                           <div class="col-sm-9">
                              <input type="file" name="small_img" class="form-control" />
                           </div> 
                           <div class="col-sm-3">
                              <?php
                              if ($value->small_img) {
                                 echo "<img src='" . base_url() . "images/small-slider/slider-{$value->id}.{$value->small_img}" . "' width='60' />";
                              } else {
                                 echo "No image avaliable";
                              }
                              ?>
                           </div> 
                        </div>
                     </div>      
                     <div class="form-group">
                        <label for="status">Status</label><br />
                        <input type="radio" value="1" name="status" <?php if ($value->status == 1) echo " checked" ?>> Active&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="2" name="status" <?php if ($value->status == 2) echo " checked" ?>> Inactive
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Serial: </label><br />
                        <input type="text" name="serial" class="form-control" value="<?php echo $value->serial ?>" />
                     </div>
                     <div class="form-group">
                        <input type="submit" name="sub" class="btn btn-success btn-sm" value="Update" />
                     </div>
                  </form><!-- end of registerFormArea -->
                  <?php
               }
               ?>
            </div><!-- end of col-md-12 -->

         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 