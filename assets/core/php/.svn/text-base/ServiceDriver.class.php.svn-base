<?php
/* 
 * This class checks the database to see which providors you have for which services and returns the appropriate adaptor
 */
abstract class ServiceDriver{
    public static $arrInitilizedProvidors = array();
    public static function ActivateServiceProvidor($strServiceName, $strProvidor){
        switch($strServiceName){
            case(Service::GIGS):
                $strSetting = Settings::GIGS_SERVICE_PROVIDER;
            break;
            case(Service::MUSIC):
                $strSetting = Settings::MUSIC_SERVICE_PROVIDER;
            break;
            case(Service::PHOTOS):
                $strSetting = Settings::PHOTOS_SERVICE_PROVIDER;
            break;
            case(Service::VIDEO):
                $strSetting = Settings::VIDEO_SERVICE_PROVIDER;
            break;
            case(Service::MERCH):
                $strSetting = Settings::MERCH_SERVICE_PROVIDER;
            break;
            case(Service::NEWS):
                $strSetting = Settings::NEWS_SERVICE_PROVIDER;
            break;
            default:
                throw new Exception("There is no service with the name (" . $strServiceName . ")");
            break;
        }
        Application::SetSetting($strSetting, $strProvidor);
    }
    /**
     *This function gets all providors for a specific service
     * @param <String> $strServiceName
     * @return <Array>
     */
    public static function GetIndServiceProvidors($strServiceName){
        $arrServiceProvidors = array();
        //initalize all providors
        $arrProvidors = self::GetAllProvidors();
        foreach($arrProvidors as $strProvidor){
            self::InitilizeAdaptorLibrary($strProvidor);
        }
        foreach(self::$arrInitilizedProvidors as $objAdapterLibrary){
            $objService = $objAdapterLibrary->GetAdaptorServiceName($strServiceName);
            if(!is_null($objService)){
                $arrServiceProvidors[$objAdapterLibrary->LibraryName] = $objAdapterLibrary;
            }
        }
        return $arrServiceProvidors;
    }
    /**
     * Returns an array of all providors 
     * @return <Array>
     */
    public static function GetAllProvidors(){
        //read the directorys
        $arrProvidors = array();
        $objDir = dir(ADAPTERS_CORE_DIR);
        while (false !== ($strEntity = $objDir->read())) {
           if(($strEntity != 'base') &&
              ($strEntity != '.') &&
              ($strEntity != '..')
           ){
               $arrProvidors[] = $strEntity;
           }
        }
        $objDir->close();
        return $arrProvidors;
    }
    /**
     * Includes and intilizes an AdaptorLibrary
     * @param <String> $strProvidor
     * @return <AdaptorLibrary>
     */
    public static function InitilizeAdaptorLibrary($strProvidor){
        if(!key_exists($strProvidor, self::$arrInitilizedProvidors)){
            require_once(sprintf("%s/%s/_service.php", ADAPTERS_CORE_DIR, $strProvidor));
            //create a new copy of the library
            $strAdaptorLibrary = strtoupper(substr($strProvidor, 0, 1)) . substr($strProvidor, 1) . 'AdaptorLibrary';
            $objLibrary = new $strAdaptorLibrary();
            $objLibrary->Initilize();
            self::$arrInitilizedProvidors[] = $objLibrary;
            return $objLibrary;
        }else{
            return self::$arrInitilizedProvidors[$strProvidor];
        }
    }
    public static function GetAdaptor($strServiceName, $blnConnect = true){
        //searches the db to see which providor you have for that service
        switch($strServiceName){
            case(Service::VIDEO):
                $strServiceProvidor = Application::GetSetting(Settings::VIDEO_SERVICE_PROVIDER);
            break;
            case(Service::MUSIC):
                $strServiceProvidor = Application::GetSetting(Settings::MUSIC_SERVICE_PROVIDER);
            break;
            case(Service::PHOTOS):
                $strServiceProvidor = Application::GetSetting(Settings::PHOTOS_SERVICE_PROVIDER);
            break;
            case(Service::GIGS):
                $strServiceProvidor = Application::GetSetting(Settings::GIGS_SERVICE_PROVIDER);
            break;
            case(Service::MERCH):
                $strServiceProvidor = Application::GetSetting(Settings::MERCH_SERVICE_PROVIDER);
            break;
            case(Service::NEWS):
                $strServiceProvidor = Application::GetSetting(Settings::NEWS_SERVICE_PROVIDER);
            break;
            default:
                throw new Exception("There is no service with the name (" . $strServiceName . ")");
            break;
        }
        if(!is_null($strServiceProvidor)){
            //Include the directory
            $objLibrary = self::InitilizeAdaptorLibrary($strServiceProvidor);
            
            return $objLibrary->GetAdaptorService($strServiceName);
            
        }else{
            return null;
        }

    }
    public static function Videos($blnConnect = true){
        return self::GetAdaptor(Service::VIDEO, $blnConnect);
    }
    public static function Gigs($blnConnect = true){
        return self::GetAdaptor(Service::GIGS, $blnConnect);
    }
    public static function Music($blnConnect = true){
        return self::GetAdaptor(Service::MUSIC, $blnConnect);
    }
    public static function Photos($blnConnect = true){
        return self::GetAdaptor(Service::PHOTOS, $blnConnect);
    }
    public static function Merch($blnConnect = true){
        return self::GetAdaptor(Service::MERCH, $blnConnect);
    }
    public static function News($blnConnect = true){
        return self::GetAdaptor(Service::NEWS, $blnConnect);
    }

    
}
?>
