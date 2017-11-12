<?php

Class DatabaseHandler
{
	private static $_mhandler;
	
	private function __construct() { }
	
	private static function GetHandler()
	{
		if(!isset($_mhandler))
		{
			try
			{
				self::$_mhandler = new PDO (PDO_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => DB_PERSISTENCY));
				self::$_mhandler -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e)
			{
				self::Close();
				trigger_error($e -> getMessage(), E_USER_ERROR);
			}
			
			return self::$_mhandler; // Returning DATABASE Handler Object.
		}
	}
	
	public static function Close()
	{
		$_mhandler = NULL;
	}
	
	public static function Execute($sqlquery, $params = NULL)
	{
		try
		{
			$dbh = self::GetHandler(); //DataBaseHandler
			$sth = $dbh -> prepare($sqlquery); //StatementHandler
			$sth -> execute($params);
		}
		catch(PDOException $e)
		{
			self::Close();
			trigger_error($e -> getMessage(), E_USER_ERROR);
		}
		
	}
	
	public static function GetAll($sqlquery, $params = NULL, $fetchstyle = PDO::FETCH_ASSOC)
	{
		$result = NULL;
		
		try
		{
			$dbh = self::GetHandler();
			$sth = $dbh -> prepare($sqlquery);
			$sth -> execute($params);
			$result = $sth -> fetchAll($fetchstyle);
		}
		catch(PDOException $e)
		{
			self::Close();
			trigger_error($e -> getMessage(), E_USER_ERROR);
		}
		return $result;
	}
}

	
?>