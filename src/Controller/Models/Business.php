<?php 

namespace App\Controller\Models;
use App\DbAccess\DbController;


class Business extends DbController
{
	public static function includeBusinessPage(): void
	{
		require_once(BASE_PATH.'/views/business/business.php');
	}
	
	
}
