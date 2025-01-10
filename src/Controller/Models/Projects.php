<?php 

namespace App\Controller\Models;
use App\DbAccess\DbController;


class Projects extends DbController
{
	public static function includeCurrentProjects(): void
	{
		require_once(BASE_PATH.'/views/index/current-projects.php');
	}
	
	
	public function selectProjects()
	{
		$pdo = DbController::getPDO();
		$query = "SELECT * FROM `projects`";
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		$row = $stmt->fetchAll();
		
		return $row;
	}
	
	
	public function selectProjectImages()
	{
		$pdo = DbController::getPDO();
		$query = "SELECT * FROM `project_images`";
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		$row = $stmt->fetchAll();
		
		return $row;
	}
	
	
	
	
}
