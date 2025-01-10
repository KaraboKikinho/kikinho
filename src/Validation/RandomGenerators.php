<?php

namespace App\Validation;



class RandomGenerators
{
	
	public function generateRandomNumbers($length) 
	{
		 $text = '';
		 
		 if($length < 15)
		 {
			 $length = 15;
		 }
		 
		$len = rand(10, $length);
		
		for($i = 0; $i < $len; $i++)
		{
			$text .= rand(20, 40); 
		}
		
		return $text;
	}
		
	
	public function generateRandomAlphanumeric($minLength = 20, $maxLength = 40) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';

		$length = mt_rand($minLength, $maxLength);

		for ($i = 0; $i < $length; $i++) 
		{
				$randomString .= $characters[mt_rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	
}

