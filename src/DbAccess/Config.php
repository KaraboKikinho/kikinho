<?php 

namespace App\DbAccess;


class Config
{
	private const DB_HOST = "localhost";
	private const DB_PORT = "3306";
	private const DB_NAME = "kikinho";
	private const DB_USERNAME = "root";
	private const DB_PASSWORD = "";
	
	
	protected static function getDbHost()
	{
		return self::DB_HOST;
	}
	
	protected static function getDbPort()
	{
		return self::DB_PORT;
	}
	
	protected static function getDbName()
	{
		return self::DB_NAME;
	}
	
	protected static function getDbUsername()
	{
		return self::DB_USERNAME;
	}
	
	protected static function getDbPassword()
	{
		return self::DB_PASSWORD;
	}
	
}