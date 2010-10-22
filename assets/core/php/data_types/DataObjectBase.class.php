<?php
/* 
 * This class will be the base for all data types we need to track
 */
abstract class DataObjectBase{
    public function DrawFromTemplate($strSkinLoc, $blnPrint = true){
        $strHtml = SkinDriver::RawEvaluate($strSkinLoc, false, $this);
        if($blnPrint){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }
}
?>
