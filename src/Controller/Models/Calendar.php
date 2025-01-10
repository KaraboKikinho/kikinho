<?php 

namespace App\Controller\Models;
use App\DbAccess\DbController;


class Calendar
{
	public static function includeCalendar(): void
	{
		require_once(BASE_PATH.'/views/index/count-days.php');
	}
	
	public function marquee()
	{
		try{
			$pdo = DbController::getPDO();
			$query = "SELECT * FROM marquee WHERE published = 'Yes'";
			$stmt = $pdo->prepare($query);
			$stmt->execute();
			$row = $stmt->fetchAll();
			
			return $row;
		}
		catch(PDOException $e)
		{
			return "Error: ". $e->getMessage();
		}
		
	}
	
}
