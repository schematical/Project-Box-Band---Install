<?php
/* 
 * This parses an addons config.xml and manages all asspects of that addon
 */
class AddonLibrary{
    protected $strName = null;
    protected $strDisplayName = null;
    protected $strVersion = null;
    protected $strAuthor = null;
    protected $strDescription = null;
    protected $strWebsite = null;
    protected $strCustomSettingsPage = null;
    protected $arrSettings = array();
    public function __construct($strDirName) {
        $this->strName = $strDirName;
        $strConfigLoc = $this->AddonDir . "/config.xml";
        if(!file_exists($strConfigLoc)){
            throw new Exception("No config.xml file located at " . $strConfigLoc);
        }
        $xmlConfig = simplexml_load_file($strConfigLoc);
        $this->strDisplayName = $xmlConfig->displayName;
        $this->strVersion = $xmlConfig->version;
        $this->strAuthor = $xmlConfig->author;
        $this->strWebsite = $xmlConfig->website;
        $this->strDescription = $xmlConfig->description;
        $this->strCustomSettingsPage = (strlen($xmlConfig->customSettingsPage)>1)?$xmlConfig->customSettingsPage:null;
        $arrSettings = $xmlConfig->settings->setting;
        $intErrorLvl = error_reporting(0);
        foreach($arrSettings as $xmlSetting){
            $this->arrSettings[] = new AddonLibrarySetting($xmlSetting);
        }
        error_reporting($intErrorLvl);
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
            case('CustomSettingsPage'):
                return $this->strCustomSettingsPage;
            break;
            case('Settings'):
                return $this->arrSettings;
            break;
            /*
             * Not actual propertys
             */
            case('AddonDir'):
                return ADDONS_DIR . "/" . $this->strName;
            break;
            case('AddonUrl'):
                return ADDONS_URL . "/" . $this->strName;
            break;
            case('CustomSettingsPageFull'):
                if((!is_null($this->strCustomSettingsPage)) && (strlen($this->strCustomSettingsPage) > 1)){
                    return $this->AddonDir . $this->strCustomSettingsPage;
                }else{
                    return null;
                }
            break;
            default:
                throw new Exception("No property with name '" . $strName . "' in class '" . __CLASS__ . "'");
            break;
        }
    }
}
?>
