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
}

$res_kavita = $kavitaObj->getKavitaByUrl($k_url); 
$total_kavita = $res_kavita['NO_OF_ITEMS'];
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
	
    <title><?=PAGE_TITLE?> | Kavita</title>
	
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
			
<?php
if($_GET['url'])	{		
$id = $res_kavita['oDATA'][0]['id'];
$publish_date = outText($res_kavita['oDATA'][0]['publish_date']);
$title = outText($res_kavita['oDATA'][0]['title']);
$description = $res_kavita['oDATA'][0]['description'];
$category = outText($res_kavita['oDATA'][0]['category']);
$file_name = outText($res_kavita['oDATA'][0]['file_name']);
?>
<div class="col-sm-12">
<div class="tag-title">
					<h2>Kavita</h2>
				</div>
									
					<h6><?php echo $title ;?></h6>	
									
														
							
							<div class="zoom-container"><img src="documents/<?php echo $file_name;?>"/></div>
							
							
								<div class="clearfix">&nbsp;</div>
								<p><?php echo $description ;?></p>
								
								<div><i class="fa fa-calendar"></i> <?php echo $publish_date ;?>  </div>
							
						
												
					</div>
			
			</div>
				<div class="clearfix">&nbsp;</div>
<?php }?>	
		
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
