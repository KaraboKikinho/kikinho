<?php 

namespace App\Custom;


class Session
{
	
	public static function startSession(): bool
	{
		session_start();
		
		if(headers_sent() && isset($_SESSION))
		{
			return true;
		}
		
		return false; 
	}
	
	
	public static function sessionID(): string
	{
		$id = session_id();
		
		return $id; 
	}


	public static function unsetSession(string $name): bool
	{
		if(isset($_SESSION[$name]))
		{
			unset($_SESSION[$name]);
			
			return true; 
		}
		
		return false;
	}
	
	public static function destroySession(): bool
	{
		if($_SESSION)
		{
			session_destroy();
			
			return true;
		}

		return false;
	}
	
	
}