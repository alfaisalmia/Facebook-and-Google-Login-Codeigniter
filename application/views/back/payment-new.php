<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Payment Management
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
               <a href="<?php echo base_url() ?>payment-management" class="btn btn-danger">New Entry</a>&nbsp;&nbsp;
               <a href="<?php echo base_url() ?>payment-management/view" class="btn btn-danger">View Entry</a>
               <?php
                  $mytype = $this->session->userdata("mytype");
                  if($mytype == "a"){
               ?>
               <a href="<?php echo base_url() ?>payment-management/pending-payment" class="btn btn-danger">Pending Payment</a>
               <?php
                  }
               ?>
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-3 formWrapper hidden-xs"></div>
            <div class="col-md-6 formWrapper">
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
               <form action="<?php echo base_url() ?>payment-management/insert" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                     
                     <div class="row">
                        <div class="col-sm-9">
                           <label class="mylabel">Customer: </label><br />
                           <select name="customerid" id="customerid" class="form-control">
                              <option value="0">Select Customer</option>
                              <?php
                              foreach ($allCustomer as $value) {
                                 echo "<option value='{$value->id}'>{$value->username} - {$value->name}</option>";
                              }
                              ?>
                           </select>
                        </div> 
                        <div class="col-sm-9">
                           <br />
                           <label class="mylabel">Package: </label><br />
                           <select readonly name="price" id="price" class="form-control">
                              <option value="0">Select Customer First</option>
                           </select>
                        </div>                        
                        <div class="col-sm-9">
                           <br />
                           <label class="mylabel">Amount: </label><br />
                           <input type="text" name="amount" value="<?php echo set_value("amount") ?>" required="" class="form-control">
                        </div>
                        <div class="col-sm-9">
                           <br />
                           <label class="mylabel">Payment Method: </label><br />
                           <select name="payment" id="payment" class="form-control">
                              <option value="1">Cash</option>
                              <option value="2">Bank</option>
                              <option value="3">BKash</option>
                              <option value="4">Rocket</option>
                              <option value="5">Referral</option>
                           </select>
                        </div>
                        <div class="col-sm-9 transaction">
                           <br />
                           <label class="mylabel">Transaction ID: </label><br />
                            <input type="text" id="num" name="num" class="form-control">
                        </div>
                        <div class="col-sm-9">
                           <br />
                           <label class="mylabel">Date: </label><br />
                           <input type="text" id="datepicker" name="date" value="<?php echo set_value("date") ?>" required="" class="form-control">
                        </div>
                     </div>

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

<script>
   $(document).ready(function() {
      $(".transaction").hide();
      $("#payment").change(function (){
         var payment = $(this).val();
         if(payment == 1 || payment == 5){
            $(".transaction").hide();
         }
         else{
            $(".transaction").show();
         }
      });
      
      $("#customerid").change(function() {
         var cusid = $(this).val();
         $('#price').html('');

         if (cusid == 0) {
            $("#price").html("<option value='0'>Select Customer First</option>");
         }
         <?php
         foreach ($allCustomer as $cus) {
            echo "else if(cusid == {$cus->id}){";
            foreach ($allPackage as $pak) {
               if ($cus->packageid == $pak->id) {
                  echo "$('#price').append('<option value=\"{$pak->price}\">{$pak->name} - {$pak->price}TK</option>');";
               }
            }
            echo "}";
         }
         ?>
      });
   });
</script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   $(function() {
      $("#datepicker").datepicker({
         dateFormat: 'yy-mm-dd'
      });
   });
</script>