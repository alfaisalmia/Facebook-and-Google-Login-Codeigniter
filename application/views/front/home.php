<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <title>Black Box Internet</title>
      <meta charset="utf-8">
      <meta content="width=device-width,initial-scale=1,maximum-scale=1" name="viewport">
      <meta content="" name="keyword">
      <meta content="Sk Abul Hasan" name="author">
      <meta name="google-site-verification" content="-d6HuP_Bt38O_WRDQc0OGwqbOmKsB-297akuTm3Yvto" />
      <meta content="Here is the whole descrption of the website" name="description">
      <link href="<?php echo base_url(); ?>images/favicon.png" rel="shortcut icon">
      <link href="<?php echo base_url(); ?>style.css" media="screen" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>css/responsive.css" media="screen" rel="stylesheet" type="text/css">
      <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-migrate-1.2.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
      <link href="<?php echo base_url(); ?>css/ie.css" media="screen" rel="stylesheet" type="text/css">
   </head>

   <body id="top" class="style-5">
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

         <!-- Slider -->
         <section class="slider section mainSection scrollAnchor darkSection" id="slider">

            <div id="mainSlider" class="mainSlider homeSlider_1  owl-carousel sliderStyle1">
               <?php
               $c = 1;
               foreach ($allSlider as $value) {
                  ?>
                  <div id="slide<?php echo $c++; ?>" class="item slide">
                     <div class="cover"></div><!-- end of cover -->
                     <img  src="<?php echo base_url() . "images/large-slider/slider-{$value->id}.{$value->large_img}" ?>" title="<?php echo $value->title ?>" alt="<?php echo $value->title ?>">
                     <div class="captions clearfix">

                        <div class="container">
                           <div class="row clearfix">
                              <div class="col-md-6 slideContents fl">
                                 <h2 class="animated"><?php echo $value->title ?> </h2>
                                 <p class="animated"><?php echo $value->description ?></p>
                                 <p class="links animated">
                                    <a class="animated link sliderLinks light details" href="#" title="More Details">Hotline</a>
                                    <a class="animated link sliderLinks light join" href="#" title="Join Us Now">01674086310, 01674086310</a>
                                 </p><!-- end of links -->
                              </div><!-- end of side contents -->

                              <div class="col-md-6 slideContents animated">
                                 <div class="factsImg">
                                    <div class="imacWrapper">

                                       <img class="imac"  src="<?php echo base_url() . "images/small-slider/slider-{$value->id}.{$value->small_img}" ?>" title="<?php echo $value->title ?>" alt="<?php echo $value->title ?>">
                                    </div>
                                 </div><!-- end of fact img -->
                              </div><!-- end of side contents -->   
                           </div><!-- end of row -->
                        </div><!-- end of container -->



                     </div><!-- end of captions -->
                  </div><!-- end of slide -->
                  <?php
               }
               ?>


            </div><!-- end of main slider -->


         </section><!-- end of slider -->

         <?php
         require_once 'menu.php';
         ?>

         <!-- Welcome -->
         <section class="welcome section mainSection scrollAnchor graySection" id="welcome">
            <div class="sectionWrapper">
               <div class="container">
                  <div class="row">

                     <div class="col-md-12 sectionTitle">
                        <h2>How much speed do you need?</h2>
                        <p>The Download Speed Calculator estimates how much speed you’ll need to run every activity on all devices at the same time. It’s easy!</p>
                        <p class="links animated">
                           <a class="generalLink lg" href="<?php echo base_url() ?>estimate-bandwidth">Estimate of what you need!</a>
                        </p>
                     </div><!-- end of section title -->

                  </div><!-- end of row-->
               </div><!-- end of container -->
            </div><!-- end of section wrapper -->
         </section><!-- end welcome section -->

         <!-- Pricing -->
         <section class="pricing section mainSection scrollAnchor lightSection" id="pricing">

            <div class="sectionWrapper">
               <div class="container">

                  <div class="row">

                     <div class="col-md-12 sectionTitle">
                        <h2 class="sectionHeader">
                           Welcome to Black Box Internet
                           <span class="generalBorder"></span>
                        </h2><!-- end of sectionHeader -->
                        <p>Black Box Internet is an Internet Service Provider having license from BTRC. Unique service and Customer satisfaction is our concern. </p>
                     </div><!-- end of section title -->

                  </div><!-- end of row -->

                  <div class="row">
                     <div class="servicesCarousel carousel owl-carousel servicesGallary">

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">Coverage Map</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-1"></div>
                              </div>
                              <p class="servicesDescription">Find Black Box Internet coverage status and sale center of your location now</p>
                              <a class="readMore generalLink" href="<?php echo base_url() ?>coverage-area">Read More</a>
                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">Online Movie</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-2"></div>
                              </div>
                              <p class="servicesDescription">Black Box Internet offers thousands of movies with more than 30 mbps download speed</p>
                              <?php
                              if (get_client_ip() == $myip) {
                                 echo "<a class='readMore generalLink' href='http://10.100.100.4/' target='_blank'>Watch Movie</a>";
                              } else {
                                 echo "<a class='readMore generalLink' href='#'>Read More</a>";
                              }
                              ?>

                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">24 / 7 Live Support</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-3"></div>
                              </div>
                              <p class="servicesDescription">Black Box Internet offers 24 / 7 Live Support to all of our customers. Hotline: +8801674086310</p>
                              <a class="readMore generalLink" href="#">Read More</a>
                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">Black Box App</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-4"></div>
                              </div>
                              <p class="servicesDescription">Manage your connection, pay bills , Usage history & Complains from your mobile</p>
                              <a class="readMore generalLink" href="#">Coming Soon</a>
                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">Domain &amp; Hosting</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-5"></div>
                              </div>
                              <p class="servicesDescription">Black Box Internet presents safe & secure web hosting services for your websites with domain registration</p>
                              <a class="readMore generalLink" href="<?php echo base_url() ?>domain-hosting">Read More</a>
                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">Software Development</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-6"></div>
                              </div>
                              <p class="servicesDescription">We offers one stop solution for Web Design, Software Development & E-Commerce Solutions</p>
                              <a class="readMore generalLink" href="<?php echo base_url() ?>software-development">Read More</a>
                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">BDIX Server</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-7"></div>
                              </div>
                              <p class="servicesDescription">We have GBPS Connectivity with our IIG, this is the reason all of our Clients get more 10 GB speeds BDIX</p>
                              <?php
                              if (get_client_ip() != $myip) {
                                 echo "<a class='readMore generalLink' href='#' data-toggle='modal' data-target='#bdix'>Read More</a>";
                              } else {
                                 echo "<a class='readMore generalLink' href='#'>Read More</a>";
                              }
                              ?>

                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                        <div class="col-md-3 col-sm-6 item service singleServiceWrapper">
                           <div class="singleService">
                              <h3 class="serviceName">Live TV</h3>
                              <div class="serviceIcon">
                                 <div class="servicesIconBase servicesBg-8"></div>
                              </div>
                              <p class="servicesDescription">We have our Live TV Server, currently we are proving only 3 HD channels & more than 6 TV Channels</p>
                              <a class="readMore generalLink" href="#" data-toggle="modal" data-target="#liveTV">Read More</a>
                           </div><!-- end of single service -->
                        </div><!-- end of single service wrapper -->

                     </div><!-- end of services gallary -->

                  </div><!-- end of row -->
               </div><!-- end of container -->
            </div><!-- end of section wrapper -->
         </section><!-- end of pricing section -->

         <?php require_once 'footer.php'; ?>         
      </div><!-- end of all wrapper -->




      <!-- Live TV Modal Start -->
      <div class="modal fade" id="liveTV" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Live TV Channel</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-sm-4">
                        <a href="http://www.bdixbd.com/" target="_blank">
                           <img src="<?php echo base_url() ?>images/tv.jpg" class="img-responsive" />
                           <center class="tv-channel">BDIX BD</center>
                        </a>
                     </div>
                     <div class="col-sm-4">
                        <a href="http://www.bioscopelive.com/" target="_blank">
                           <img src="<?php echo base_url() ?>images/tv.jpg" class="img-responsive" />
                           <center class="tv-channel">Bioscope Live</center>
                        </a>
                     </div>
                     <div class="col-sm-4">
                        <a href="http://www.jagobd.com/" target="_blank">
                           <img src="<?php echo base_url() ?>images/tv.jpg" class="img-responsive" />
                           <center class="tv-channel">Jago BD</center>
                        </a>
                     </div>
                  </div>
                  <?php
                  if (get_client_ip() == $myip) {
                     ?>
                     <br /><br />
                     <div class="row">
                        <div class="col-sm-4">
                           <a href="http://www.ihub.live/" target="_blank">
                              <img src="<?php echo base_url() ?>images/tv.jpg" class="img-responsive" />
                              <center class="tv-channel">Ihub</center>
                           </a>
                        </div>
                        <div class="col-sm-4">
                           <a href="http://www.ebox.live/" target="_blank">
                              <img src="<?php echo base_url() ?>images/tv.jpg" class="img-responsive" />
                              <center class="tv-channel">Ebox</center>
                           </a>
                        </div>
                        <div class="col-sm-4">
                           <a href="" target="_blank">
                              <img src="<?php echo base_url() ?>images/tv.jpg" class="img-responsive" />
                           </a>
                        </div>
                     </div>
                     <?php
                  }
                  ?>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Live TV Modal End -->


      <!-- BDIX Modal Start -->
      <div class="modal fade" id="bdix" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">BDIX Torrent Server</h4>
               </div>
               <div class="modal-body">
                  <?php
                  if (get_client_ip() != $myip) {
                     ?>
                     <br /><br />
                     <div class="row">
                        <div class="col-sm-4">
                           <a href="http://www.ontohinbd.com/" target="_blank">
                              <img src="<?php echo base_url() ?>images/torrent.png" class="img-responsive" />
                              <center class="tv-channel">Ontohin BD</center>
                           </a>
                        </div>
                        <div class="col-sm-4">
                           <a href="http://www.crazyhd.com/" target="_blank">
                              <img src="<?php echo base_url() ?>images/torrent.png" class="img-responsive" />
                              <center class="tv-channel">Crazy HD</center>
                           </a>
                        </div>
                        <div class="col-sm-4">
                           <a href="http://www.torrent5.com/" target="_blank">
                              <img src="<?php echo base_url() ?>images/torrent.png" class="img-responsive" />
                              <center class="tv-channel">Torrent5</center>
                           </a>
                        </div>
                     </div>
                     <?php
                  }
                  ?>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- BDIX Modal End -->

      <!-- JavaScript Files ================================================== -->
      <script src="<?php echo base_url(); ?>js/compiler.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>js/scripts.js" type="text/javascript"></script>

      <!-- BootStrap JavaScript ================================================== -->
      <script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>

   </body>
</html>
