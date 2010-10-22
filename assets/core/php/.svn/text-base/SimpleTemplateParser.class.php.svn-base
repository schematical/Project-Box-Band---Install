<?php
/* 
 * This is a simple version of my template parsing class for code generation
 */
abstract class SimpleTemplateParser{
    const PREFIX = '<%=';
    const POSTFIX = '%>';


   public static function ParseTemplate($strTemplateLoc, $arrVars){
       if(!file_exists($strTemplateLoc)){
           throw new Exception("File does not exist (" . $strTemplateLoc . ")");
       }
       $strCont = file_get_contents($strTemplateLoc);
       $strContFinal = '';
       $intStartPos = strpos($strCont, self::PREFIX);
       while($intStartPos !== false){
            //echo( $strCont . "<br>");
            $intEndPos = strpos($strCont, self::POSTFIX, $intStartPos) + strlen(self::POSTFIX);
            $strContFinal .= substr($strCont, 0, $intStartPos);
           
            $strEval = substr($strCont, ($intStartPos + strlen(self::PREFIX)), (($intEndPos - strlen(self::POSTFIX)) - ($intStartPos + strlen(self::PREFIX))));
            $strVarName = str_replace(" ", "", $strEval);
            $strVarName = str_replace(";", "", $strVarName);
           
            if(key_exists($strVarName, $arrVars)){
                $strContFinal .= $arrVars[$strVarName];
            }
            $strCont = substr($strCont, $intEndPos);
            $intStartPos = strpos($strCont, self::PREFIX);
       }
       return $strContFinal . $strCont;
   }


}
?>
