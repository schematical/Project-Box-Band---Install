<?php
/* 
 * This will display and allow the user to change a text based setting
 */
class SettingFormInputBase{
    const INPUT_NAME_POST = "_value";
    public $strSetting;
    public $strValue;
    public $strDisplayName;
    public $objForm;
    
    public function  __construct($objForm, $strSetting, $strDisplayName) {
        $this->objForm = $objForm;
        $this->objForm->AddInput($this);

        $this->strSetting = $strSetting;
        $this->strDisplayName = $strDisplayName;
        if(isset($_POST[$this->strSetting  . self::INPUT_NAME_POST])){
            Application::SetSetting($this->strSetting, $_POST[$this->strSetting  . self::INPUT_NAME_POST]);
        }
        $this->strValue = Application::GetSetting($strSetting);
        
    }
    public function Draw($blnPrint = true){
        $strSkinLoc = ADMIN_COMPONENTS_SKINS_CORE_DIR . "/" .get_class($this) . '.tpl.php';
        $strHtml = SkinDriver::RawEvaluate($strSkinLoc, false, $this);
        if($blnPrint){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }

}
?>
