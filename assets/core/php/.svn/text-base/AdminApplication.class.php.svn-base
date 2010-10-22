<?php
/* 
 * This handles most of the Model(from the MVC) functions for the admin
 */

abstract class AdminApplication{
    public static $objAdminPage = null;
    public static $strAdminPage = null;
    public static function Run($strAdminPage){
        self::$objAdminPage = $strAdminPage;
        $strAdminPage = substr(strtoupper(self::$objAdminPage), 0, 1) . substr(self::$objAdminPage, 1) . "Page";
        if(!class_exists($strAdminPage)){
            throw new Exception("AdminPage Class (" . $strAdminPage . ") does not exist.");
        }
        
        self::$objAdminPage = new $strAdminPage();

        self::CheckRoll();

        self::$objAdminPage->Draw();

    }
    public static function CheckRoll(){
        if(Application::IsInstallMode()){
             foreach(self::$objAdminPage->AllowedRoll as $strAllowedRoll){
                 if($strAllowedRoll == UserMetaRoll::INSTALL){
                       return true;
                 }
             }
        }else{
            AuthDriver::CheckLoggin();
            $objUser = AuthDriver::User();
            if(!is_null($objUser)){
                foreach(self::$objAdminPage->AllowedRoll as $strAllowedRoll){
                    if((!is_null($objUser->GetMetaData(UserMetaData::ROLL)))&&
                       ($objUser->GetMetaData(UserMetaData::ROLL)->value == $strAllowedRoll)){

                       return true;
                    }
                }
            }
            self::$objAdminPage = new LoginPage();
            return false;
        }
    }
}
?>
