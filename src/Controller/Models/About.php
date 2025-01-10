<?php 

namespace App\Controller\Models;
use App\DbAccess\DbController;


class About extends DbController
{
	public static function includeAboutMePage(): void
	{
		require_once(BASE_PATH.'/views/about/about_me.php');
	}
	
	
}
