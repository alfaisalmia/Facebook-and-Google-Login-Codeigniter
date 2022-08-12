<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Billing Management
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
               <a href="<?php echo base_url() ?>billing-management" class="btn btn-danger">New Entry</a>&nbsp;&nbsp;
               <a href="<?php echo base_url() ?>billing-management/view" class="btn btn-danger">View Entry</a>
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
               <form action="<?php echo base_url() ?>billing-management/insert" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                     
                     <div class="row">
                        <div class="col-sm-9">
                           <label class="mylabel">Customer: </label><br />
                           <select name="customerid" id="customerid" class="form-control">
                              <option value="0">All Customer</option>
                              ?>
                           </select>
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