<?php


	$logo_image = new App\Controller\Models\Images;	
	$logo = $logo_image->displayImagesByType('logo');
	

?>


<body>
  <main>
    <!-- Navbar Container -->
    <div id="header" class='container-fluid px-0'>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <!-- Logo with title -->
          <a id="logoName" class="navbar-brand d-flex align-items-center" href="/">
			<img src="/assets/images/<?= $logo[0]['source']; ?>" alt="<?= $logo[0]['alt']; ?>" class="logo-circle me-3"> 
          </a>

          <!-- Toggler for mobile view -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Collapsible content -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a 
                  class="btn btn-light text-dark btn-small nav-link" 
                  href="/business">
                  Business
                </a>
              </li>
              <li class="nav-item">
                <a href="/about" class="btn btn-light btn-small nav-link">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <?php include(BASE_PATH.'/views/modals/emails.php'); ?>
  </main>

  <!-- Include Bootstrap JS and dependencies (Make sure to include these scripts) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
