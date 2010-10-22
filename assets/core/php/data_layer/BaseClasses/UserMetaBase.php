<?php
class UserMetaBase extends BaseEntity {
    const TABLE_NAME = 'userMeta';
    const P_KEY = 'idUserMeta';
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
    }
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idUserMeta = %s;", $this->table, $intId);
		$result = LoadDriver::query($sql);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new userMeta();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", $this->table);
		$result = LoadDriver::query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new userMeta();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<userMeta>";
        
        $xmlStr .= "<idUserMeta>";
        $xmlStr .= $this->idUserMeta;
        $xmlStr .= "</idUserMeta>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<key>";
        $xmlStr .= $this->key;
        $xmlStr .= "</key>";
        
        $xmlStr .= "<value>";
        $xmlStr .= $this->value;
        $xmlStr .= "</value>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</userMeta>";
        return $xmlStr;
        
    }
     //Get children
    

    //Load by foregin key
    
}
?>