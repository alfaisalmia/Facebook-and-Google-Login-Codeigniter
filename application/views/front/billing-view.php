<?php $mytype = $this->session->userdata("mytype"); ?>
<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Billing Reports
                  <span class="generalBorder"></span>
               </h2>              
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">

            <div class="col-md-12 formWrapper">
               <?php
                  $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-red'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }
               ?>
               <form action="<?php echo base_url() ?>billing" method="get" >
                  <div class="form-group">                     
                     <div class="row">                                             
                        <div class="col-sm-3">
                           <label class="mylabel">Start Date: </label><br />
                           <input type="text" id="datepicker1" name="sdate" value="<?php echo set_value("sdate") ?>" class="form-control">
                        </div>
                        <div class="col-sm-3">
                           <label class="mylabel">End Date: </label><br />
                           <input type="text" id="datepicker2" name="edate" value="<?php echo set_value("edate") ?>" class="form-control">
                        </div>
                        <div class="col-sm-3">
                           <label class="mylabel">&nbsp;</label><br />
                           <input type="submit" name="sub" class="btn btn-success btn-sm" value="Search" />
                        </div>
                     </div>
                  </div>
               </form>
               <table class="table table-striped table-hover table-bordered">
                  <thead>
                     <tr>
                        <th>Date</th>
                        <th>Bill</th>
                        <th>payment</th>
                        <th>Method</th>
                        <th>Tr. ID</th>
                        
                        <th>Status</th>
                        <th>Requested</th>                        
                        <?php
                        if ($mytype == 'a') {
                           echo "<th>Edit</th>";
                           echo "<th>Delete</th>";
                        }
                        ?>                        
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($allPayment as $bil) {
                        ?>
                        <tr>  
                           <td><?php echo $bil->date ?></td>
                           <td>
                              <?php
                              if ($bil->type) {
                                 echo $bil->amount;
                                 $total += $bil->amount;
                              } else {
                                 echo "N/A";
                              };
                              ?>
                           </td>
                           <td>
                              <?php
                              if (!$bil->type) {
                                 echo $bil->amount;
                                 $total -= $bil->amount;
                              } else {
                                 echo "N/A";
                              };
                              ?>
                           </td>
                           <td><?php echo Paymentmethod($bil->paymentmethod) ?></td>
                           <td><?php echo ($bil->number)?$bil->number:"N/A" ?></td>
                           
                           <td><?php echo ($bil->active) ? "<span class='label label-success'>Confirm</span>" : "<span class='label label-warning'>Pending</span>" ?></td>
                           <?php
                           foreach ($allCustomer as $cus) {
                              if ($cus->id == $bil->operatorid) {
                                 echo "<td>{$cus->name}</td>";
                                 break;
                              }
                           }
                           if ($mytype == 'a') {
                              ?>   
                              <td><a href="<?php echo base_url() . "payment-management/edit/{$bil->id}" ?>">Edit</a></td>
                              <td><a href="<?php echo base_url() . "payment-management/delete/{$bil->id}" ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                              <?php
                           }
                           ?>
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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   $(function() {
      $("#datepicker1, #datepicker2").datepicker({
         dateFormat: 'yy-mm-dd'
      });
   });
</script>