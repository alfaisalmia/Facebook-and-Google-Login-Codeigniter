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
               foreach ($selBill as $bill) {
                  $payment = $bill->paymentmethod;
                  ?>
                  <form action="<?php echo base_url() ?>payment-management/update" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"> 
                     <input type="hidden" name="id" value="<?php echo $bill->id ?>" />

                     <div class="form-group">                     
                        <div class="row">
                           <div class="col-sm-9">
                              <label class="mylabel">Customer: </label><br />
                              <select name="customerid" id="customerid" class="form-control">
                                 <option value="0">Select Customer</option>
                                 <?php
                                 foreach ($allCustomer as $value) {
                                    if ($bill->customerid == $value->id) {
                                       echo "<option selected value='{$value->id}'>{$value->username} - {$value->name}</option>";
                                       $pakid = $value->packageid;
                                    } else {
                                       echo "<option value='{$value->id}'>{$value->username} - {$value->name}</option>";
                                    }
                                 }
                                 ?>
                              </select>
                           </div> 
                           <div class="col-sm-9">
                              <br />
                              <label class="mylabel">Package: </label><br />
                              <select readonly name="price" id="price" class="form-control">
                                 <?php
                                 foreach ($allPackage as $value) {
                                    if ($pakid == $value->id) {
                                       echo "<option selected value='{$value->price}'>{$value->name} - {$value->price}TK</option>";
                                    }
                                 }
                                 ?>
                              </select>
                           </div>                        
                           <div class="col-sm-9">
                              <br />
                              <label class="mylabel">Amount: </label><br />
                              <input type="text" name="amount" value="<?php echo $bill->amount ?>" required="" class="form-control">
                           </div>
                           <div class="col-sm-9">
                              <br />
                              <label class="mylabel">Payment Method: </label><br />
                              <select name="payment" id="payment" class="form-control">
                                 <option value="1"<?php if ($bill->paymentmethod == 1) echo " selected" ?>>Cash</option>
                                 <option value="2"<?php if ($bill->paymentmethod == 2) echo " selected" ?>>Bank</option>
                                 <option value="3"<?php if ($bill->paymentmethod == 3) echo " selected" ?>>BKash</option>
                                 <option value="4"<?php if ($bill->paymentmethod == 4) echo " selected" ?>>Rocket</option>
                                 <option value="5"<?php if ($bill->paymentmethod == 5) echo " selected" ?>>Referral</option>
                              </select>
                           </div>
                           <div class="col-sm-9 transaction">
                              <br />
                              <label class="mylabel">Transaction ID: </label><br />
                              <input type="text" id="num" name="num" value="<?php echo $bill->number ?>" class="form-control">
                           </div>
                           <div class="col-sm-9">
                              <br />
                              <label class="mylabel">Date: </label><br />
                              <input type="text" id="datepicker" name="date" value="<?php echo $bill->date ?>" required="" class="form-control">
                           </div>
                        </div>

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

<script>
   $(document).ready(function() {
<?php
if ($payment == 1 || $payment == 5) {
   echo "$('.transaction').hide();";
}
?>

      $("#payment").change(function() {
         var payment = $(this).val();
         if (payment == 1 || payment == 5) {
            $(".transaction").hide();
         }
         else {
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