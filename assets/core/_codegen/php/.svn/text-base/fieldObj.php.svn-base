<?php
class fieldObj{
	protected $table;//tableObj
	protected $fieldName;
	protected $fieldType;
	protected $fieldDefault;
	protected $fieldNull;
	protected $fieldIsPKey;
	protected $fieldExtra;
	protected $fieldForignKeys;//array of other fieldObjs
	protected $reference;//Only one
	public function __construct($nTable, $result = false){
		$this->table = $nTable;
		$this->fieldForignKeys = array();
		if($result != false){
			$this->materilizeFromRec($result);
		}
	}
	public function materilizeFromRec($result){
		$this->fieldName = $result['Field'];
		$this->fieldType = $result['Type'];
		$this->fieldNull = $result['Null'];
		$this->fieldDefault = $result['Default'];
		if($result['Key'] == "PRI"){
			$this->fieldIsPKey = true;
			$this->table->setPKey($this);
		}
		$this->fieldExtra = $result['Extra'];
	}

	public function getForignKeys(){
		return $this->fieldForignKeys;
	}
	private function addForeignKey($fFieldObj){
			$this->fieldForignKeys[] = $fFieldObj;
			//echo "Recived " . $this->fieldForignKeys[sizeof($this->fieldForignKeys) - 1] . "<br>";
		
	}
	public function setReference($tableName, $fieldName){
		$tableObj = dbParser::getTable($tableName);
		if($tableObj == false){
			throw new Exception("No table exists with table name (" . $tableObj->name . ")");
		}
		if(array_key_exists($fieldName, $tableObj->fields)){
			$referenceField = $tableObj->fields[$fieldName];
			//echo "Adding Forgin Key " . $this->table->name . "." . $this->fieldName . " to Reference " . $referenceField->table->name . "." . $referenceField->fieldName . "<br>";
			$referenceField->addForeignKey($this);
			
			$this->reference = $referenceField;
		}else{
			throw new Exception("No field exists named (" . $fieldName . ") in table (" . $tableObj->name . ")");
			
		}
	}
	public function __get($strName) {
		switch($strName){
				case 'name':
					return $this->fieldName;
				break;
				case 'type':
					return $this->fieldType;
				break;
				case 'null':
					return $this->fieldNull;
				break;
				case 'isPKey':
					return $this->fieldIsPKey;
				break;
				case 'default':
					return $this->fieldDefault;
				break;
				case 'reference':
					return $this->reference;
				break;
				case 'children':
					return $this->fieldForignKeys;
				break;
				case 'table':
					return $this->table;
				break;
				default:
					throw new Exception("No property named " . $strName . " in " . get_class($this));
				break;
		
		}
	
	}
	
	public function __toString() {
		$tStr = "";
		$tStr .= sprintf("%s.%s FK(%s.%s)", $this->table->name, $this->name, $this->reference->table->name, $this->reference->name);
        return $tStr;
    }
	public static function getFieldNamesFromArr($fArr){
		$rArr = array();
		foreach($fArr as $field){
			$rArr[] = $field->name;
		}
		return $rArr;
	}

}
?>