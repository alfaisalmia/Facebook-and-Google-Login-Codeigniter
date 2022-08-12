<?php $mytype = $this->session->userdata("mytype"); ?>
<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Payment Management
                  <span class="generalBorder"></span>
               </h2>
               <a href="<?php echo base_url() ?>payment-management" class="btn btn-danger">New Entry</a>&nbsp;&nbsp;
               <a href="<?php echo base_url() ?>payment-management/view" class="btn btn-danger">View Entry</a>
               <?php
               $mytype = $this->session->userdata("mytype");
               if ($mytype == "a") {
                  ?>
                  <a href="<?php echo base_url() ?>payment-management/pending-payment" class="btn btn-danger">Pending Payment</a>
                  <?php
               }
               ?>
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
               echo validation_errors('<div class="color-red"><center>', '</center></div>') . "<br />";
               ?>
               <form action="<?php echo base_url() ?>payment-management/pending-payment" method="get" >
                  <div class="form-group">                     
                     <div class="row">
                        <div class="col-sm-3">
                           <label class="mylabel">Customer: </label><br />
                           <select name="cid" id="customerid" class="form-control">
                              <option value="0">All Customer</option>
                              <?php
                              foreach ($allCustomer as $value) {
                                 if ($value->type == "c") {
                                    echo "<option value='{$value->id}'>{$value->username} - {$value->name}</option>";
                                 }
                              }
                              ?>
                           </select>
                        </div>                         
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
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Tr. ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Operator</th>                        
                        <?php
                        if ($mytype == 'a') {
                           echo "<th>Confirm</th>";
                        }
                        ?>                        
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($allPayment as $bil) {
                        ?>
                        <tr>
                           <?php
                           foreach ($allCustomer as $cus) {
                              if ($cus->id == $bil->customerid) {
                                 echo "<td><a href='" . base_url() . "customers/payment/{$cus->id}" . "'>{$cus->name}</a></td>";
                                 echo "<td><a href='" . base_url() . "customers/payment/{$cus->id}" . "'>{$cus->username}</a></td>";
                                 break;
                              }
                           }
                           ?>                           
                           <td><?php echo $bil->amount ?></td>
                           <td><?php echo Paymentmethod($bil->paymentmethod) ?></td>
                           <td><?php echo ($bil->number) ? $bil->number : "N/A" ?></td>
                           <td><?php echo $bil->date ?></td>
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
                              <td><a href="<?php echo base_url() . "payment-management/pending-payment/{$bil->id}?{$url}" ?>" onclick="return confirm('Are you sure you want to confirm this payment?');">Confirm</a></td>
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
