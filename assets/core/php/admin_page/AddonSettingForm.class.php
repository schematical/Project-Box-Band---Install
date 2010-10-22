<?php
/* 
 * This class will take an AddonLibrary in the constructor that will auto populate the settings
 */
class AddonSettingForm extends SettingFormBase{

    public function __construct($objAddonLibrary) {
        $arrSettings = $objAddonLibrary->Settings;
        foreach($arrSettings as $objSetting){
            switch($objSetting->Type){
                case(SettingFormInputType::TEXT):
                default:
                    $objInput = new SettingFormText($this, $objSetting->Name, $objSetting->DisplayName);
                break;
            }
        }
    }
}
?>
