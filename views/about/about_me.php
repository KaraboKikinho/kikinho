<?php

	$vmp = new App\Controller\Models\Vision;
	$vision = $vmp->displayVMPStatements('vision');
	$mission = $vmp->displayVMPStatements('mission');
	$purpose = $vmp->displayVMPStatements('purpose');

?>



<article class="about-page container">
  <!-- Vision Section -->
  <section class="vision-section mb-5">
   
   <h2>Vision</h2>
	
	<?php foreach($vision as $v){ ?>
		<p class="text-center">
		  <?= $v['description']; ?>
		</p>
	<?php } ?>
	
  </section>

  <!-- Mission Section with List -->
  <section class="mission-section mt-3">
    
	<h2>Mission</h2>
	
    <ul class="mission-list">
		<?php foreach($mission as $key => $m){ ?>
			<li>
				<strong class="mx-2">
					Mission <?= $key + 1; ?>:
				</strong><?= $m['description']; ?>
			</li>
		<?php } ?>
    </ul>
	
  </section>
  
  
  <!-- Purpose Section with List -->
  <section class="mission-section mt-5">
    
	<h2>Purpose</h2>
    
	<ul class="purpose-list">
		<?php foreach($purpose as $key => $p){ ?>
			<li>
				<strong class="mx-2">
					Purpose <?= $key + 1; ?>:
				</strong><?= $p['description']; ?>
			</li>
		<?php } ?>
    </ul>
	
  </section>

  
</article>
