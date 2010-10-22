<?php
require_once(DATALAYER_GEN_DIR . "/UserMetaBase.php");
class UserMeta extends UserMetaBase {

    public static function LoadByUserIdAndKey($intUserId, $strKey){
		$sql = sprintf("SELECT * FROM %s%s WHERE idUser = %s AND `key` LIKE '%s';",  DB_PREFIX, self::TABLE_NAME, $intUserId, $strKey);
		$result = LoadDriver::query($sql);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new userMeta();
			$tObj->materilize($data);
			return $tObj;
		}
        return null;
	}

    public static function GetUser(){
		$sql = sprintf("SELECT * FROM `%s%s` WHERE idUser = %s;", DB_PREFIX, self::TABLE_NAME, $this->idUser);
		$result = LoadDriver::query($sql);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new userMeta();
			$tObj->materilize($data);
			return $tObj;
		}
        return null;
	}
}


?>