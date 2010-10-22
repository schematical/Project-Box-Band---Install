<?php
require_once(DATALAYER_GEN_DIR . "/UserBase.php");
class User extends UserBase {
    /**
     *Loads a user by thier stored email
     * @param <String> $strEmail
     * @return <User>
     */
    public static function LoadByEmail($strEmail){
		$strSql = sprintf("SELECT * FROM %suser WHERE `email` like '%s';", DB_PREFIX, $strEmail);
		$result = LoadDriver::query($strSql);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new User();
			$tObj->materilize($data);
			return $tObj;
		}
        return null;
    }
    /*
     * non static function
     */
    public function GetMetaData($strKey){
        $objUserMeta = UserMeta::LoadByUserIdAndKey($this->idUser, $strKey);
        return $objUserMeta;
    }

    public function SetMetaData($strKey, $strValue){
        $objUserMeta = UserMeta::LoadByUserIdAndKey($this->id, $strKey);
        //If the UserMeta object is null create one
        if(is_null($objUserMeta)){
            $objUserMeta = new UserMeta();
            $objUserMeta->idUser = $this->id;
            $objUserMeta->key = $strKey;
        }
        $objUserMeta->value = $strValue;
        $objUserMeta->save();
        return $objUserMeta;
    }

}
?>