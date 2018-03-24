<?php
$res_poem = $kavitaObj->getAllKavita(); 
//print_r($res_poem);exit;
$total_poem = $res_poem['NO_OF_ITEMS'];
?>
<div class="col-md-12">
			<div class="tag-title">
					<h2>Kavita</h2>
				</div>
				 <?php			
for($p=0;$p<$total_poem;$p++) {
if(isset($res_poem['oDATA'][$p]['publish_date'])){$publish_date = outText($res_poem['oDATA'][$p]['publish_date']);}
if(isset($res_poem['oDATA'][$p]['title'])){$title = outText($res_poem['oDATA'][$p]['title']);}	
if(isset($res_poem['oDATA'][$p]['description'])){$description = outText($res_poem['oDATA'][$p]['description']);}	
if(isset($res_poem['oDATA'][$p]['url'])){$url = outText($res_poem['oDATA'][$p]['url']);;}	

$news = strip_tags(trim($description));
$kavita_des = substr($news,0,50);
?>
					<div class="col-sm-4">
					
						<article>								
								<h6><?php echo $title;?></h6>
								<span><i class="fa fa-calendar"></i> <?php echo $publish_date;?>  </span>
							
							
							<div class="entry-content">
								<p><?php echo $kavita_des;?></p>
								<a href="kavita-more.php?url=<?php echo $url;?>">More...</a>
							</div>
						</article>
												
					</div>
					
					  <?php } ?>
					
												
					
			</div>