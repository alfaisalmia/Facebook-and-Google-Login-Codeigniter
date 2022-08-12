<!-- Pricing -->
<section class="pricing section mainSection scrollAnchor lightSection" id="pricing">
   <div class="sectionWrapper">
      <div class="container">
         <div class="row">

            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Shared Packages
                  <span class="generalBorder"></span>
               </h2>
            </div><!-- end of section title -->
            <?php
            $c = 0;
            foreach ($allPackage as $value) {
               $c++;
               ?>
               <div class="col-md-3">
                  <div class="pricingTable">
                     <header class="pricingHeader clearfix">
                        <h3 class="pricingTitle planTitle">
                           <?php echo $value->name ?>
                           <br>                      
                        </h3>                    
                     </header><!-- end pricing header -->
                     <div class="pricebox">
                        <span class="price-amount">
                           <span class="currency">Tk.</span> <?php echo $value->price ?>
                        </span>
                        <span class="per-month">Per month</span>
                     </div>
                     <ul class="pricingBody planBody">
                        <li>                      
                           <span><?php echo $value->speed1 ?></span>
                           <?php echo $value->time1 ?>
                        </li>
                        <li>                      
                           <span><?php echo $value->speed2 ?></span>
                           <?php echo $value->time2 ?>
                        </li>
                        <li>                      
                           <span><?php echo $value->yt ?></span>
                           Youtube Speed
                        </li>
                        <li>                      
                           <span><?php echo $value->bdix ?></span>
                           FTP/BDIXServer Speed
                        </li>
                        <li>
                           <p>Unlimited Movies</p>
                        </li>
                        <li>
                           <p>Unlimited Games</p>
                        </li>
                        <li>
                           <p>24/7 Call Centre</p>
                        </li>
                        <li>
                           <p>24/7 Online Support</p>
                        </li>
                        <li class="clearfix">
                        <center>
                           <p><a class="generalLink orderNow" href="<?php echo base_url() . "package-order/{$value->id}"; ?>" title="Order it Now">Order it Now</a></p>
                        </center>
                        </li>
                     </ul><!-- end pricing body -->
                  </div><!-- end of pricing table -->
               </div>

               <?php
               if ($c == 4) {
                  break;
               }
            }
            ?>



         </div><!-- end of row-->
      </div><!-- end of container -->
      <br /><br /><br />
      <div class="container">
         <div class="row">            
            <div class="col-md-12 sectionTitle">
               <h2 class="sectionHeader">
                  Dedicated Packages
                  <span class="generalBorder"></span>
               </h2>
            </div><!-- end of section title -->
            <?php
            $c = 0;
            foreach ($allPackage as $value) {
               $c++;
               if ($c > 4) {
               ?>
               <div class="col-md-4">
                  <div class="pricingTable">
                     <header class="pricingHeader clearfix">
                        <h3 class="pricingTitle planTitle">
                           <?php echo $value->name ?>
                           <br>                      
                        </h3>                    
                     </header><!-- end pricing header -->
                     <div class="pricebox">
                        <span class="price-amount">
                           <span class="currency">Tk.</span> <?php echo $value->price ?>
                        </span>
                        <span class="per-month">Per month</span>
                     </div>
                     <ul class="pricingBody planBody">
                        <li>                      
                           <span><?php echo $value->speed1 ?></span>
                           <?php echo $value->time1 ?>
                        </li>                        
                        <li>                      
                           <span><?php echo $value->yt ?></span>
                           Youtube Speed
                        </li>
                        <li>                      
                           <span><?php echo $value->bdix ?></span>
                           FTP/BDIXServer Speed
                        </li>
                        <li>
                           <p>Unlimited Movies</p>
                        </li>
                        <li>
                           <p>Unlimited Games</p>
                        </li>
                        <li>
                           <p>24/7 Call Centre</p>
                        </li>
                        <li>
                           <p>24/7 Online Support</p>
                        </li>
                        <li class="clearfix">
                        <center>
                           <p><a class="generalLink orderNow" href="<?php echo base_url() . "package-order/{$value->id}"; ?>" title="Order it Now">Order it Now</a></p>
                        </center>
                        </li>
                     </ul><!-- end pricing body -->
                  </div><!-- end of pricing table -->
               </div>

               <?php
               
               }
            }
            ?>



         </div><!-- end of row-->
      </div><!-- end of container -->
   </div><!-- end of section wrapper -->
</section><!-- end of pricing section -->