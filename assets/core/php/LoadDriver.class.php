<?php
class LoadDriver{
    public static $intActiveConnection = null;
    protected static $arrInitilizedDatabases = array();
    
    public static function AddDataConnection($objDataConnection){
        $intConnectionNumber = count(LoadDriver::$arrInitilizedDatabases);
        $objDataConnection->SetConnectionNumber($intConnectionNumber);
        LoadDriver::$arrInitilizedDatabases[$objDataConnection->ConnectionNumber] = $objDataConnection;
    }
    
	public static function Query($strSql){
        $result = mysql_query($strSql);

		if($result) {
    		return $result;
		}else{
		 	throw new Exception("MySQL Query Failed\n\tError:" . mysql_error() . "\n\tQuery:" . $strSql);
		}
		
	}
	
	
	public static function insert($table, $fieldValues){
		$fields = array_keys($fieldValues);
		$values = array_values($fieldValues);
		
		$escVals = array();
		foreach($values as $val){
			if(!is_numeric($val)){
				$val = "'" . mysql_escape_string($val) .  "'";
			}
			$escVals[] = $val;
		}
		
		$sql = " INSERT INTO " . $table . " (`";
		$sql .= join('`, `', $fields);
		$sql .= "`) VALUES (";
		$sql .= join(', ', $escVals);
		$sql .= ");";
		$result = loadDriver::query($sql);
		return $result;
	}
	
	public static function update($table, $fieldValues, $conditions){
		$updates = array();
		foreach($fieldValues as $field => $val){
			if(!is_numeric($val)){
				$val = "'" . mysql_escape_string($val) . "'";
			}
			$updates[] = "`" . $field . "` = " . $val;
		}
		$where = array();
		foreach($conditions as $field => $val){
			if(!is_numeric($val)){
				$val = "'" . mysql_escape_string($val) . "'";
			}
			$where[] = "`". $field . "` = " . $val;
		}
		
		$sql = " UPDATE " . $table . " SET ";
		$sql .= join(', ', $updates);
		$sql .= " WHERE ";
		$sql .= join('AND ', $where);
		$sql .= ";";
       
		$result = loadDriver::query($sql);
		return $result;
	}
	public static function delete($table, $conditions){
		$where = array();
		foreach($conditions as $field => $val){
			if(!is_numeric($val)){
				$val = "'" . mysql_escape_string($val) . "'";
			}
			$where[] = $field . " = " . $val;
		}
		
		$sql = " UPDATE " . $table . " SET ";
		$sql .= "endDate = '" . dateUtil::sysDate() . "'";
		$sql .= " WHERE ";
		$sql .= join('AND ', $where);
		$sql .= ";";
		$result = loadDriver::query($sql);
		
		return $result;
	}

}

?>