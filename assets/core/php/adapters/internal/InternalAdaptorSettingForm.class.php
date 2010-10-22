<?php
/* 
 * Will handle all of the settings for Linkshare Adaptor
 */
class GoogleAdaptorSettingForm extends AdaptorSettingFormBase{
    protected $objCalenderUrlInput = null;
    public function  __construct() {
        $this->objCalenderUrlInput = new AdaptorSettingFormText($this, GoogleSettings::GOOGLE_CAL_URL, "Calender XML URL");
    }
}
?>
