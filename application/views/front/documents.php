<!-- Register Area -->
<section class="registerArea section mainSection scrollAnchor graySection" id="registerArea">
   <div class="sectionWrapper">
      <div class="container">

         <div class="row">
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Upload Documents
                  <span class="generalBorder"></span>
               </h2><!-- end of sectionHeader -->
            </div><!-- end of section title -->

         </div><!-- end of row -->

         <div class="row registerAreaContents">
            <div class="col-md-4 formWrapper hidden-xs"></div>
            <div class="col-md-4 formWrapper">
               <?php
               $msg = $this->session->userdata("msg");
               if ($msg != NULL) {
                  echo "<p class='color-red'>{$msg}</p>";
                  $this->session->unset_userdata("msg");
               }

               echo validation_errors('<div class="color-red">', '</div>') . "<br />";
               ?>
               <form action="<?php echo base_url() ?>profile/documents" method="POST" enctype="multipart/form-data" novalidate="">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">                  
                  <div class="form-group">                     
                     <div class="row">                        
                        <div class="col-sm-12">
                           <label class="mylabel">Profile Picture: </label><br />
                           <input type="file" name="pic" id="pic" value="" class="form-control" required="" />
                        </div>
                        <div class="col-sm-12">
                           <br />
                           <label class="mylabel">National ID: </label><br />
                           <input type="file" name="nid" id="nid" value="" class="form-control" />
                        </div>
                        <div class="col-sm-12">
                           <br />
                           <label class="mylabel">National ID Number: </label><br />
                           <input type="text" name="nid_number" value="" class="form-control" />
                        </div>
                        <div class="col-sm-12">
                           <br />
                           <label class="mylabel">Passport: </label><br />
                           <input type="file" name="passport" id="pass" value="" class="form-control" />
                        </div>
                        <div class="col-sm-12">
                           <br />
                           <label class="mylabel">Passport Number: </label><br />
                           <input type="text" name="passport_number" value="" class="form-control" />
                        </div>
                     </div>
                     <br />                     
                  </div> 
                  <div class="form-group">
                     <input type="submit" id="docup" name="docup" class="btn btn-success" value="Upload" />
                  </div>
               </form><!-- end of registerFormArea -->
            </div><!-- end of col-md-12 -->
            <div class="col-md-4 formWrapper hidden-xs"></div>
         </div><!-- end of registerAreaContents -->

      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end Register Area section --> 
<script>
   $(document).ready(function() {
      var _URL = window.URL;
      $("#pic").change(function(e) {
         var file, img;
         if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
               if(this.width > 400 || this.height > 500){
                  alert("Profile picture image size is too large. Allow size is Maximum width: 400px and Maximum height: 500px");
                  $("#pic").val("");
               }      
               
            };
            img.src = _URL.createObjectURL(file);
         }
      });
      
      $("#nid").change(function(e) {
         var file, img;
         if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
               if(this.width > 1000 || this.height > 1000){
                  alert("National ID image size is too large. Allow size is Maximum width: 1000px and Maximum height: 1000px");
                  $("#nid").val("");
               }                     
            };
            img.src = _URL.createObjectURL(file);
         }
      });
      
      $("#pass").change(function(e) {
         var file, img;
         if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
               if(this.width > 1000 || this.height > 1000){
                  alert("Passport image size is too large. Allow size is Maximum width: 1000px and Maximum height: 1000px");
                  $("#pass").val("");
               }                     
            };
            img.src = _URL.createObjectURL(file);
         }
      });

      $("#docup").click(function() {
         if (!$("#pic").val()) {
            alert("Please upload picture");
            return false;
         }
         else if (!$("#nid").val() && !$("#pass").val()) {
            alert("Please upload National ID or Passport");
            return false;
         }
      });
   });
</script>