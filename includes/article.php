<?php
$res_article = $newsObj->getNewsByCategory("Article"); 
$total_article = $res_article['NO_OF_ITEMS'];
?>


<div class="col-md-12">
			<div class="tag-title">
					<h2>Article</h2>
				</div>
				 <?php			
for($a=0;$a<$total_article;$a++) { 

$title_article = outText($res_article['oDATA'][$a]['title']);
$description_article = $res_article['oDATA'][$a]['description'];
$url_article = $res_article['oDATA'][$a]['url'];
$file_name_article = outText($res_article['oDATA'][$a]['file_name']);

$news = strip_tags(trim($description_article));
$article = substr($news,0,50);

?>
					<div class="col-sm-6">
					
					<div class="article">		
					<div class="col-sm-4"><img src="documents/<?php echo $file_name_article;?>"/></div>
					<div class="col-sm-8">							
					<h6><?php echo $title_article ;?></h6>
					<p><?php echo $article ;?></p>
					
					<a href="article-more.php?url=<?php echo $url_article;?>">More...</a>

					</div>

					</div>												
					</div>
					<?php }?>
					
			
			</div>