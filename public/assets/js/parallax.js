



document.addEventListener("DOMContentLoaded", function() 
{
	var parallaxContainer = document.querySelector(".parallax-container");
	
	if(parallaxContainer)
	{
		window.addEventListener("scroll", function() 
		{
			var scrollPosition = window.scrollY;
			parallaxContainer.style.backgroundPositionY = scrollPosition * 0.5 + "px";
		});
	}

	
	
});