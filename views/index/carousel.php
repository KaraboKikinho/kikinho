<?php

	$carousels_images = new App\Controller\Models\Images;	
	$banners = $carousels_images->displayImagesByType('Carousel');
	
?>


<div id="carousel-container" class="container-fluid">
    <div class="row">
        <div id="col1" class="col">
           
		   <!-- Banners -->
            <?php foreach ($banners as $key => $banner): ?>
                <div class="banner banner<?= $key + 1; ?>">
                    <img 
						src="/assets/images/<?= htmlspecialchars($banner['source']); ?>" 
						alt="<?= htmlspecialchars($banner['title']); ?>" />
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>





<script>
document.addEventListener("DOMContentLoaded", function() {
    const banners = document.querySelectorAll(".banner");
    const carouselImages = document.querySelectorAll("[class^='image']"); // Select carousel images
    let currentBannerIndex = 0;
    let currentImageIndex = 0;

    // Function to show the current banner
    function showBanner(index) {
        banners.forEach((banner, i) => {
            banner.style.display = (i === index) ? 'block' : 'none'; // Show only the current banner
        });
    }

    // Function to show the current carousel image
    function showCarouselImage(index) {
        carouselImages.forEach((image, i) => {
            image.style.visibility = (i === index) ? 'visible' : 'hidden'; // Show only the current image
        });
    }

    // Function to go to the next banner
    function nextBanner() {
        currentBannerIndex = (currentBannerIndex + 1) % banners.length; // Cycle through banners
        showBanner(currentBannerIndex);
    }

    // Function to go to the next carousel image
    function nextCarouselImage() {
        currentImageIndex = (currentImageIndex + 1) % carouselImages.length; // Cycle through carousel images
        showCarouselImage(currentImageIndex);
    }

    // Show the first banner and carousel image initially
    showBanner(currentBannerIndex);
    showCarouselImage(currentImageIndex);

    // Change banner every 5 seconds (5000 ms)
    setInterval(nextBanner, 5000);
    // Change carousel image every 5 seconds (5000 ms)
    setInterval(nextCarouselImage, 5000);
});
</script>

