<?php
/* 
 * This class serves as the base to all adaptor services
 */
abstract class AdaptorServiceBase{
    protected $objLibrary = null;
    protected $strServiceName = null;
    public function __construct($objLibrary, $strServiceName){
        $this->objLibrary = $objLibrary;
        $this->strServiceName = $strServiceName;
    }
    public function IsActive(){   
        switch($this->strServiceName){
            case(Service::GIGS):
                $strSettingName = Settings::GIGS_SERVICE_PROVIDER;
            break;
            case(Service::MERCH):
                $strSettingName = Settings::MERCH_SERVICE_PROVIDER;
            break;
            case(Service::MUSIC):
                $strSettingName = Settings::MUSIC_SERVICE_PROVIDER;
            break;
            case(Service::NEWS):
                $strSettingName = Settings::NEWS_SERVICE_PROVIDER;
            break;
             case(Service::VIDEO):
                $strSettingName = Settings::VIDEO_SERVICE_PROVIDER;
            break;
            default:
                throw new Exception("There is Setting defined for serveice '" . $strSettingName . "' in " . __CLASS__ . "");
            break;
        }
        $strSettingValue = Application::GetSetting($strSettingName);
        return ($strSettingValue == $this->objLibrary->LibraryName);
    }
}
?>
