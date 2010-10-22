<?php
class SettingBase extends BaseEntity {
    const TABLE_NAME = 'setting';
    const P_KEY = 'idSetting';
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
    }
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idSetting = %s;", $this->table, $intId);
		$result = LoadDriver::query($sql);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new setting();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", $this->table);
		$result = LoadDriver::query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new setting();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<setting>";
        
        $xmlStr .= "<idSetting>";
        $xmlStr .= $this->idSetting;
        $xmlStr .= "</idSetting>";
        
        $xmlStr .= "<key>";
        $xmlStr .= $this->key;
        $xmlStr .= "</key>";
        
        $xmlStr .= "<value>";
        $xmlStr .= $this->value;
        $xmlStr .= "</value>";
        
        $xmlStr .= "<autoload>";
        $xmlStr .= $this->autoload;
        $xmlStr .= "</autoload>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</setting>";
        return $xmlStr;
        
    }
     //Get children
    

    //Load by foregin key
    
}
?>