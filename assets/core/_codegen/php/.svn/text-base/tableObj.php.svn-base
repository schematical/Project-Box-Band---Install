<?php
class tableObj{
	protected $tableName;
	protected $dataBase;
	protected $fields;//Array
	protected $pKeyField;
	
	public function __construct($nTableName, $result = false){
		$this->tableName = $nTableName;
		$this->fields = array();
		if($result != false){
			$this->materilizeFromRec($result);
		}
		
	}
	public function materilizeFromRec($result){
		while ($objRow = mysql_fetch_array($result)) {
			$tFieldObj = new fieldObj($this, $objRow);
			$this->fields[$tFieldObj->name] = $tFieldObj;
		}
	
	}
	public function setPKey($field){
        
		if(!isset($this->pKeyField)){
			$this->pKeyField = $field;
		}else{
			//throw new Exception("Primary key for table (" . $this->tableName . ") is already set");
		
		}
	}
	public function loadForeignKeys(){
		$query =sprintf("SHOW CREATE TABLE `%s`;", $this->tableName);
		$result = mysql_query($query) or die("An error has occured");
		
		$objRow = mysql_fetch_row($result);
		$strCreateTable = $objRow[1];
		$strCreateTable = str_replace("\r", "", $strCreateTable);
		//echo $strCreateTable . "<br>----------------------------<br>";
		$statmentArr = explode("\n", $strCreateTable);
		foreach($statmentArr as $stmt){
			$fkStr = "FOREIGN KEY ";
			$fKeyPos = strpos($stmt, $fkStr);
			$refStr = " REFERENCES ";
			if($fKeyPos != false){
				
				$refPos = strpos($stmt, $refStr);
				$myFieldStr = substr($stmt, $fKeyPos + strlen($fkStr), ($refPos - $fKeyPos- strlen($fkStr)));
				$myFieldStr = str_replace("`" , "", $myFieldStr);
				$myFieldStr = str_replace("(" , "", $myFieldStr);
				$myFieldStr = str_replace(")" , "", $myFieldStr);
				if(array_key_exists($myFieldStr, $this->fields)){
					$fieldObj = $this->fields[$myFieldStr];
				}else{
					throw new Exception("No field exists named (" . $myFieldStr . ") in table (" . $this->tableName . ")");
				}
				
				$refStr = substr($stmt, $refPos + strlen($refStr));
			
				$tableDataArr = explode(" ", $refStr);
				$tableName = str_replace("`" , "", $tableDataArr[0]);
				$fieldName = str_replace("`" , "", $tableDataArr[1]);
				$fieldName = str_replace("(" , "", $fieldName);
				$fieldName = str_replace(")" , "", $fieldName);
				$fieldName = str_replace("," , "", $fieldName);
			
				$fieldObj->setReference($tableName, $fieldName);
			}
		}
	}
	public function getChildren(){
		$rArr = array();
		foreach($this->fields as $field){
		 	foreach($field->children as $child){
				if($this->name != $child->table->name){
					$rArr[] = $child;
					echo $this->name . "." . $child->name . "<br>";
				}
			}
		}
		return $rArr;
	}
	public function getParents(){
		$rArr = array();
		foreach($this->fields as $field){
			$reference = $field->reference;
		 	if(isset($reference)){
				$rArr[$reference->name] = $field;
			}
		}
		return $rArr;
	}
	
	public function __get($strName) {
		switch($strName){
				case 'name':
					return $this->tableName;
				break;
				case 'fields':
					return $this->fields;
				break;
				case 'pKeyField':
					return $this->pKeyField;
				break;
				case 'children':
					return $this->getChildren();
				break;
				case 'parents':
					return $this->getParents();
				break;
				default:
					throw new Exception("No property named " . $strName . " in " . get_class($this));
				break;
		
		}
	
	}
	public function hasChild($strName){
		
		$childArr = $this->getChildren();
		foreach($childArr as $child){
			if(($child->name == $strName) && ($this->pKeyField->name != $strName)){
				return true;
			}
		}
		return false;
			
	}
	public function __toString() {

		$tStr = "";
		$tStr .= "Name:" .$this->name;
		$tStr .= "<br/>\n";
		foreach($this->fields as $f){
			$tStr .= "---" . $f . "<br>";
		}
        return $tStr;
    }
	public function getQName(){
		$nameStr = str_replace("_", "", $this->name);
		$nameStr = sprintf("%s%s", strtoupper(substr($nameStr, 0, 1)), substr($nameStr, 1));
		return $nameStr;
	}


}
?>