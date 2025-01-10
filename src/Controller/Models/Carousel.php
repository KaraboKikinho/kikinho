<?php 


namespace App\Controller\Models;
use App\DbAccess\DbController;


class Carousel extends DbController
{
	public static function includeCarousel(): void
	{
		require_once(BASE_PATH.'/views/index/carousel.php');
	}
	
	
	
}
