<?php 


namespace App\Controller\Models;


class Footer
{
	public static function includeFooter(): void
	{
		require_once(BASE_PATH.'/views/index/footer.php');
	}
}
