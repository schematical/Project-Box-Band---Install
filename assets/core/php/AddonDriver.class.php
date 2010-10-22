<?php
/* 
 * This manages and keeps track of all addons
 */
abstract class AddonDriver{
    public static $arrActiveAddons = array();
    public static function IntilizeAddon($strAddon){
        $strAddon = (string)$strAddon;
        // Declair the $_ADDON_DIR and $_ADDON_URL with a global naming convention so
        //the define statements in the _addon.php can access them
       
        $objAddonLibrary = new AddonLibrary($strAddon);
        
        $_ADDON_DIR = $objAddonLibrary->AddonDir;
        $_ADDON_URL = $objAddonLibrary->AddonUrl;
        require_once($_ADDON_DIR . '/_addon.php');

        self::$arrActiveAddons[$strAddon] = $objAddonLibrary;
        return $objAddonLibrary;
    }
    public static function ListAllAddons(){
        $arrAddons = array();
        $objDir = dir(ADDONS_DIR);

        while (false !== ($strEntity = $objDir->read())) {
           if(
              ($strEntity != '.') &&
              ($strEntity != '..')
           ){
                try{
                    $arrAddons[$strEntity] = self::IntilizeAddon((string)$strEntity);
                }catch (Exception $e){
                    //I dont know yet
                    //throw $e;
                }
           }
        }
        $objDir->close();
        return $arrAddons;
    }
}
?>
