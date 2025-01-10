<?php 


namespace App\Custom;
use App\DbAccess\DbController;


class Redirects
{
	public function countRedirects(): int
	{
		
		if (notset($_SESSION['redirect_count'])) 
		{
			$_SESSION['redirect_count'] = 0;
			
    }
	
		$_SESSION['redirect_count']++;

		$redirectCount = $_SESSION['redirect_count'];

		session_write_close();

		return $redirectCount;
	}
	
	
	

	
	
}
