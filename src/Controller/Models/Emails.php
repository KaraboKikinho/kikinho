<?php

namespace App\Controller\Models;
use App\DbAccess\DbController;
use App\Validation\RandomGenerators;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/../../../vendor/PHPMailer/phpmailer/src/Exception.php';
require __DIR__.'/../../../vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require __DIR__.'/../../../vendor/PHPMailer/phpmailer/src/SMTP.php';




class Emails extends DbController
{
	
	public static function displayEmails()
	{
		require_once(BASE_PATH."/views/emails/email.php");
	}
	
	
	public function getUniqueEmailId()
	{
		try
		{
			$email_id = new RandomGenerators;
			$id = $email_id->generateRandomNumbers(30);
			
			// Check if the generated ID already exists in the database
			$pdo = self::getPDO();
			$query = "SELECT COUNT(*) FROM emails WHERE id = ?";
			$stmt = $pdo->prepare($query);
			$stmt->execute([$id]);
			$count = $stmt->fetchColumn();

		// If the ID already exists, generate a new one
		while ($count > 0)
		{
			$id = $email_id->generateRandomNumbers(30);

			// Check the new ID
			$stmt->execute([$id]);
			$count = $stmt->fetchColumn();
		}
		
		return $id;
		}
		catch(PDOException $e)
		{
			return "Error: " . $e->getMesssage();
		}
		
	}
	
	
	public function sendEmail(
		string $name, 
		string $email, 
		string $number, 
		string $subject, 
		string $message, 
		string $sent_time
		): bool
	{
		try 
		{
			$mail = new PHPMailer(true);
			$mail->isSMTP();                                            
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth   = true;       
			$mail->Username   = 'kar.motlhabi@gmail.com';                 
			$mail->Password   = 'jqpjxauezzrxbutd';                               
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      
			$mail->Port = 465;   	
			
			$mail->setFrom($email ? $email : "unknown@mail.com", $name);
			
			$mail->addAddress('motlhabi.karabo@outlook.com');     
							
			$mail->isHTML(true);      
			$mail->Subject = $subject;
			
			$emailBody = $message . "<br/>";
			$emailBody .= "Reach out to me at " . $number . " or " . $email . "! <br/>";
			$emailBody .= "Message sent at: " . $sent_time;
			
			$mail->Body = $emailBody;
									
			// send an email
			$mail->send();
						
			return true;
	
		}
		catch (Exception $e) 
		{
			$email_error = $e->getMessage();
						
			return false;
		}
			
	}
	
	
	public static function storeEmailToTheDatabase($id, $name, $email, $number, $subject, $message, $sent_time)
	{
		try{									
			$pdo = self::getPDO();
			$query = "INSERT INTO emails (id, name, email, number, subject, message, sent_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$stmt = $pdo->prepare($query);
			$stmt->execute([$id, $name, $email, $number, $subject, $message, $sent_time]);
			
			 // Check if the insertion was successful
			if ($stmt->rowCount() > 0) 
			{
				return "Data stored successfully";
			} else {
				return "Data could not be stored";
			}
							
			}catch(PDOException $e)
			{
				return "Connection error: ". $e->getMessage();
			}
		
	}
	  
	 
	 
	public function validate_email_entries(
    string $name,
    ?string $email,
    ?string $number,
    string $subject,
    string $message
	) {
			$errors = [];

			// Validate Name
			if (!preg_match("/^[A-Za-z\s'-]{1,50}$/", $name)) {
					$errors['name'] = "Name can only contain alphabets, spaces, dashes (-), and apostrophes (')";
			}

			// Either email or number must be provided
			if (empty($email) && empty($number)) {
					$errors['email_number'] = 'Either an email or a number must be provided';
			}

			// Validate Email conditionally
			if (empty($number) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$errors['email'] = 'Invalid email address';
			}

			// Validate Number conditionally
			if (empty($email) && !preg_match("/^\d{10,13}$/", $number)) {
					$errors['number'] = 'Invalid contact number';
			}

			// Validate Subject
			if (!preg_match("/^[a-zA-Z0-9\s,?.!'%]+$/", $subject)) {
					$errors['subject'] = 'Subject can only contain alphabets, numbers, and symbols (?, ", .)';
			}

			// Validate Message
			if (!preg_match("~^[A-Za-z0-9\s.,!?@%()+\-/*#='\":]+$~", $message)) {
					$errors['message'] = 'Message cannot be empty or contain symbols';
			}

			// Return errors or true if no errors
			return empty($errors) ? true : $errors;
	}

	
	public function selectEmails(): array
	{
		$pdo = DbController::getPDO();
		$query = "SELECT * FROM `emails`";
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		$row = $stmt->fetchAll();
		
		return $row;
	}
	
	
	public function selectEmailById(int $id)
	{
		$pdo = self::getPDO();
		$query = "SELECT * FROM `emails` WHERE id = :id";
		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$email = $stmt->fetch();
		
		return $email;
	}
	
	public function deleteEmailById(int $id)
	{
		$pdo = self::getPDO();
		$query = "DELETE FROM `emails` WHERE `emails`.`id` = :id";
		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$email = $stmt->fetch();
		
		return $email;
	}
	
	public function moveEmailToTrash($name, $email, $number, $subject, $message, $sent_time): bool
	{
		$pdo = self::getPDO();
		$query = "INSERT INTO `email_trash` (`id`, `name`, `email`, `number`, `subject`, `message`, `sent_time`) VALUES (NULL, :name, :email, :number, :subject, :message, :sent_time)";
		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':number', $number);
		$stmt->bindValue(':subject', $subject);
		$stmt->bindValue(':message', $message);
		$stmt->bindValue(':sent_time', $sent_time);
		$stmt->execute();
		
		return true;
	}
	
	public function selectEmailTrash(): array
	{
		try
		{
			$pdo = DbController::getPDO();
			$query = "SELECT * FROM `email_trash`";
			$stmt = $pdo->prepare($query);
			$stmt->execute();
			$row = $stmt->fetchAll();
			
			return $row;
		}
		catch(PDOException $e)
		{
			return false;
		}
		
	}
	
	public function moveEmailToArchive($name, $email, $number, $subject, $message, $sent_time): bool
	{
		$pdo = self::getPDO();
		$query = "INSERT INTO `saved_emails` (`id`, `name`, `email`, `number`, `subject`, `message`, `sent_time`) VALUES (NULL, :name, :email, :number, :subject, :message, :sent_time)";
		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':number', $number);
		$stmt->bindValue(':subject', $subject);
		$stmt->bindValue(':message', $message);
		$stmt->bindValue(':sent_time', $sent_time);
		$stmt->execute();
		
		return true;
	}
	
	
	public function selectEmailArchive(): array
	{
		try
		{
			$pdo = DbController::getPDO();
			$query = "SELECT * FROM `saved_emails`";
			$stmt = $pdo->prepare($query);
			$stmt->execute();
			$row = $stmt->fetchAll();
			
			return $row;
		}
		catch(PDOException $e)
		{
			return false;
		}
		
	}
	
	
	
	public function countEmails(): int
	{
		$emails = $this->selectEmails();
		$num_of_emails = count($emails);
		
		return $num_of_emails;
	}
	
}