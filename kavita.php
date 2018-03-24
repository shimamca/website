<?php
require_once("includes/settings.php");
require_once("includes/database.php");
require_once("includes/classes/db.cls.php");
require_once("includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("includes/classes/Kavita.cls.php");


$db = new SiteData();
$kavitaObj = new Kavita();

if(isset($_REQUEST['url']) and !empty($_REQUEST['url'])){
	$k_url = $_REQUEST['url'];
}else{
	$k_url = null;
}

if($k_url){
	$res_kavita = $kavitaObj->getKavitaByCategory($k_url); 
	$total_kavita = $res_kavita['NO_OF_ITEMS'];
	$page_title = $k_url;
}else{
	$res_kavita = $kavitaObj->getAllKavita(); 
	$total_kavita = $res_kavita['NO_OF_ITEMS'];
	$page_title ="";
}
// Redirect to home page if data not found
if($total_kavita == 0){
	redirect($page="index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title><?=PAGE_TITLE?> |kavita </title>
	
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
	
</header>
	
	<!--Navigation-->
    <?php include("includes/nav.php");?>
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page">
		<div class="clearfix no-gutter">
			<div id="main-content" class="col-md-9 fix-right">
				<div class="col-md-12">
			<div class="tag-title">
					<h2>Kavita <?php echo $page_title;?></h2>
				</div>
				 <?php			
for($i=0;$i<$total_kavita;$i++) { 
$publish_date_kavita = outText($res_kavita['oDATA'][$i]['publish_date']);
$title_kavita = outText($res_kavita['oDATA'][$i]['title']);
$description_kavita = outText($res_kavita['oDATA'][$i]['description']);
$category_kavita = outText($res_kavita['oDATA'][$i]['category']);
$url_kavita = outText($res_kavita['oDATA'][$i]['url']);
$news = strip_tags(trim($description_kavita));
$kavita = substr($news,0,50);
?>
					<div class="col-sm-4">
					
						<article>								
								<h6><?php echo $title_kavita;?></h6>
								<span><i class="fa fa-calendar"></i> <?php echo $publish_date_kavita;?>  </span>
							
							
							<div class="entry-content">
								<p><?php echo $kavita;?></p>
								<a href="kavita-more.php?url=<?php echo $url_kavita;?>">More...</a>
							</div>
						</article>
												
					</div>
					
					  <?php } ?>
					
												
					
			</div>
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
<?php 
/*}else{
	redirect($page="index.php");
}*/

?>