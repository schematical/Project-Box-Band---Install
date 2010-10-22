<?php
class UserBase extends BaseEntity {
    const TABLE_NAME = 'user';
    const P_KEY = 'idUser';
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
    }
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idUser = %s;", $this->table, $intId);
		$result = LoadDriver::query($sql);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new user();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", $this->table);
		$result = LoadDriver::query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new user();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<user>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<email>";
        $xmlStr .= $this->email;
        $xmlStr .= "</email>";
        
        $xmlStr .= "<pass>";
        $xmlStr .= $this->pass;
        $xmlStr .= "</pass>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</user>";
        return $xmlStr;
        
    }
     //Get children
    

    //Load by foregin key
    
}
?>