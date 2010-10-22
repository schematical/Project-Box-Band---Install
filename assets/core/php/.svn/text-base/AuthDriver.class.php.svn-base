<?php
/* 
 * This handles all user data and security authentication
 */
abstract class AuthDriver{
    const LETTERS = '!@#$^&*()abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    const DEFAULT_LENGTH = 16;
    const DELIMITER = '||';
    protected static $objUser = null;
    public static function Authenticate($strEmail, $strPassword){
        //load user
        $objUser = User::LoadByEmail($strEmail);
        //check to see if user is null
       
        if((!is_null($objUser)) && (self::Hash($strPassword) == $objUser->pass)){
            //check to see if the posted hashed password matches the saved hash
            self::$objUser = $objUser;
            //set the cookie
            $strCookie = self::GenerateCookieHash(self::$objUser->email, self::Hash($strPassword));
            CookieDriver::SetCookie(Cookie::AUTHENTICATION, $strCookie, time() + (24 * 60 * 60));
        }
        return self::$objUser;
    }
    public static function CheckLoggin(){
        //get the cookie
        $strCookie = CookieDriver::GetCookie(Cookie::AUTHENTICATION);
        //break it apart
        if(is_null($strCookie)){
            return null;
        }
        $arrCookie = explode(self::DELIMITER, $strCookie);
        $strEmail = $arrCookie[0];
        $strSalt1 = $arrCookie[1];
        $strSalt2 = $arrCookie[2];
        $strHash = $arrCookie[3];
        $objUser = User::LoadByEmail($strEmail);
        if(!is_null($objUser)){
            $strHashCompair = self::CookieHash($objUser->email, $objUser->pass, $strSalt1, $strSalt2);
        }
       
        if($strHash == $strHashCompair){
            //Then log them in
            self::$objUser = $objUser;
            return true;
        }else{
            //Give them the boot
            self::$objUser = null;
            return false;
        }
    }
    public static function CreateNewUser($strEmail, $strPassword, $arrUserMeta){
        //Check to see if user exists
        $objUser = User::LoadByEmail($strEmail);
        //create new user
        if(is_null($objUser)){
            self::$objUser = new User();
            self::$objUser->email = $strEmail;
            self::$objUser->pass = self::Hash($strPassword);
            self::$objUser->save();
        }else{
            throw new AuthDriverException($strEmail);
        }
        foreach($arrUserMeta as $strKey=>$strValue){
            self::$objUser->SetMetaData($strKey, $strValue);
        }
        return self::$objUser;

    }
    public static function User(){
        return self::$objUser;
    }
    public static function Hash($strPassword){
        $strHash = md5(PASSWORD_HASH_PRE . $strPassword . PASSWORD_HASH_POST);
        return $strHash;
    }
    public static function GenerateCookieHash($strEmail, $strPassHash){
        $strSalt1 = self::GenRandomString();
        $strSalt2 = self::GenRandomString();
        $strHash = self::CookieHash($strEmail, $strPassHash, $strSalt1, $strSalt2);
        return $strEmail . self::DELIMITER . $strSalt1 . self::DELIMITER . $strSalt2 . self::DELIMITER . $strHash;
    }
    public static function CookieHash($strEmail, $strPassHash, $strSalt1, $strSalt2){
        $strAllHashed = $strSalt1 . self::DELIMITER . $strEmail . self::DELIMITER . $strPassHash . self::DELIMITER .  $strSalt2;
        return self::Hash($strAllHashed);
    }
    
    public static function GenRandomString($intLength = null){
        if(is_null($intLength)){
            $intLength = self::DEFAULT_LENGTH;
        }
        $strPass = '';
        for($i = 0; $i < $intLength; $i++){
            $strPass .= substr(self::LETTERS, round(rand(0, strlen(self::LETTERS))), 1);
        }
        return $strPass;
    }

}
?>
