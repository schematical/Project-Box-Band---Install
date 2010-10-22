<?php
/* 
 * Will handle all of the settings for Linkshare Adaptor
 */
class LinkshareAdaptorSettingForm extends AdaptorSettingFormBase{
    protected $objMIDInput = null;
    public function  __construct() {
        $this->objMIDInput = new AdaptorSettingFormText($this, LinkshareSettings::LINKSHARE_MID, "Merchant Id");
    }
}
?>
