<?php
abstract class dbParser{
	protected static $tables = array();
	public static function readDB($hostName, $userName, $pass, $dbName){
		mysql_connect($hostName, $userName, $pass) OR DIE ("Unable to connect to database! Please try again later.");
		mysql_select_db($dbName);
			$tableNamesArr = self::getTableNames();
			foreach($tableNamesArr as $tableName){
				self::parseTable($tableName);
			}
			
			foreach(self::$tables as $t){
				$t->loadForeignKeys();
			}
			
			return self::$tables;

	}
	public static function getTableNames(){
			$query = "SHOW TABLES";
			$result = mysql_query($query) or die("An error has occured");
			$strToReturn = array();
			while ($strRowArray = mysql_fetch_row($result))
				array_push($strToReturn, $strRowArray[0]);
			return $strToReturn;
	}
	public static function parseTable($tableName){
		$query = sprintf("DESCRIBE %s;", $tableName);
		
		$result = mysql_query($query) or die("An error has occured");
		
		self::$tables[$tableName] = new tableObj($tableName, $result);
		return self::$tables[$tableName];
	}
	public static function getTable($tableName){
		if(array_key_exists($tableName, self::$tables)){
			return self::$tables[$tableName];
		}else{
			return false;
		}
	}




}
?>