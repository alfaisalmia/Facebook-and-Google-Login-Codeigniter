<?php $mytype = $this->session->userdata("mytype"); ?>
<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  My Referral
                  <span class="generalBorder"></span>
               </h2>              
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">

            <div class="col-md-12 formWrapper">              
               <table class="table table-striped table-hover table-bordered">
                  <thead>
                     <tr>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Account Created</th>                                            
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($selCustomer as $scus) {
                        ?>
                        <tr>
                           <?php
                           foreach ($allCustomer as $cus) {
                              if ($cus->id == $scus->id) {
                                 echo "<td>{$cus->name}</td>";
                                 echo "<td>{$cus->username}</td>";
                                 break;
                              }
                           }
                           ?>                           
                           <td><?php echo Activation($scus->activation) ?></td>
                           <td><?php echo $scus->date ?></td>                          
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
