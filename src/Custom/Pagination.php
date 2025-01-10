<?php

namespace App\Custom;



class Pagination
{
	
	public static function setPageNumber(): int
	{
		$page_number = isset($_GET['page']) ? $_GET['page'] : (isset($_POST['page']) ? $_POST['page'] : 1);
		
		return (int) $page_number;
	}
	
}