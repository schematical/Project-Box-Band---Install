<?php
/* 
 * This will display and allow the user to change a text based setting
 */
class SettingFormText extends SettingFormInputBase{
    public function  __construct($objForm, $strSetting, $strDisplayName) {
        parent::__construct($objForm, $strSetting, $strDisplayName);
    }

}
?>
