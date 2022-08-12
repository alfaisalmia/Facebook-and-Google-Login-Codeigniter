<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Package Management
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
               <a href="<?php echo base_url() ?>package-management" class="btn btn-danger">New Entry</a>&nbsp;&nbsp;
               <a href="<?php echo base_url() ?>package-management/view" class="btn btn-danger">View Entry</a>
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">

            <div class="col-md-6 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-red'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }
               ?>

               <?php
               foreach ($allPackage as $value) {
                  ?>
                  <form action="<?php echo base_url() ?>package-management/update" method="POST" >
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                     <input type="hidden" name="id" value="<?php echo $value->id ?>" />
                     <div class="form-group">
                        <label class="mylabel">Name: </label><br />
                        <input type="text" name="name" class="form-control" required="" value="<?php echo $value->name ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Price: </label><br />
                        <input type="text" name="price" class="form-control" required="" value="<?php echo $value->price ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Time 1: </label><br />
                        <input type="text" name="time1" class="form-control" required="" value="<?php echo $value->time1 ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Speed 1: </label><br />
                        <input type="text" name="speed1" class="form-control" required="" value="<?php echo $value->speed1 ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Time 2: </label><br />
                        <input type="text" name="time2" class="form-control" value="<?php echo $value->time2 ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Speed 2: </label><br />
                        <input type="text" name="speed2" class="form-control" value="<?php echo $value->speed2 ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">Youtube Speed: </label><br />
                        <input type="text" name="yt" class="form-control" value="<?php echo $value->yt ?>" />
                     </div>
                     <div class="form-group">
                        <label class="mylabel">BDIX Speed: </label><br />
                        <input type="text" name="bdix" class="form-control" value="<?php echo $value->bdix ?>" />
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
                  </form>
                  <?php
               }
               ?>
            </div><!-- end of col-md-12 -->

         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 