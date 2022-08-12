<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Package Management
                  <span class="generalBorder"></span>
               </h2>
               <a href="<?php echo base_url() ?>package-management" class="btn btn-danger">New Entry</a>&nbsp;&nbsp;
               <a href="<?php echo base_url() ?>package-management/view" class="btn btn-danger">View Entry</a>
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
                        <th>Package Name</th>
                        <th>Price</th>
                        <th>Timing 1</th>
                        <th>Bandwidth</th>
                        <th>Timing 2</th>
                        <th>Bandwidth</th>
                        <th>Youtube</th>
                        <th>BDIX</th>
                        <th>Status</th>
                        <th>Serial</th>
                        <th>Edit</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($allPackage as $value) {
                        ?>
                        <tr>
                           <td><?php echo $value->name ?></td>
                           <td><?php echo $value->price ?></td>
                           <td><?php echo $value->time1 ?></td>
                           <td><?php echo $value->speed1 ?></td>
                           <td><?php echo $value->time2 ?></td>
                           <td><?php echo $value->speed2 ?></td>
                           <td><?php echo $value->yt ?></td>
                           <td><?php echo $value->bdix ?></td>
                           <td><?php echo ($value->status == 1) ? "Active" : "Inactive"; ?></td>
                           <td><?php echo $value->serial ?></td>
                           <td><a href="<?php echo base_url() . "package-management/edit/" . $value->id ?>">Edit</a></td>
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