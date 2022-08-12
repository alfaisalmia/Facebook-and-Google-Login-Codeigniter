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
      <meta name="google-site-verification" content="-d6HuP_Bt38O_WRDQc0OGwqbOmKsB-297akuTm3Yvto" />

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
      
   </head>

   <body id="top" class="page">

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
               require_once 'front/menu.php';
            ?>
         </section><!-- end of Page Header -->

         <?php
         if (isset($content)) {
            echo $content;
         }
         ?>

         <?php require_once 'front/footer.php'; ?>

      </div><!-- end of all wrapper -->



      <!-- JavaScript Files ================================================== -->
      <script src="<?php echo base_url(); ?>js/compiler.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>js/scripts.js" type="text/javascript"></script>

      <!-- BootStrap JavaScript ================================================== -->
      <script src="<?php echo base_url(); ?>js/bootstrap.js" type="text/javascript"></script>

   </body>
</html>
