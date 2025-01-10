<?php 

namespace App\Controller\Models;
use App\DbAccess\DbController;


class Vision extends DbController
{
	
	
	public function displayVMPStatements(string $entryType)
	{
		try{
			$pdo = DbController::getPDO();
			$query = "SELECT * FROM `foundation` WHERE entry_type = :entry_type";
			$stmt = $pdo->prepare($query);
			$stmt->bindValue(":entry_type", $entryType);
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
