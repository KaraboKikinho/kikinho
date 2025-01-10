<?php

require_once('../vendor/autoload.php');
require_once('../src/controller/models/emails.php');

$name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES);	
$number = htmlspecialchars(strip_tags($_POST['number']), ENT_QUOTES);	
$email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES);
$subject = htmlspecialchars(strip_tags($_POST['subject']), ENT_QUOTES);
$message = htmlspecialchars(strip_tags($_POST['message']), ENT_QUOTES);
								
$validate_mail = new \App\Controller\Models\Emails;
$validated_mail = $validate_mail->validate_email_entries(
		$name, 
		$email, 
		$number, 
		$subject, 
		$message
	);


if($validated_mail === true)
{
	$sending_time = time();
	$sent_time = date('Y-m-d H:i:s', $sending_time);
			
	$emailClass = new \App\Controller\Models\Emails;
	$sendingEmail = $emailClass->sendEmail(
		$name, 
		$email, 
		$number, 
		$subject, 
		$message, 
		$sent_time
	);
				
	if($sendingEmail === true)
	{
		$email_id = new \App\Controller\Models\Emails;
		$id = $email_id->getUniqueEmailId();
						
		$storeData = new \App\Controller\Models\Emails;
		$storing_data = $storeData->storeEmailToTheDatabase($id, $name, $email, $number,$subject, $message, $sent_time);
		
		$sending = "Email sent successfully!";
		header('Content-Type: application/json');
		echo json_encode(['success' => true, 'emailResp' => $sending]) ;
		exit;
	}
	
	else
	{
		$sending = "Email failed to send. <br/> Please check your internet connection and try again.";
		header('Content-Type: application/json');
		echo json_encode(['success' => NULL, 'emailResp' => $sending]) ;
		exit;
		
	}
	
}
else
{
	header('Content-Type: application/json');
	echo json_encode(['success' => false, 'errors' => $validated_mail]) ;
	exit;
}

