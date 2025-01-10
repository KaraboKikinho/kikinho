<?php

namespace App\DbAccess;

use PDO;
use PDOException;


abstract class DbController extends Config
{
	private static $pdo;

	public static function getPDO()
	{
		if (!isset(self::$pdo)) 
		{
			try 
			{
				$conn = "mysql:host=". self::getDbHost() .";port=". self::getDbPort() .";dbname=". self::getDbName();
				self::$pdo = new PDO(
					$conn, 
					self::getDbUsername(), 
					self::getDbPassword()
					);
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				self::$pdo->exec('set session sql_mode = traditional');
				self::$pdo->exec('set session innodb_strict_mode = on');
				self::$pdo->exec('set names utf8mb4');
			} 
			catch (PDOException $e) 
			{
					throw new PDOException('Connection failed: ' . $e->getMessage());
			}
		}
		return self::$pdo;
	}
}
