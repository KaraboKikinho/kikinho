<?php

	$marquee_list = new App\Controller\Models\Calendar;
	$marquee = $marquee_list->marquee();
	
?>



<article id="container3" class="container">
	<div class="row">
		<div class="col name-col">
			<h5 id="nickname">#KIKINHO</h5>
			<p 
				id="daysOld"
				class="text-light">
				I am 
				<span 
					id="total" 
					class="text-warning">
					<!-- JS (date-and-time) -->
				</span> 
				days old today
			</p>
			<a 
				id="countYourDays" 
				data-toggle="modal" 
				data-target="#exampleModalCenter">
				Count your days
			</a>
		</div>
		<div class="col">
			<marquee>
			<?php
			foreach($marquee as $marq){ ?>
				<span class="text-light fs-2"><?= $marq['content']; ?></span>
				<img src='/assets/images/logo1.svg' class="marquee-img" />
				<?php
			}
			?>
			</marquee>
		</div>
	</div>
</article>




<?php
	
	include(BASE_PATH.'/views/modals/days-old.php');

?>





