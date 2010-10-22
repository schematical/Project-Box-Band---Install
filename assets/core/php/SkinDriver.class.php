<?php
/* 
 * This class will control the loading of skins
 */
abstract class SkinDriver{

    public static function ActivateSkin($objSkinLibrary){
        if(get_class($objSkinLibrary) != 'SkinLibrary'){
            throw new Exception("SkinDriver->ActivateSkin can only activate a instance of SkinLibrary");
        }
        Application::SetSetting(Settings::ACTIVE_SKIN, $objSkinLibrary->Name);
    }
    public static function EvaluatePage($strPage){
        
        $strTplLoc = sprintf("%s/pages/%s.tpl.php", Application::$strActiveSkinDir, $strPage);
        if(file_exists($strTplLoc)){
            $strHtml = self::RawEvaluate($strTplLoc);
        }else{
            throw new Exception("Page template file does not exist(" . $strTplLoc . ")");
        }
        return $strHtml;
    }
    public static function EvaluateComponent($strComponent){
        $strTplLoc = sprintf("/%s/components/%s.tpl.php", Application::$strActiveSkinDir, $strComponent);
        if(file_exists($strTplLoc)){
            $strHtml = self::RawEvaluate($strTplLoc);
        }else{
            throw new Exception("Page template file does not exist(" . $strTplLoc . ")");
        }
        return $strHtml;
    }
    public static function EvaluateAddonComponent($strAddon, $strComponent){

    }
    public static function EvaluateHeader(){
        if(Application::$strCallType == CallType::AJAX){
            return null;
        }else{
            //Add requires for css/js
            //Place form data
            $strReturn = self::EvaluateComponent(Components::HEADER);
            $strReturn .= self::EvaluateCoreComponent(CoreComponents::FORM_START);
            return $strReturn;
        }
    }
    public static function EvaluateFooter(){
        if(Application::$strCallType == CallType::AJAX){
            return null;
        }else{
            //Add requires for css/js
            //Place form data
            $strReturn = self::EvaluateCoreComponent(CoreComponents::FORM_END);
            $strReturn .= self::EvaluateComponent(Components::FOOTER);
            return $strReturn;
        }
    }
    public static function EvaluateCoreComponent($strComponent){
        $strTplLoc = sprintf("%s/%s.tpl.php", CORE_SKINS_DIR, $strComponent);
        if(file_exists($strTplLoc)){
            $strHtml = self::RawEvaluate($strTplLoc);
        }else{
            throw new Exception("Page template file does not exist(" . $strTplLoc . ")");
        }
        return $strHtml;
    }
    public static function RawEvaluate($strTemplate, $blnPrint = true, $objControl = null){
        if(!is_null($objControl)){
            $_THIS = $objControl;
        }
        if(!file_exists($strTemplate)){
            throw new Exception("Page template file does not exist(" . $strTemplate . ")");
        }else{
            $strAlreadyRendered = ob_get_contents();
            if(strlen($strAlreadyRendered) > 0){
                ob_clean();
            }
            ob_start('__ob_tempRun');
            require($strTemplate);
            $strTemplateEvaluated = ob_get_contents();
            if(strlen($strTemplateEvaluated) > 0){
                ob_end_clean();
            }
            /*if(!ob_end_clean()){
                throw new Exception("Buffer could not be cleaned");
            }*/

            print($strAlreadyRendered);
            
            if($blnPrint){
                echo $strTemplateEvaluated;
            }else{
                return $strTemplateEvaluated;
            }
        }
    }
    public static function StartFlush($buffer){
        //this function pretty much handels every thing
        //error handeling
        //page rendering
        //ajax
        //form validation


        $rDataStr = $buffer;

        return $rDataStr;
    }
    public static function ListAllSkins(){
        $arrSkins = array();
        $objDir = dir(SKINS_DIR);
        
        while (false !== ($strEntity = $objDir->read())) {
           if(
              ($strEntity != '.') &&
              ($strEntity != '..')
           ){
                try{
                    $arrSkins[$strEntity] = new SkinLibrary($strEntity);
                }catch (Exception $e){
                    //I dont know yet
                    //throw $e;
                }
           }
        }
        $objDir->close();
        return $arrSkins;
    }
}
?>
