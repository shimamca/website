<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("includes/classes/PhotoGalleries.cls.php");
$db = new SiteData();
$phoObj = new PhotoGalleries();

$res = $phoObj->getPhotos(67); 
$total = $res['NO_OF_ITEMS'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title><?=PAGE_TITLE?> | Media</title>
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
	<!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css"  type="text/css">
	
	<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
		
	<style type="text/css">
	#gallery {	width: 100%; }
	#gallery ul { margin:0; padding:0;list-style: none; }
	#gallery ul li {margin:0; padding:0; display: inline; }
	#gallery ul li img {
		border: 1px solid #CCCCCC;padding: 1px;margin-left:0px;
		margin-bottom:10px; margin-right:8px;
		box-shadow: 0px 0px 5px 0px #555555;
		-webkit-box-shadow: 0px 0px 5px 0px #555555;
		-moz-box-shadow: 0px 0px 5px 0px #555555;
	}
	#gallery ul li img:hover {
		box-shadow: 0px 0px 5px 0px #111111;
		-webkit-box-shadow: 0px 0px 5px 0px #111111;
		-moz-box-shadow: 0px 0px 5px 0px #111111;
	}
	#gallery ul a:hover { color: #fff; }
	</style>
</head>

<body class="index-page">
<header>
	<!--Top-->
	<?php include("includes/header.php");?>
	
</header>
	
	<!--Navigation-->
    <?php include("includes/nav.php");?>
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page">
		<div class="clearfix no-gutter">
			<div class="col-md-9 fix-right">
				
<div class="col-md-12">
<div class="col-sm-12">
			<div class="tag-title">
					<h2>Media Gallery</h2>
				</div>
							 <div id="gallery" align="left">
        <ul>
		<?php			
for($i=0;$i<$total;$i++) { 
$id = $res['oDATA'][$i]['photo_id'];
$photo_caption = outText($res['oDATA'][$i]['photo_caption']);
$photo_file = outText($res['oDATA'][$i]['photo_file']);
$publish_date = outText($res['oDATA'][$i]['publish_date']);
$status = outText($res['oDATA'][$i]['photo_status']);
$sort_order = outText($res['oDATA'][$i]['sort_order']);
$image = "photo/".$photo_file;
//$img = showImage($image,$width="",$height="150",$alt="IMG",$title="$photo_caption",$parameters="0");
?>
 <li><a href="<?=$image?>" rel="lightbox[slide]"
title="<?=$photo_caption?>"><img src="<?=$image?>" alt="<?=$photo_caption?>" title="<?=$photo_caption?>"  class="img-thumbnail" width="220"/></a></li>
<?php } ?>

                    
                  </ul>
      </div>	
	
												
					</div>
			
			</div>
				<div class="clearfix">&nbsp;</div>
	
		
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
	<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
	  <script type="text/javascript">
$(function() {
	$('#gallery a').lightBox();
});
</script>
	
	

</body>
</html>
