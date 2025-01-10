<?php 


namespace App\Controller\Models;


class Error
{
	public static function displayErrorPage(): void
	{
		require_once(BASE_PATH.'/views/error/error.php');
	}
}
