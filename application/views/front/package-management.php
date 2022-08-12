<!DOCTYPE html>
<html class="no-js">

   <head>

      <!-- title -->
      <title><?php echo (isset($title)) ? $title : "Black Box Internet" ?></title>

      <!-- meta tags -->
      <meta charset="utf-8">
      <meta content="width=device-width,initial-scale=1,maximum-scale=1" name="viewport">
      <meta content="HTML Tidy for Linux (vers 25 March 2009), see www.w3.org" name="generator">
      <meta content="Mahmoud Bayomy" name="author">
      <meta content="Here is the whole descrption of the website" name="description">

      <!-- fav icon -->
      <link href="<?php echo base_url(); ?>images/favicon.png" rel="shortcut icon">

      <!-- css => style sheet -->
      <link href="<?php echo base_url(); ?>style.css" media="screen" rel="stylesheet" type="text/css">

      <!-- css => responsive sheet -->
      <link href="<?php echo base_url(); ?>css/responsive.css" media="screen" rel="stylesheet" type="text/css">

      <!-- JQuery => javascript libs -->
      <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>

      <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-migrate-1.2.1.min.js"></script>

      <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>

      <link href="<?php echo base_url(); ?>css/ie.css" media="screen" rel="stylesheet" type="text/css">

      <link type="text/css" media="all" href="css/dddd.css" rel="stylesheet">      
      <script type="text/javascript" src="css/jquery.js.download"></script>
      <script type="text/javascript">
         var rlArgs = {
            "script": "swipebox",
            "selector": "lightbox",
            "customEvents": "",
            "activeGalleries": "1",
            "animation": "1",
            "hideCloseButtonOnMobile": "0",
            "removeBarsOnMobile": "0",
            "hideBars": "1",
            "hideBarsDelay": "5000",
            "videoMaxWidth": "1080",
            "useSVG": "1",
            "loopAtEnd": "0",
            "woocommerce_gallery": "0"
         };
      </script>
      <link rel="stylesheet" type="text/css" href="css/animate.min.css">
   </head>
   <body id="top" class="page" cz-shortcut-listen="true">
      <!--[if lt IE 9]>
           <p class="browsehappy">
             You are using an
             <strong>outdated</strong>
             browser. Please
             <a href="http://browsehappy.com/">upgrade your browser</a>
             to improve your experience.
           </p>
         <![endif]-->

      <div class="loadingContainer">
         <div class="loading">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
         </div><!-- end of loading -->
      </div><!-- end of loading container -->


      <div class="allWrapper">

         <!-- Page Header -->
         <section class="pageHeader section mainSection scrollAnchor darkSection" id="pageHeader">
            <?php
            require_once 'menu.php';
            ?>
         </section><!-- end of Page Header -->




         <div class="container">
            <div class="row">
               <div class="col-sm-12">




                  <div id="container">
                     <div class="step-wizard">
                        <div class="progress">
                           <div class="progressbar empty"></div>
                           <div id="prog" class="progressbar" style="width: 0%;"></div>
                        </div>
                        <ul>
                           <li class="active">
                              <a href="#0"> <span class="step">1</span> <span class="title">Usage</span> </a>
                           </li>
                           <li class="">
                              <a href="#0"> <span class="step">2</span> <span class="title">Devices</span> </a>
                           </li>
                           <li class="">
                              <a href="#0"> <span class="step">3</span> <span class="title">Data Consumed</span> </a>
                           </li>
                           <li class="">
                              <a href="#0"> <span class="step">4</span> <span class="title">Packages</span> </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="full-content">
                     <div class="bw-con-area step-one active">
                        <h5> Select your type</h5>
                        <ul>
                           <li>
                              <input type="radio" name="amount" value="40" id="one">
                              <label for="one"><img src="css/icon-home.svg" alt="">
                                 <br>Home </label>
                           </li>
                           <li>
                              <input type="radio" name="amount" value="60" id="two">
                              <label for="two"><img src="css/icon-office.svg" alt="">
                                 <br>Business</label>
                           </li>
                        </ul>
                     </div>
                     <div class="bw-con-area step-two">
                        <h5>Select number of usage devices</h5>
                        <ul>
                           <li><img src="css/icon-computer.svg" alt="">
                              <br>Laptop
                              <div class="increment-btn">
                                 <input type="button" value="-" class="qtyminus" field="quantity-laptop">
                                 <input type="text" name="quantity-laptop" value="0" class="qty">
                                 <input type="button" value="+" class="qtyplus" field="quantity-laptop">
                              </div>
                           </li>
                           <li><img src="css/icon-phone.svg" alt="">
                              <br>Cell Phone
                              <div class="increment-btn">
                                 <input type="button" value="-" class="qtyminus" field="quantity-cell">
                                 <input type="text" name="quantity-cell" value="0" class="qty">
                                 <input type="button" value="+" class="qtyplus" field="quantity-cell">
                              </div>
                           </li>
                           <li><img src="css/icon-smart-tv.svg" alt="">
                              <br>Smart TV
                              <div class="increment-btn">
                                 <input type="button" value="-" class="qtyminus" field="quantity-smart-tv">
                                 <input type="text" name="quantity-smart-tv" value="0" class="qty">
                                 <input type="button" value="+" class="qtyplus" field="quantity-smart-tv">
                              </div>
                           </li>
                        </ul>
                     </div>
                     <div class="bw-con-area step-three">
                        <h5>Select data usage volume</h5>
                        <div class="section data-result-area">
                           <h6>Monthly Unit Usage:<output id="final-output" for="fader"></output></h6>
                           <h6>Monthly Total Usage:<output id="suggested-package" for="fader"></output></h6></div>
                        <ul>
                           <li>
                              <h6>Social Site/Web Page: <span class="bw-outpt" id="browsing-output"></span></h6>
                              <input type="range" min="0" max="4" value="0" id="browsing" step="1" list="browsing-data" oninput="outputUpdate(this.id, value)">
                              <ul class="legend">
                                 <li style="visibility:hidden">0</li>
                                 <li>250
                                    <br>Pages</li>
                                 <li>500
                                    <br>Pages</li>
                                 <li>1000
                                    <br>Pages</li>
                                 <li>2000
                                    <br>Pages</li>
                              </ul>
                              <br>
                              <datalist id="browsing-data">
                                 <option>0 KB</option>
                                 <option>250 MB</option>
                                 <option>500 MB</option>
                                 <option>1000 MB</option>
                                 <option>1.95 GB</option>
                              </datalist>
                           </li>
                           <li>
                              <h6>Songs: <span class="bw-outpt" id="songs-output"></span></h6>
                              <input type="range" min="0" max="4" value="0" id="songs" step="1" list="songs-data" oninput="outputUpdate(this.id, value)">
                              <ul class="legend">
                                 <li style="visibility:hidden">0</li>
                                 <li>100
                                    <br>Songs</li>
                                 <li>200
                                    <br>Songs</li>
                                 <li>300
                                    <br>Songs</li>
                                 <li>500
                                    <br>Songs</li>
                              </ul>
                              <br>
                              <datalist id="songs-data">
                                 <option>0 KB</option>
                                 <option>142.50 MB</option>
                                 <option>285 MB</option>
                                 <option>427.50 MB</option>
                                 <option>570 MB</option>
                              </datalist>
                           </li>
                           <li>
                              <h6>Online Gaming: <span class="bw-outpt" id="gaming-output"></span></h6>
                              <input type="range" min="0" max="4" value="0" id="gaming" step="1" list="gaming-data" oninput="outputUpdate(this.id, value)">
                              <ul class="legend">
                                 <li style="visibility:hidden">0</li>
                                 <li>10
                                    <br>Hours</li>
                                 <li>25
                                    <br>Hours</li>
                                 <li>50
                                    <br>Hours</li>
                                 <li>100
                                    <br>Hours</li>
                              </ul>
                              <br>
                              <datalist id="gaming-data">
                                 <option>0 KB</option>
                                 <option>200 MB</option>
                                 <option>500 MB</option>
                                 <option>1000 MB</option>
                                 <option>1.95 GB</option>
                              </datalist>
                           </li>
                           <li>
                              <h6>Streaming HD: <span class="bw-outpt" id="shd-output"></span></h6>
                              <input type="range" min="0" max="4" value="0" id="shd" step="1" list="shd-data" oninput="outputUpdate(this.id, value)">
                              <ul class="legend">
                                 <li style="visibility:hidden">0</li>
                                 <li>10
                                    <br>Hours</li>
                                 <li>50
                                    <br>Hours</li>
                                 <li>75
                                    <br>Hours</li>
                                 <li>200
                                    <br>Hours</li>
                              </ul>
                              <br>
                              <datalist id="shd-data">
                                 <option>0 KB</option>
                                 <option>25.74 GB</option>
                                 <option>128.71 GB</option>
                                 <option>193.07 GB</option>
                                 <option>514.84 GB</option>
                              </datalist>
                           </li>
                        </ul>
                     </div>
                     <div class="bw-con-area">
                        <div class="package-section">
                           <ul>
                              <li id="package-11" class="wow fadeInUp" data-wow-delay="0.1s" style="display: none;">
                                 <div class="package-name"> Freedom</div>
                                 <div class="package-short-deatails"> <strong>3</strong>
                                    <div class="dis-area"><i>Mbps</i><em>dedicated</em><span>Unlimited traffic</span></div>
                                 </div>
                                 <div class="package-price"> 1,499 <strong>Tk/mo</strong></div>
                                 <div> <a href="http://www.dozeinternet.com/contact-us/?your-subject=Freedom&amp;your-recipient=Sales" class="ani_button more-btn"><span>get now</span></a></div>
                              </li>
                              <li id="package-19" class="wow fadeInUp" data-wow-delay="0.2s" style="display: none;">
                                 <div class="package-name"> Freedom +</div>
                                 <div class="package-short-deatails"> <strong>5</strong>
                                    <div class="dis-area"><i>Mbps</i><em>dedicated</em><span>Unlimited traffic</span></div>
                                 </div>
                                 <div class="package-price"> 2,499 <strong>Tk/mo</strong></div>
                                 <div> <a href="http://www.dozeinternet.com/contact-us/?your-subject=Freedom+%2B&amp;your-recipient=Sales" class="ani_button more-btn"><span>get now</span></a></div>
                              </li>
                              <li id="package-24" class="wow fadeInUp" data-wow-delay="0.3s" style="display: none;">
                                 <div class="package-name"> Best Match</div>
                                 <div class="package-short-deatails"> <strong>8</strong>
                                    <div class="dis-area"><i>Mbps</i><em>dedicated</em><span>Unlimited traffic</span></div>
                                 </div>
                                 <div class="package-price"> 3,499 <strong>Tk/mo</strong></div>
                                 <div> <a href="http://www.dozeinternet.com/contact-us/?your-subject=Best+Match&amp;your-recipient=Sales" class="ani_button more-btn"><span>get now</span></a></div>
                              </li>
                              <li id="package-26" class="wow fadeInUp" data-wow-delay="0.1s" style="display: none;">
                                 <div class="package-name"> Speed</div>
                                 <div class="package-short-deatails">
                                    <h6>80<sup>gb</sup></h6>
                                    <div class="dis-area-speedtx"><strong>10</strong>
                                       <div><i>Mbps</i><em>dedicated</em></div>
                                    </div>
                                 </div>
                                 <div class="package-price"> 1,499 <strong>Tk/mo</strong></div>
                                 <div> <a href="http://www.dozeinternet.com/contact-us/?your-subject=Speed&amp;your-recipient=Sales" class="ani_button more-btn"><span>get now</span></a></div>
                              </li>
                              <li id="package-28" class="wow fadeInUp" data-wow-delay="0.2s" style="display: none;">
                                 <div class="package-name"> Speed +</div>
                                 <div class="package-short-deatails">
                                    <h6>150<sup>gb</sup></h6>
                                    <div class="dis-area-speedtx"><strong>10</strong>
                                       <div><i>Mbps</i><em>dedicated</em></div>
                                    </div>
                                 </div>
                                 <div class="package-price"> 2,499 <strong>Tk/mo</strong></div>
                                 <div> <a href="http://www.dozeinternet.com/contact-us/?your-subject=Speed+%2B&amp;your-recipient=Sales" class="ani_button more-btn"><span>get now</span></a></div>
                              </li>
                              <li id="package-30" class="wow fadeInUp" data-wow-delay="0.3s" style="display: none;">
                                 <div class="package-name"> Premium</div>
                                 <div class="package-short-deatails">
                                    <h6>500<sup>gb</sup></h6>
                                    <div class="dis-area-speedtx"><strong>25</strong>
                                       <div><i>Mbps</i><em>dedicated</em></div>
                                    </div>
                                 </div>
                                 <div class="package-price"> 4,499 <strong>Tk/mo</strong></div>
                                 <div> <a href="http://www.dozeinternet.com/contact-us/?your-subject=Premium&amp;your-recipient=Sales" class="ani_button more-btn"><span>get now</span></a></div>
                              </li>
                           </ul>
                        </div>
                        <h5>Bandwidth estimation is based on your individual activities. You can choose any other <a href="http://www.dozeinternet.com/doze-packages/">packages</a> we have.</h5></div>
                  </div>
                  <div class="buttons">
                     <button class="btn" id="prev" disabled="">prev</button>
                     <button class="btn" id="next" style="display: inline;">next</button>
                  </div>

               </div>
            </div>
         </div>





         <script type="text/javascript">
            var summation = 0; //Total Bandwidth
            jQuery('.fadeInUp').css('display', 'none');

            function outputUpdate(target, value) {
               // Individual slider Bandwidth Calculation
               document.querySelector('#' + target + '-output').innerHTML = document.querySelector('#' + target + '-data').options[parseInt(value)].innerHTML;
               // Total Bandwidth Calculation and outpuot
               summation = 0;
               //			console.log( document.querySelector('.bw-outpt') );
               var divs = document.querySelectorAll('.bw-outpt');

               [].forEach.call(divs, function(div) {
                  var tmp = parseFloat(div.innerHTML);
                  if (tmp > 0) {
                     if (/GB$/.test(div.innerHTML)) {
                        tmp *= 1000; // Convert GB data into MB for calculation easeness
                     }
                     summation += tmp;
                  }

               });
               //Output total calculated output with Unit (MB/GB)
               document.querySelector('#final-output').value = ((summation / 1000) < 1) ? summation + ' MB' : parseFloat(summation / 1000).toFixed(2) + ' GB';
               calculateTotal();
            }

            function calculateTotal() {
               /* 
                Laptop is considered as single Unit - 1
                Mobile (cell-phone)  as half		- .5
                Smart Tv 			 as double		- 2
                */
               laptop = parseInt(document.querySelector('input[name="quantity-laptop"]').value);
               mobile = parseInt(document.querySelector('input[name="quantity-cell"]').value) * .5;
               tv = parseInt(document.querySelector('input[name="quantity-smart-tv"]').value) * 2;
               totalConsumingDevice = laptop + mobile + tv;
               totalBWConsumtion = totalConsumingDevice * summation;

               document.querySelector('#suggested-package').value = ((totalBWConsumtion / 1000) < 1) ? totalBWConsumtion + ' MB' : parseFloat(totalBWConsumtion / 1000).toFixed(2) + ' GB';

               /*
                Selecting packages based on given rules:
                
                Content		Options				Condition			Priority
                Streaming	8 Mbps Unlimited	Volume >150			1
                10 Mbps 80 GB		Volume <80	
                10 Mbps 150 GB		80 <Volume> 150	
                Online Gaming	5 Mbps Unlimited	Volume >150			2
                10 Mbps 80 GB		Volume <80	
                10 Mbps 150 GB		80 <Volume> 150	
                Social Site+ web page	3 Mbps Unlimited						3
                
                */
               jQuery('.fadeInUp').css('display', 'none');

               if (jQuery('#shd').val() > 0) { //Streaming is selected - Priority 1
                  if (totalBWConsumtion > 150000) {
                     jQuery('#package-24').css('display', 'inline-block');
                  } else if (totalBWConsumtion < 80000) {
                     jQuery('#package-26').css('display', 'inline-block');
                  } else {
                     jQuery('#package-28').css('display', 'inline-block');
                  }
               } else if (jQuery('#gaming').val() > 0) { //Online Gaming is selected - Priority 2
                  if (totalBWConsumtion > 150000) {
                     jQuery('#package-19').css('display', 'inline-block');
                  } else if (totalBWConsumtion < 80000) {
                     jQuery('#package-26').css('display', 'inline-block');
                  } else {
                     jQuery('#package-28').css('display', 'inline-block');
                  }
               } else { // Social Site+ web page	3 Mbps Unlimited - Priority 3
                  jQuery('#package-11').css('display', 'inline-block');
               }
            } //end function calculateTotal
         </script>
         <script type="text/javascript">
            var a3_lazyload_extend_params = {
               "edgeY": "300"
            };
            var a3_lazyload_extend_params = {
               "edgeY": "300"
            };
         </script>

         <?php require_once 'footer.php'; ?>
      </div>


      <script type="text/javascript" defer="" src="css/opt.js"></script>

      <!-- JavaScript Files ================================================== -->
      <script src="<?php echo base_url(); ?>js/compiler.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>js/scripts.js" type="text/javascript"></script>

      <!-- BootStrap JavaScript ================================================== -->
      <script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>
   </body>

</html>