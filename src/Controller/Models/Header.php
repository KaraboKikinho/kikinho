<?php 


namespace App\Controller\Models;


class Header
{
	public static function includeHeader(): void
	{
		require_once(BASE_PATH.'/views/index/header.php');
	}
}
