<?php
/* 
 * This will control the services page
 */

class AddonsPage extends AdminPageBase{
    const ADDON = 'addon';
    const CUST_EDIT = 'cust_edit';
    public $arrAddons = null;
    public $strAddon = null;
    public $objAddonLibrary = null;
    public $strCustomSettingsPage = null;
    public $blnCustomSettingsPage = false;
    public $objSettingForm = null;
    public function  __construct() {
        parent::__construct(array(UserMetaRoll::ADMIN));
        $this->strSkinLoc = ADMIN_PAGES_SKINS_CORE_DIR . '/addons.tpl.php';
        //Read the query string
        $this->strAddon = (isset($_GET[self::ADDON]))?$_GET[self::ADDON]:null;

        $this->blnCustomSettingForm = ((isset($_GET[self::CUST_EDIT]))&&($_GET[self::CUST_EDIT] == 'true'))?true:false;

        $this->arrAddons = AddonDriver::ListAllAddons();

        if((!is_null($this->strAddon)) && (key_exists($this->strAddon, $this->arrAddons))){
            //then display a preview
            $this->objAddonLibrary = $this->arrAddons[$this->strAddon];
            $this->strCustomSettingsPage = $this->objAddonLibrary->CustomSettingsPageFull;
            if(!is_null($this->strCustomSettingsPage) && ($this->blnCustomSettingForm)){
                $this->strSkinLoc = $this->strCustomSettingsPage;
            }else{
                $this->objSettingForm = new AddonSettingForm($this->objAddonLibrary);
            }
        }   
    }
}
?>
