<?php $mytype = $this->session->userdata("mytype"); ?>
<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Client Management
                  <span class="generalBorder"></span>
               </h2>
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
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Package</th>
                        <th>Member Since</th>
                        <th>Referral</th>
                        <th>Status</th>           
                        <th>Edit</th>           
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($allCustomer as $cus) {
                        ?>
                        <tr>
                           <td><?php echo ($cus->username) ? $cus->username : "Not Avaliable"; ?></td>
                           <td><a href="<?php echo base_url() . "customers/payment/{$cus->id}" ?>"><?php echo $cus->name; ?></a></td>
                           <td><?php echo $cus->email; ?></td>
                           <td><?php echo $cus->contact; ?></td>
                           <td>
                              <?php
                              if ($cus->packageid == 0) {
                                 echo "Not Avaliable";
                              } else {
                                 foreach ($allPackage as $pak) {
                                    if ($cus->packageid == $pak->id) {
                                       echo $pak->name;
                                       break;
                                    }
                                 }
                              }
                              ?>                           
                           </td>
                           <td><?php echo $cus->date; ?></td>
                           <td><?php echo ($cus->totalreferral) ? "<span class='label label-success'>{$cus->totalreferral} Active</span>" : "<span class='label label-danger'>0 Active</span>"; ?></td>
                           <td><?php echo Activation($cus->activation); ?></td>
                           <td><a href="<?php echo base_url() . "clients-management/edit/{$cus->id}" ?>">Edit</a></td>
                           <?php
                        }
                        ?>
                     </tr>

                  </tbody>
               </table>
            </div><!-- end of col-md-12 -->

         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 
