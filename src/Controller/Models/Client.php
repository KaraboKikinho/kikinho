<?php 

namespace App\Controller\Models;
use App\DbAccess\DbController;


class Client extends DbController
{
	
	
	public function displayClienteleSteps()
	{
		try{
			$pdo = DbController::getPDO();
			$query = "SELECT * FROM `design_steps`";
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
