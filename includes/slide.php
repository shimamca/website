<?php 
$res_slider = $bannerObj->getAllphoto(); 
$total_slider = $res_slider['NO_OF_ITEMS'];
?>

<div id="owl-slide" class="owl-carousel">
		
		<?php			
for($i=0;$i<$total_slider;$i++) { 
	$photo_id = $res_slider['oDATA'][$i]['photo_id'];
	$photo_file = outText($res_slider['oDATA'][$i]['photo_file']);
	$photo_caption = outText($res_slider['oDATA'][$i]['photo_caption']);
	$photo_date = outText($res_slider['oDATA'][$i]['photo_date']);
	$sort_order = outText($res_slider['oDATA'][$i]['sort_order']);
	$status = outText($res_slider['oDATA'][$i]['status']);
	if($photo_file!="") {
		$image = "<img src='photo/".$photo_file."' height='100' width='200' border='0' />";
	}
	else {$image = "";}
?>
<div class="item">
			<div class="zoom-container">
				<div class="zoom-caption">
					
					<div class="zoom-caption-inner">
					
						<h3><?php echo $photo_caption;?></h3>
					</div>
				</div>
				<?php echo $image;?>
			</div>
		</div>

<?php }?>
		
	</div>