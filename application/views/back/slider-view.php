<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Slider Management
                  <span class="generalBorder"></span>
               </h2>
               <a href="<?php echo base_url() ?>slider-management" class="btn btn-danger">New Entry</a>&nbsp;&nbsp;
               <a href="<?php echo base_url() ?>slider-management/view" class="btn btn-danger">View Entry</a>
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">

            <div class="col-md-12 formWrapper">
                <?php
               $msg = $this->session->userdata("msg");
               $err = $this->session->userdata("err");
               if ($msg != NULL) {
                  echo ($err) ? "<center><p class='color-red'>{$msg}</p></center>" : "<center><p class='color-green'>{$msg}</p></center>";
                  $this->session->unset_userdata("msg");
                  $this->session->unset_userdata("err");
               }
               ?>
               <table class="table table-striped table-hover table-bordered">
                  <thead>
                     <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Large Slider</th>
                        <th>Small Slider</th>
                        <th>Status</th>
                        <th>Serial</th>
                        <th>Edit</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($allSlider as $value) {
                        ?>
                        <tr>
                           <td><?php echo $value->title ?></td>
                           <td><?php echo $value->description ?></td>
                           <td>
                              <?php
                              if ($value->large_img) {
                                 echo "<img src='" . base_url() . "images/large-slider/slider-{$value->id}.{$value->large_img}" . "' width='100' />";
                              } else {
                                 echo "No image avaliable";
                              }
                              ?>
                           </td>
                           <td>
                              <?php
                              if ($value->small_img) {
                                 echo "<img src='" . base_url() . "images/small-slider/slider-{$value->id}.{$value->small_img}" . "' width='80' />";
                              } else {
                                 echo "No image avaliable";
                              }
                              ?>
                           </td>
                           <td><?php echo ($value->status == 1) ? "Active" : "Inactive"; ?></td>
                           <td><?php echo $value->serial ?></td>
                           <td><a href="<?php echo base_url() . "slider-management/edit/" . $value->id ?>">Edit</a></td>
                        </tr>
   <?php
}
?>
                  </tbody>
               </table>
            </div><!-- end of col-md-12 -->

         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 