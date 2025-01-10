<?php 


namespace App\Controller\Models;
use App\DbAccess\DbController;


class Images extends DbController
{
	
	public function displayImagesByType(string $img_type)
	{
		try{
			$pdo = DbController::getPDO();
			$query = "SELECT * FROM `images` WHERE type = :image_type";
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":image_type", $img_type, \PDO::PARAM_STR);
			$stmt->execute();
			$row = $stmt->fetchAll();
			
			return $row;
		}
		catch(PDOException $e)
		{
			return "Error: ".$e->getMessage();
		}
		
	}
	

	
	
}
