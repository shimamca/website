<?php
$res_events = $newsObj->getNewsByCategory("Events"); 
$total_events = $res_events['NO_OF_ITEMS'];
?>

<div class="col-md-12">
			<div class="tag-title">
					<h2>Events</h2>
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
								<a href="events-more.php?url=<?php echo $url;?>">More...</a>
							</div>
						</article>
												
					</div>
<?php }?>
					
					
			
			
			</div>