<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Welcome <?php echo $this->session->userdata("myname") ?>
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-12 sectionTitle">
               <?php
               $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-green'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }

               foreach ($selCustomer as $value) {
                  if ($value->activation == 0) {

                     if ($value->picture == NULL || ($value->nid == null && $value->passport == NULL)) {
                        echo "<p class='color-red'>You have not upload required documents.</p>";
                     }
                     echo "<br /><a href='" . base_url() . "profile/documents' class='btn btn-primary'>Upload Document</a>";
                  }
               }
               ?>
            </div>
            <div class="col-md-12">
               <div class="profile">
                  <div class="row">
                     <?php
                     foreach ($selCustomer as $value) {
                        ?>
                        <div class="col-md-9">
                           <div class="profile-left">
                              <table class="table table-striped">
                                 <tr>
                                    <td>Account Status:</td>
                                    <td>
                                       <?php echo Activation($value->activation); ?></td>
                                 </tr>
                                 <tr>
                                    <td>Full Name:</td>
                                    <td><?php echo $value->name ?></td>
                                 </tr>
                                 <tr>
                                    <td>Email:</td>
                                    <td><?php echo $value->email ?></td>
                                 </tr>
                                 <tr>
                                    <td>Address:</td>
                                    <td><?php echo $value->address ?></td>
                                 </tr>
                                 <tr>
                                    <td>Contact:</td>
                                    <td><?php echo $value->contact ?></td>
                                 </tr>
                                 <tr>
                                    <td>Package:</td>
                                    <td><?php echo Package($value->packageid, $allPackage); ?></td>
                                 </tr>
                                 <tr>
                                    <td>National ID Number:</td>
                                    <td><?php echo ($value->nid_number) ? $value->nid_number : "Nil"; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Passport Number:</td>
                                    <td><?php echo ($value->passport_number) ? $value->passport_number : "Nil"; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Nation ID:</td>
                                    <td>
                                       <?php
                                       if ($value->nid) {
                                          echo "<img src='" . base_url() . "images/documents/" . md5($value->id . "nid-kichu-na") . "-nid.{$value->nid}" . "' height='100' />";
                                       } else {
                                          echo "<span class='label label-danger'>Not Avaliable</span>";
                                       }
                                       ?>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Passport ID:</td>
                                    <td>
                                       <?php
                                       if ($value->passport) {
                                          echo "<img src='" . base_url() . "images/documents/" . md5($value->id . "passport-kichu-na") . "-passport.{$value->passport}" . "' height='100' />";
                                       } else {
                                          echo "<span class='label label-danger'>Not Avaliable</span>";
                                       }
                                       ?>
                                    </td>
                                 </tr>
                              </table>

                              <center><a href="<?php echo base_url() ?>profile/edit" class="btn btn-success">Edit Profile</a></center>
                           </div>                     
                        </div>
                        <div class="col-md-3">
                           <div class="profile-right">
                              <?php
                              if ($value->picture) {
                                 echo "<img src='" . base_url() . "images/documents/" . md5($value->id . "kichu-na") . "-profile.{$value->picture}" . "'  class='img-thumbnail' width='100' />";
                              } else {
                                 echo "<img src='" . base_url() . "images/clients/no_image.png" . "' class='img-responsive img-thumbnail'>";
                              }

                              if ($value->username) {
                                 echo "<p>User Name: <span class='label label-success'>{$value->username}</span> <br />";
                              } else {
                                 echo "<p>User Name: <span class='label label-danger'>Not Avaliable</span> <br />";
                              }
                              if ($value->userpass) {
                                 echo "Password: <span class='label label-success'>{$value->userpass}</span> <br />";
                              } else {
                                 echo "Password: <span class='label label-danger'>Not Avaliable</span> <br />";
                              }
                              echo "Member since: <span class='label label-info'>" . date_format(date_create($value->date), "dS F, Y") . "</span></p>";
                              ?>
                           </div>
                        </div>
                        <?php
                     }
                     ?>
                  </div>               
               </div>
            </div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 