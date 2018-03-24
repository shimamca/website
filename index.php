<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("includes/classes/Banner.cls.php");
require_once("includes/classes/News.cls.php");
require_once("includes/classes/kavita.cls.php");
require_once("includes/classes/PhotoGalleries.cls.php");

$db = new SiteData();
$bannerObj = new Banner();
$newsObj = new News();
$kavitaObj = new Kavita();
$phoObj = new PhotoGalleries();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title><?=PAGE_TITLE?> | Events</title>
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
	
	<!-- Owl Carousel Assets -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
  	
	<!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
	
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css"  type="text/css">
		
</head>

<body class="index-page">
<header>
	<!--Top-->
	<?php include("includes/header.php");?>
	<!--Home Slider-->
	<?php include("includes/slide.php");?>
</header>
	
	<!--Navigation-->
    <?php include("includes/nav.php");?>
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page">
		<div class="clearfix no-gutter">
			<div id="main-content" class="col-md-9 fix-right">
				<?php include("includes/events.php");?>
				<div class="fixclear">&nbsp;</div>
				<?php include("includes/article.php");?>
				<div class="fixclear">&nbsp;</div>
				<?php include("includes/poem.php");?>
				<div class="fixclear">&nbsp;</div>
			</div>
			
			<div id="sidebar" class="col-md-3 fix-left">
				<!--Sidebar Left-->
				<?php include("includes/sidebar.php");?>
			</div>

	<!--Footer-->
	<?php include("includes/footer.php");?>
	<!-- Footer -->
	
	<!-- JS -->
	<!-- jQuery and Modernizr-->
	<script src="js/jquery-2.1.1.js"></script>
	
	<!-- Core JavaScript Files -->  	 
    <script src="js/bootstrap.min.js"></script>
	
	<script src="owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-slide").owlCarousel({
       autoPlay: 3000,
			items : 4,
			itemsDesktop : [1199,4],
			itemsDesktopSmall : [979,3],
			itemsTablet : [768, 2],
			itemsMobile : [479, 1],
			navigation: true,
			navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
			pagination: false
      });
    });
    </script>
	

</body>
</html>
