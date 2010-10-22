<?php
/* 
 * This class is responsible for linking and managing all child services from a single providor
 */
abstract class AdaptorLibraryBase{
    protected $blnInitilized = false;
    protected $objAdaptorConnection = null;
    protected $arrService = array();
    protected $strLibraryName = null;
    protected $strDisplayName = null;
    public function Initilize($strLibraryName, $strDisplayName){
        $this->strLibraryName = $strLibraryName;
        $this->strDisplayName = $strDisplayName;
        $strAdaptorConnection = $this->GetLibraryPrefix() . 'AdaptorConnection';
        $this->objAdaptorConnection = new $strAdaptorConnection();
    }
    public function GetSettingsForm(){
        $strClassName = $this->GetLibraryPrefix() . 'AdaptorSettingForm';
        return new $strClassName();
    }
    public function GetLibraryPrefix(){
        return strtoupper(substr($this->strLibraryName, 0, 1)) . substr($this->strLibraryName, 1);
    }
    protected function AddService($strServiceName, $strClassName){
        if(key_exists($strServiceName, $this->arrService)){
            throw new Exception("This Library already has an adaptor registered for service '" . $strServiceName . "'");
        }
        $this->arrService[$strServiceName] = $strClassName;
    }
    public function GetAllServices(){
        return $this->arrService;
    }
    public function GetAdaptorService($strServiceName){
        $strClassName = $this->GetAdaptorServiceName($strServiceName);
        return new $strClassName($this);
    }
    public function GetAdaptorServiceName($strServiceName){
        if(key_exists($strServiceName, $this->arrService)){
            return $this->arrService[$strServiceName];
        }else{
            return null;
        }
    }
    public function Video(){
        return self::GetAdaptorService(Service::VIDEO);
    }
    public function Gig(){
        return self::GetAdaptorService(Service::GIGS);
    }
    public function Music(){
        return self::GetAdaptorService(Service::MUSIC);
    }
    public function Photos(){
        return self::GetAdaptorService(Service::PHOTOS);
    }
    public function  __get($strName) {
        switch($strName){
            case("LibraryName"):
                return $this->strLibraryName;
            break;
            case("DisplayName"):
                return $this->strDisplayName;
            break;
            default:
                throw new Exception("There is no property'" . $strName . "' in " . __CLASS__ . "");
            break;
        }
    }



}

?>
