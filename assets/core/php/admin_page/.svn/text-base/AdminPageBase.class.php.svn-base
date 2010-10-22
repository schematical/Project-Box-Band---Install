<?php
/* 
 * This is the base for all admin pages
 */
abstract class AdminPageBase{
    protected $strSkinLoc;
    protected $arrAllowedRoll = array();
    public function  __construct($arrAllowedRolls) {
        $this->arrAllowedRoll = $arrAllowedRolls;
        
    }
    public function Draw($blnPrint = true){
        $strHtml = SkinDriver::RawEvaluate($this->strSkinLoc, false, $this);
        if($blnPrint){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }
      public function  __get($strName) {
        switch($strName){
            case('AllowedRoll'):
                return $this->arrAllowedRoll;
            break;
            default:
                throw new Exception("No property with name '" . $strName . "' in class '" . __CLASS__ . "'");
            break;
        }
    }
    
}
?>
