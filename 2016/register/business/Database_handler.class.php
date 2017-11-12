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
				self::$_mhandler = new PDO (PDO_DSN, USER, PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENCY));
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
		return 1;
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
	
	
	public static function GetRow($sqlquery, $params = NULL, $fetchstyle = PDO::FETCH_ASSOC)
	{
		$result = NULL;
		
		try
		{
			$dbh = self::GetHandler();
			$sth = $dbh -> prepare($sqlquery);
			$sth -> execute($params);
			$result = $sth -> fetch($fetchstyle);
		}
		catch(PDOException $e)
		{
			self::Close();
			trigger_error($e -> getMessage(), E_USER_ERROR);
		}
		return $result;
	}
	
	
	public static function GetOne($sqlquery, $params = NULL)
	{
		$result = NULL;
		
		try
		{
			$dbh = self::GetHandler();
			$sth = $dbh -> prepare($sqlquery);
			$sth -> execute($params);
			$result = $sth -> fetch(PDO::FETCH_NUM);
			$result = $result[0];
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