<?php
/**
 * This class is meant to handel all information associated with cookies
 *
 */
class CookieDriver{

    public static function SetCookie($strName, $strValue, $intExpire = null, $strPath = null, $strDomain = null, $blnSecure = null, $blnHttponly = null){
        setcookie($strName, $strValue, $intExpire, $strPath, $strDomain, $blnSecure, $blnHttponly);
        return true;
    }
    public static function GetCookie($strCookieName){
        if(array_key_exists($strCookieName, $_COOKIE)){
            return $_COOKIE[$strCookieName];
        }else{
            return null;
        }
    }
     public static function RemoveCookie($strCookieName){
        if(array_key_exists($strCookieName, $_COOKIE)){

            return true;
        }else{
            return null;
        }
    }


}

?>