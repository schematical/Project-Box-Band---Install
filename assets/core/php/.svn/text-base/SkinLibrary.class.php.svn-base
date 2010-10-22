<?php
/* 
 * this file will parse a config file and manage some some specific functionality of a skin
 */
class SkinLibrary{
    protected $strName = null;
    protected $strDisplay = null;
    protected $strVersion = null;
    protected $strDescription = null;
    protected $strAuthor = null;
    protected $strWebsite = null;
    protected $strUseAjaxPlayBar = null;
    protected $arrRequiredAddons = array();
    public function  __construct($strConfigDir) {
        $this->strName = $strConfigDir;
        $strConfigLoc = SKINS_DIR . "/" . $strConfigDir . "/config.xml";
        if(!file_exists($strConfigLoc)){
            throw new Exception("No config.xml file located at " . $strConfigLoc);
        }
        $xmlConfig = simplexml_load_file($strConfigLoc);
        //die(print_r($xmlConfig));
        $this->strDisplayName = $xmlConfig->displayName;
        $this->strVersion = $xmlConfig->version;
        $this->strDescription = $xmlConfig->description;
        $this->strAuthor = $xmlConfig->author;
        $this->strWebsite = $xmlConfig->website;
        $this->strUseAjaxPlayBar = ($xmlConfig->useAjaxPlayBar == 'true')?true:false;
        $arrAddons = $xmlConfig->requiredAddons->addon;
        $intErrorLvl = error_reporting(0);
        foreach($arrAddons as $xmlAddon){
            $this->arrRequiredAddons[] = $xmlAddon;
        }
        error_reporting($intErrorLvl);
        
    }
    public function IsActive(){
        $strActiveTheme = Application::GetSetting(Settings::ACTIVE_SKIN);
        return ($this->strName == $strActiveTheme);
    }
    public function  __get($strName) {
        switch($strName){
            case('DisplayName'):
                return $this->strDisplayName;
            break;
            case('Name'):
                return $this->strName;
            break;
            case('Version'):
                return $this->strVersion;
            break;
            case('Description'):
                return $this->strDescription;
            break;
            case('Author'):
                return $this->strAuthor;
            break;
            case('Website'):
                return $this->strWebsite;
            break;
            case('UseAjaxPlayBar'):
                return $this->strUseAjaxPlayBar;
            break;
            case('RequiredAddons'):
                return $this->arrRequiredAddons;
            break;
            /*
             * Not actual propertys
             */
            case('SkinDir'):
                return SKINS_DIR . "/" . $this->strName;
            break;
            case('SkinUrl'):
                return SKINS_URL . "/" . $this->strName;
            break;
            default:
                throw new Exception("No property with name '" . $strName . "' in class '" . __CLASS__ . "'");
            break;
        }
    }
}
?>
