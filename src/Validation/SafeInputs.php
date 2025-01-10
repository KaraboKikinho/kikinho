<?php

namespace App\Validation;


class SafeInputs
{	
			
			public function encryptData($data_to_encrypt, $secret_key) 
			{
				$cipherMethod = 'AES-256-CBC';
				$options = 0;
				
				$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
				
				$encryptedData = openssl_encrypt($data_to_encrypt, $cipherMethod, $secret_key, $options, $iv);

				return $encryptedData;
			}
			
			
			public function decryptData($encryptedData, $secret_key) 
			{
				$cipherMethod = 'AES-256-CBC';
				$options = 0;
				
				$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
								
				$decryptedData = openssl_decrypt($encryptedData, $cipherMethod, $key, $options, $iv);

				return $decryptedData;
			}
		
			
}