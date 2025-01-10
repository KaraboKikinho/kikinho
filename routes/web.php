<?php



	return[
	
		['GET', '/', [\App\Controller\HomeController::class, 'index']],		
		['POST', '/', [\App\Controller\HomeController::class, 'index']],
		
		['GET', '/about', [\App\Controller\AboutController::class, 'about_index']],
		
		['GET', '/business', [\App\Controller\BusinessController::class, 'business_index']],
		
		['GET', '/emails', [\App\Controller\EmailController::class, 'email_index']]		
		
	];