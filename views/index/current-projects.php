<?php

	$current_project = new App\Controller\Models\Projects;
	$project_image = new App\Controller\Models\Images;
	$projects = $current_project->selectProjects();
	
	$project_images = $project_image->displayImagesByType('Projects');
	
?>

			
<article id="container4" class="container-fluid">
	<section class="row">
		<div class="col">
			<h1>Current Projects</h1>
		</div>
	</section>
</article>
				
<!--Container 5 -->
				
<article id="articleSchedule" class="container my-5">
	<section class="row">
		<div class="col">
		
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
			
				<?php
				foreach($project_images as $project){ ?>
					
				<div class="carousel-item <?= $project['activity']; ?>">
					<span class="carouselHeader"><?= $project['title']; ?></span>
					<img src="/assets/images/<?= $project['source']; ?>" class="d-block w-100" alt="<?= $project['title']; ?>">
				</div>
					
				<?php
				}
				?>
			
				
			</div>
			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only visibility-hidden"></span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only visibility-hidden"></span>
			</a>
		</div>

		</div>
	</section>
</article>	