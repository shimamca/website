<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("includes/classes/News.cls.php");


$db = new SiteData();
$newsObj = new News();


$res_events = $newsObj->getNewsByArticle(); 
$total_events = $res_events['NO_OF_ITEMS'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title><?=PAGE_TITLE?> | Articles</title>
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css">
	
	
  	
	<!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
	
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css"  type="text/css">
		
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
			<div class="tag-title">
					<h2>Articles</h2>
				</div>
				 <?php			
for($i=0;$i<$total_events;$i++) { 
$id = $res_events['oDATA'][$i]['id'];
$publish_date = outText($res_events['oDATA'][$i]['publish_date']);
$title = outText($res_events['oDATA'][$i]['title']);
$url = outText($res_events['oDATA'][$i]['url']);
$description = $res_events['oDATA'][$i]['description'];
$category = outText($res_events['oDATA'][$i]['category']);
$file_name = outText($res_events['oDATA'][$i]['file_name']);

?>
<div class="col-sm-4">
					
						<article>								
								<h6><?php echo $title ;?></h6>
								<span><i class="fa fa-calendar"></i> <?php echo $publish_date ;?>  </span>
							
							<div class="post-thumbnail-wrap ">
							<div class="zoom-container"><img src="documents/<?php echo $file_name;?>"/></div></div>
							<div class="entry-content">
								<p><?php echo limit_text($description, 20) ;?></p>
								<a href="article-more.php?url=<?php echo $url;?>">More...</a>
							</div>
						</article>
												
					</div>
<?php }?>
					
					
			
			
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
	
	
	

</body>
</html>
