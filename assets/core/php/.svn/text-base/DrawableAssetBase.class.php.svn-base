<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class DrawableAssetBase{
    public function Draw($blnPrint = true){
        $strTemplateLoc = COMPONENTS_SKINS_CORE_DIR . "/assets/" . get_class($this) . ".tpl.php";
        $strHtml = SkinDriver::RawEvaluate($strTemplateLoc, false, $this);
        
        if($blnPrint){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }
}
?>
