<?php 


namespace App\Custom;
use App\DbAccess\DbController;


class Keywords extends DbController
{
	
	public function showKeywords()
	{
		require_once(BASE_PATH."/views/admin/admin-keywords.php");
	}
	
	public function trackSearchKeywords(string $searchTerm)
	{
		session_start();
		
		// Check if the search keywords session variable is set
    if (notset($_SESSION['search_keywords'])) 
		{
			// If not set, initialize it as an empty array
      $_SESSION['search_keywords'] = [];
    }
		
		// Add the search term to the array
    $_SESSION['search_keywords'][] = $searchTerm;

    $uniqueSearchKeywords = array_unique($_SESSION['search_keywords']);
		
		if(notempty($searchTerm))
		{
			$this->insertKeywordToDB($searchTerm);
		}

    session_write_close();

    return $uniqueSearchKeywords;
		
	}
	
	public function insertKeywordToDB(string $searchTerm)
	{		
		$pdo = self::getPDO();
		$query = "INSERT INTO `keywords` (`id`, `search_term`) VALUES (NULL, :searchTerm)";
		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':searchTerm', $searchTerm);
		$stmt->execute();
		$row = $stmt->fetchAll();

		return $row;
	}
	
	public function selectKeywords(): array
	{
		$pdo = self::getPDO();
		$query = "SELECT * FROM `keywords`";
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		$row = $stmt->fetchAll();
		
		return $row;
	}
	
	public function selectKeywordsOrderByIdDESC(): array
	{
		$pdo = self::getPDO();
		$query = "SELECT * FROM `keywords` ORDER BY `keywords`.`id` DESC";
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		$row = $stmt->fetchAll();
		
		return $row;
	}
	
	public function countKeywords(): int
	{
		$keywords = $this->selectKeywords();
		$num_of_keywords = count($keywords);
		
		return $num_of_keywords;
	}
	
	
	
	
}
