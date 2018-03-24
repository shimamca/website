<?php
require_once("includes/classes/kavita.cls.php");
require_once("includes/classes/PhotoGalleries.cls.php");
$phoObj = new PhotoGalleries();
$kavitaObj = new Kavita();

$res_kavita = $kavitaObj->getAllKavita(); 
$total_kavita = $res_kavita['NO_OF_ITEMS'];

$res_gallery = $phoObj->getPhotosLimit(62); 
$total_gallery = $res_gallery['NO_OF_ITEMS'];
?>
	
	<!---- Start Widget ---->
				<div class="widget wid-vid">
					<div class="heading">
						<h4>Gallery</h4>
					</div>
					<div class="content">
					<?php			
for($i=0;$i<$total_gallery;$i++) { 
$photo_file = outText($res_gallery['oDATA'][$i]['photo_file']);
$publish_date = outText($res_gallery['oDATA'][$i]['publish_date']);
$image = "photo/".$photo_file;
?>
<div class="col-md-4">
<a href="photos.php">
									<div class="zoom-container">
									<img src="<?=$image?>" alt="<?=$photo_caption?>" title="<?=$photo_caption?>"  />
								<div class="clearfix">&nbsp;</div>
								</div>
								</a>
								
								</div>
								
<?php } ?>
					
					
					
					</div>
				</div>
				
		
				
				
				<!---- Start Widget ---->
				<div class="widget wid-follow">
					<div class="heading"><h4>Follow Us</h4></div>
					<div class="content">
						<ul class="list-inline">
							<li>
								<a href="facebook.com/">
									<div class="box-facebook">
										<span class="fa fa-facebook fa-2x"></span>
										
									</div>
								</a>
							</li>
							<li>
								<a href="facebook.com/">
									<div class="box-twitter">
										<span class="fa fa-twitter fa-2x"></span>
										
									</div>
								</a>
							</li>
							<li>
								<a href="facebook.com/">
									<div class="box-google">
										<span class="fa fa-google-plus fa-2x"></span>
										
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			
			</div>
		</div>