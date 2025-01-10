<?php 

namespace App\Controller\Models;


class Links
{
	public static function includeAllLinks(): void
	{
		require_once(BASE_PATH.'/views/index/links.php');
	}
}
