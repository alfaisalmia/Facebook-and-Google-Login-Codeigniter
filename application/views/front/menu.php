<?php $mytype = $this->session->userdata("mytype"); ?>
<header class="header headerStyle5" id="header">
   <div class="sticky scrollHeaderWrapper">
      <div class="container">
         <div class="row">

            <div class="logoWrapper">
               <h1 class="logo">
                  <a class="clearfix" href="<?php echo base_url() ?>" title="7 Seven Host">
                     <img src="<?php echo base_url() ?>images/logo.png" class="img-responsive" />
                  </a>
               </h1><!-- end of logo -->
            </div><!-- end of logoWrapper -->

            <nav class="mainMenu mainNav" id="mainNav">
               <ul class="navTabs">
                  <li><a href="<?php echo base_url() ?>"<?php if($menu=='home') echo ' class="active"'; ?>>Home</a></li>
                  <li><a href="<?php echo base_url() ?>packages"<?php if($menu=='packages') echo ' class="active"'; ?>>Packages</a></li>
                  <li><a href="<?php echo base_url() ?>coverage-area"<?php if($menu=='coverage-area') echo ' class="active"'; ?>>Coverage Area</a></li>
                  <li><a href="<?php echo base_url() ?>referral"<?php if($menu=='referral') echo ' class="active"'; ?>>Referral</a></li>
                              
                  <?php
                  if ($mytype == 'e' || $mytype == 'a') {
                     ?>
                     <li><a href="#" <?php if($menu=='management') echo ' class="active"'; ?>>Management</a>
                        <ul class="dropDown sub-menu">
                           <li><a href="<?php echo base_url() ?>payment-management"<?php if(isset($menu1) && $menu1=='payment') echo ' class="active"'; ?>>Payment</a></li>
                           <?php
                              if ($mytype == 'a') {
                           ?>
                           <li><a href="<?php echo base_url() ?>billing-management"<?php if(isset($menu1) && $menu1=='billing') echo ' class="active"'; ?>>Billing</a></li>
                           <li><a href="<?php echo base_url() ?>package-management"<?php if(isset($menu1) && $menu1=='package') echo ' class="active"'; ?>>Package</a></li>
                              <?php } ?>
                           <li><a href="<?php echo base_url() ?>clients-management"<?php if(isset($menu1) && $menu1=='clients') echo ' class="active"'; ?>>Clients</a></li>
                           <li><a href="<?php echo base_url() ?>slider-management"<?php if(isset($menu1) && $menu1=='slider') echo ' class="active"'; ?>>Slider</a></li>
                           <li><a href="<?php echo base_url() ?>logo-management"<?php if(isset($menu1) && $menu1=='logo') echo ' class="active"'; ?>>Logo</a></li>
                           <li><a href="<?php echo base_url() ?>change-password"<?php if(isset($menu1) && $menu1=='change-password') echo ' class="active"'; ?>>Change Password</a></li>
                           <li><a href="<?php echo base_url() ?>logout">Logout</a></li>
                        </ul>
                     </li>
                     <?php
                  }
                  if ($mytype == NULL) {
                     ?>
                     <li><a href="#"<?php if($menu=='contact') echo ' class="active"'; ?>>Contact Us</a></li>      
                     <li><a href="<?php echo base_url() ?>self-care" class="self-care">Self-Care</a></li>
                     <?php
                  } else {
                     if ($mytype == 'c') {
                     ?>
                     <li><a href="#" <?php if($menu=='account') echo ' class="active"'; ?>>Account</a>
                        <ul class="dropDown sub-menu">
                           <li><a href="<?php echo base_url() ?>profile"<?php if(isset($menu1) && $menu1=='profile') echo ' class="active"'; ?>>Profile</a></li>
                           <li><a href="<?php echo base_url() ?>billing"<?php if(isset($menu1) && $menu1=='billing') echo ' class="active"'; ?>>Billing</a></li>
                           <li><a href="<?php echo base_url() ?>profile/lager"<?php if(isset($menu1) && $menu1=='lager') echo ' class="active"'; ?>>Lager</a></li>
                           <li><a href="<?php echo base_url() ?>myreferral"<?php if(isset($menu1) && $menu1=='referral') echo ' class="active"'; ?>>My Referral</a></li>
                           <li><a href="<?php echo base_url() ?>paynow"<?php if(isset($menu1) && $menu1=='paynow') echo ' class="active"'; ?>>Pay Now</a></li>
                           <li><a href="<?php echo base_url() ?>change-password"<?php if(isset($menu1) && $menu1=='change-password') echo ' class="active"'; ?>>Change Password</a></li>
                           <li><a href="<?php echo base_url() ?>logout">Logout</a></li>
                        </ul>
                     </li> 
                     <?php
                     }
                     ?>
                     <li><a href="#"<?php if($menu=='contact-us') echo ' class="active"'; ?>>Contact Us</a></li>      
                     <?php
                  }
                  ?>
               </ul><!-- end of nav tabs -->
            </nav><!-- end of main nav -->

            <a href="#" class="generalLink" id="responsiveMainNavToggler"><i class="fa fa-bars"></i></a>
            <div class="clearfix"></div><!-- end of clearfix -->
            <div class="responsiveMainNav"></div><!-- end of responsive main nav -->

         </div><!-- end of row -->
      </div><!-- end of container -->
   </div><!-- end of sticky -->
</header>