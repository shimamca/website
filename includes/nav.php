<?php
require_once("includes/classes/kavita.cls.php");
$kavitaObj = new Kavita();

$res_kavita_cat = $kavitaObj->getKavitaCategory(); 
$total_kavita_cat = $res_kavita_cat['NO_OF_ITEMS'];
?>

<nav id="menu" class="navbar navbar-default" role="navigation">
		
	<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="events-all.php">Events</a></li>
				<li><a href="articles.php">Articles</a></li>
				<li><a href="photos.php">Photos</a></li>
				<li><a href="media.php">Media</a></li>
				
				<li class="dropdown"><a href="kavita.php">Kavita <i class="fa fa-arrow-circle-o-down"></i></a>
					<div class="dropdown-menu">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
							<?php			
							for($i=0;$i<$total_kavita_cat;$i++) { 
							$category = outText($res_kavita_cat['oDATA'][$i]['category']);
							?>
							
							
								<li><a href="kavita.php?url=<?php echo $category;?>"><?php echo $category;?></a></li>
								
								
								  <?php } ?>
							</ul>
						</div>
					</div>
				</li>
				
				<li><a href="#"><i class="fa fa-cubes"></i> Blocks</a></li>
				<li><a href="contact.html"><i class="fa fa-envelope"></i> Contact</a></li>
			</ul>
			<div class="col-sm-3 col-md-3 navbar-right">
				<form class="navbar-form" role="search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="q">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
				</form>
			</div>
		</div><!-- /.navbar-collapse -->
	</nav>