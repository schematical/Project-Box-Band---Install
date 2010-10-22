<?php
require_once(DATALAYER_GEN_DIR . "/SettingBase.php");
class Setting extends SettingBase {

     public static function LoadByKey($strKey){
		$sql = sprintf("SELECT * FROM %ssetting WHERE `key` LIKE '%s';", DB_PREFIX,  $strKey);
		$result = LoadDriver::query($sql);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new setting();
			$tObj->materilize($data);
			return $tObj;
		}
        return null;
	}

}


?>