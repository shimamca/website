	<?php
$res_kavita = $kavitaObj->getAllKavita(); 
$total_kavita = $res_kavita['NO_OF_ITEMS'];
?>
	
	<!---- Start Widget ---->
				<div class="widget wid-vid">
					<div class="heading">
						<h4>Gallery</h4>
					</div>
					<div class="content">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#most">Most Plays</a></li>
							<li><a data-toggle="tab" href="#popular">Popular</a></li>
							<li><a data-toggle="tab" href="#random">Random</a></li>
						</ul>
						<div class="tab-content">
							<div id="most" class="tab-pane fade in active">
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/22.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/23.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/24.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
							</div>
							<div id="popular" class="tab-pane fade">
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/24.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/22.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/23.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
							</div>
							<div id="random" class="tab-pane fade">
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/23.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/24.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
								<div class="post wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<a href="single.html"></a>
										</div>
										<img src="images/22.jpg" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="#">Video's Name</a></h5>
										<div class="info">
											<h6>By <a href="#">Kelvin</a></h6>
											<span><i class="fa fa-calendar"></i>25/3/2016</span> 
											<span><i class="fa fa-heart"></i>1,200</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<!---- Start Widget ---->
				<div class="widget wid-comment">
					<div class="heading"><h4>Kavita</h4></div>
					<div class="content">
					 <?php			
for($i=0;$i<$total_kavita;$i++) { 
$publish_date_kavita = outText($res_kavita['oDATA'][$i]['publish_date']);
$title_kavita = outText($res_kavita['oDATA'][$i]['title']);
$description_kavita = outText($res_kavita['oDATA'][$i]['description']);
$category_kavita = outText($res_kavita['oDATA'][$i]['category']);
//$title_kavita = strip_tags(trim($title_kavita));
$kavita = substr($news,0,50);
?>
					
						<div class="post">
							
							<div class="wrapper">
								<a href="kavita-more.php"><h5><?php echo $title_kavita;?></h5></a>
								<ul class="list-inline">
									<li><i class="fa fa-calendar"></i> <?php echo $publish_date_kavita;?></li> 
									
								</ul>
							</div>
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