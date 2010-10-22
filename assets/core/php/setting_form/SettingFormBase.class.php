<?php
/* 
 * This will get all of the settings from the user for to authenticat their account
 */
abstract class SettingFormBase{
    protected $arrInputs = array();
    public function AddInput($objInput){
        $this->arrInputs[] = $objInput;
    }
    public function Draw($blnPrint = true){
        //draw component header
        $strHtml = SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . '/SettingForm_header.tpl.php', false, $this);
        //iterate through the inputs and draw each one
        
        foreach($this->arrInputs as $objInput){
            $strHtml .= $objInput->Draw(false);
        }
        //draw the footer(w/submit button)
        
        $strHtml .= SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . '/SettingForm_footer.tpl.php', false, $this);
        if($blnPrint){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }
    
}
?>
