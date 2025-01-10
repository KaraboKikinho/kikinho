<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



// Handle AJAX requests here
if (isset($_POST['action'])) 
{
	$action = htmlspecialchars(strip_tags($_POST['action']), ENT_QUOTES);

	if ($action === 'sendEmail') 
	{
		require_once "../ajax/email.php";
	} 
	else if($action === 'daysOld')
	{
		require_once("../ajax/days-old.php");
	}
	else if($action === 'quotation')
	{
		require_once("../ajax/quotation.php");
	}
	else 
	{
    echo 'Invalid action';
  }
} 
else 
{
	echo 'Action not specified';
}