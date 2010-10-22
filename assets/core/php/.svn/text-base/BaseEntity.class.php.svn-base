<?php
/*
 * Works as the base class for our data_layer
 */
abstract class BaseEntity {
	protected $id;
	protected $table;//str
	protected $pKey;//str
	protected $dbFields;//array
	protected $modFields;//array
	protected $loaded;//bool
	protected $modified;//bool

	public function __construct(){
		$this->loaded = false;
	}
	public function getId(){
		return $this->id;
	}
	public function setId($tId){
		$this->id = $tId;
	}
	public function setTable($nTable){
		self::$table = $nTable;
	}
	public function getTable(){
		//eval("\$table = " . get_class($this) . "::\$table;");
		return $this->table;
	}
	public function setPKey($nPKey){
		self::$pKey = $nPKey;
	}
	public function getPKey(){
		//eval("\$pKey = " . get_class($this) . "::\$pKey;");
		return $this->pKey;
	}
	public function isLoaded(){
		return $this->loaded;
	}
	public function isModified(){
		return $this->modified;
	}
	public function reload(){
		$id  = $this->id;
		$pKey = $this->getPKey();
		$table = $this->getTable();
		$sql = "SELECT * FROM " . $table . " WHERE " . $pKey . " = '" . $id . "';";
		$result = loadDriver::query($sql);
		$this->dbFields = mysql_fetch_assoc($result);
		$this->loaded = 1;
		
		if(sizeof($this->modFields) > 0){
			foreach($this->modFields as $key => $value){
				$this->modFields[$key] = false;
			}
		}
		
	}
	public function materilize($data){
		if(isset($data) && (sizeof($data) > 1)){
			$this->dbFields = $data;
			$this->loaded = 1;
			/*$this->modFields = array_keys($this->dbFields);
			if(sizeof($this->modFields) > 0){
				foreach($this->modFields as $key => $value){
					$this->modFields[$key] = false;
				}
			}*/
			$this->setId($this->getField($this->getPKey()));
		}/*else{
			throw new Exception('No Data to Materilize!');
		}*/
	}
	public function load(){
		$this->reload();
		$this->loaded = 1;
	}
	public function forceLoaded(){
	 	$this->loaded = 1;
	}
	public function getField($field){
		if($this->loaded == 0){
			$this->load();
		}
		if(array_key_exists($field, $this->dbFields)){
			return $this->dbFields[$field];
		}else{
			throw new Exception("Field $field does not exist");
		}
	}
	public function getAllFields(){
		if($this->loaded == 0){
			$this->load();
		}
		return $this->dbFields;
	}
	public function setField($field, $value){
		if($this->loaded == 0){
			if(isset($this->id)){
				$this->load();
			}
		}
		$this->dbFields[$field] = $value;
		$this->modified = 1;
		$this->modFields[$field] = true;
		
	}
	public function addNewField($field, $value){
		if(!isset($this->dbFields)){
			$this->dbFields = array();
		}
		if(!array_key_exists($field, $this->dbFields)){
			$tArray = array($field => $value);
			$this->dbFields = array_merge($this->dbFields, $tArray);
			
		}else{
			throw new Exception("Field $field Already Exists");
		}
	
	}
	public function markDeleted(){
		$id = $this->id;
		//eval("\$table = " . get_class($this) . "::\$table;");
		//eval("\$pKey = " . get_class($this) . "::\$pKey;");
        $pKey = $this->getPKey();
		$table = $this->getTable();
		if($id){
			loadDriver::delete($table, array($pKey => $id));
		}
	}
	public function save(){
		$id = $this->id;
		//eval("\$table = " . get_class($this) . "::\$table;");
		//eval("\$pKey = " . get_class($this) . "::\$pKey;");
        $pKey = $this->getPKey();
		$table = $this->getTable();
		if(!$id){
			$this->loaded = 0;
		}
		if($this->loaded == 0){
			$nextKey = $this->getNextId($table, $pKey);
			$this->setField($pKey, $nextKey);
			$this->id = $nextKey;
		 	LoadDriver::insert($table, $this->dbFields);
		}else{
			$updateFields = array();
			LoadDriver::update($table, $this->dbFields, array($pKey => $id));
		}
        
	}
	public function equals($nObj){
		$bol1 = $nObj->getId() == $this->getId();
		$bol2 = $nObj->getTable() == $this->getTable();
		$bol3 = ($this->isModified() == false);
		$bol4 = ($nObj->isModified() == false);
		if($bol1 && $bol2 && $bol3 && $bol4){
		 	return true;
		}else{
			return false;
		}
	}
	public static function getNextId($table, $pKey){
		$sql = "SELECT MAX(" . $pKey . ") + 1 as 'id' FROM " . $table . " LIMIT 1;";
        
		$result = loadDriver::query($sql);
		if($result) {
			while($row = mysql_fetch_assoc($result)){
				$id = $row['id'];
                if(is_null($id)){
                    return 1;
                }else{
                    return $id;
                }
			}
		}
		
	}
	
		
	///new functions created on 7/19/08
	
    public function __get($strName){
        return $this->getField($strName);
    }
    public function __set($strName, $value){
        $this->setField($strName, $value);
    }
}
?>