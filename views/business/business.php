<?php

	$step_list = new App\Controller\Models\Client;
	$steps = $step_list->displayClienteleSteps();

?>


<article class="online-business container">
  <!-- Header -->
  <section class="header-section text-center mb-4">
    <h2>Need an Online Business?</h2>
    <p class="lead">Unlock the potential of the internet by starting your online business today!</p>
  </section>

  <!-- Features and Benefits -->
  <section class="benefits-section row text-center mb-5">
    <div class="col-md-4">
      <div class="card p-4">
        <i class="fa-light fa-chart-line"></i>
        <h5 class="card-title">Scalability</h5>
        <p class="card-text">Grow your business effortlessly with online scalability, reaching more customers globally.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4">
        <i class="fas fa-mobile-alt fa-3x mb-3 text-primary"></i>
        <h5 class="card-title">Mobile-Friendly</h5>
        <p class="card-text">Ensure your business is accessible anywhere with mobile-friendly design and user experiences.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4">
        <i class="fas fa-laptop-code fa-3x mb-3 text-primary"></i>
        <h5 class="card-title">Custom Development</h5>
        <p class="card-text">Tailor your business solution to fit your unique needs with custom web development services.</p>
      </div>
    </div>
  </section>

  <!-- Types of Online Businesses -->
  <section class="business-types-section mb-4">
    <h3 class="text-center my-3 fw-bold">Types of Online Businesses</h3>
    <ul class="list-group">
      <li class="list-group-item">E-commerce (Online Store)</li>
      <li class="list-group-item">Blogging & Affiliate Marketing</li>
      <li class="list-group-item">Consulting & Services</li>
      <li class="list-group-item">Online Courses & Digital Products</li>
      <li class="list-group-item">Software as a Service (SaaS)</li>
    </ul>
  </section>

  <!-- Call to Action -->
  <section class="cta-section text-center p-3 mb-5">
    <h4 class="my-3">Ready to Get Started?</h4>
    <p>Let’s bring your business idea to life. Contact us for a free consultation today!</p>
    <a href="/emails" class="btn btn-primary btn-lg my-3">Contact Us</a>
  </section>
  
  
  <section class="goals-section mt-5">
    <h2 class="fs-1 text-center my-3">How we do business with our clients</h2>
    <div id="accordion">
      <?php
	  foreach($steps as $key => $step){ ?>
	  
	  <div class="card">
        <div class="card-header" id="heading<?= $key + 1; ?>">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $key + 1; ?>" aria-expanded="true" aria-controls="collapse<?= $key + 1; ?>">
              Step <?= $key + 1; ?>: <?= $step['title']; ?>
            </button>
          </h5>
        </div>
        <div id="collapse<?= $key + 1; ?>" class="collapse" aria-labelledby="heading<?= $key + 1; ?>" data-parent="#accordion">
          <div class="card-body">
            <?= $step['description']; ?> 
          </div>
        </div>
      </div>
	  <?php
	  }
	  ?>

	  
    </div>
  </section>
  
  
</article>



<article>
	<!-- Expandable Goals Section -->
  
</article>
