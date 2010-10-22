<?php
/* 
 * This will control the services page
 */
class SkinsPage extends AdminPageBase{
    const SKIN = 'skin';
    const ACTIVATE = 'ACTIVATE';
    public $arrSkins = null;
    public $strSkin = null;
    public $objSkinLibrary = null;
    public $blnActivate = false;

    public function  __construct() {
        parent::__construct(array(UserMetaRoll::ADMIN));
        $this->strSkinLoc = ADMIN_PAGES_SKINS_CORE_DIR . '/skins.tpl.php';
        //Read the query string
        $this->strSkin = (isset($_GET[self::SKIN]))?$_GET[self::SKIN]:null;

        $this->blnActivate = ((isset($_GET[self::ACTIVATE]))&&($_GET[self::ACTIVATE] == 'true'))?true:false;
        
        $this->arrSkins = SkinDriver::ListAllSkins();

        if((!is_null($this->strSkin)) && (key_exists($this->strSkin, $this->arrSkins))){
            //then display a preview
            $this->objSkinLibrary = $this->arrSkins[$this->strSkin];
            if($this->blnActivate){
                /**
                 * todo: prompt to see if the requiredAddons are downloaded else download
                 */
                SkinDriver::ActivateSkin($this->objSkinLibrary);
            }
        }   
    }
}
?>
