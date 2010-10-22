<?php
/* 
 * This will control the services page
 */
class ServicesPage extends AdminPageBase{
    const SERVICE = 'service';
    const PROVIDER = 'provider';
    const ACTIVATE = 'ACTIVATE';
    public $strService = null;
    public $arrProvidors = null;
    public $strProvidor = null;
    public $blnActivate = false;
    public $objProvidorForm = null;

    public function  __construct() {
        parent::__construct(array(UserMetaRoll::ADMIN));
        $this->strSkinLoc = ADMIN_PAGES_SKINS_CORE_DIR . '/services.tpl.php';
        //Read the query string
        $this->strService = (isset($_GET[self::SERVICE]))?$_GET[self::SERVICE]:null;

        $this->strProvidor = (isset($_GET[self::PROVIDER]))?$_GET[self::PROVIDER]:null;

        $this->blnActivate = ((isset($_GET[self::ACTIVATE]))&&($_GET[self::ACTIVATE] == 'true'))?true:false;
        
        if(!is_null($this->strService)){
            //get all of the providors for that service
            $this->arrProvidors = ServiceDriver::GetIndServiceProvidors($this->strService);
            if(!is_null($this->strProvidor)){
                $objAdaptorLibrary = ServiceDriver::InitilizeAdaptorLibrary($this->strProvidor);
                if(!is_null($objAdaptorLibrary)){
                    $this->objProvidorForm = $objAdaptorLibrary->GetSettingsForm();
                    if($this->blnActivate){
                        ServiceDriver::ActivateServiceProvidor($this->strService, $this->strProvidor);
                    }
                }
            }
        }
        
        
        
    }
    public function DrawMain($blnDraw){
        //if a service has been selected list all providors available for that service
        $strHtml = SkinDriver::RawEvaluate($strTemplate, false, $this);
        if($blnDraw){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }
    
}
?>
