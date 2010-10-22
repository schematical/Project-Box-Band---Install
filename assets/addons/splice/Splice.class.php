<?php
/* 
 * This handles drawing the splice data to the screen and almost all splice functionality
 */
class Splice{
    const SPLICE_SETTING_PREFIX = 'SPLICE_DATA_';
    const SPLICE_POST_DATA = "_spliceValue";
    public static $intSpliceCount = 0;
    public static $blnFooterDrawn = false;
    public static $strMode = null;
    public static $strSpliceHtml = null;
    public static $strId = null;
    public static $strEditPage = null;
    public static $intRows = null;
    public static $intCols = null;
    public static function DrawEditPage(){
        Splice::$strMode = SpliceMode::EDIT;
        Splice::$strEditPage = (isset($_POST[SpliceQueryString::PAGE_NAME]))?$_POST[SpliceQueryString::PAGE_NAME]:Page::INDEX;
        $strHtml = SkinDriver::RawEvaluate(SPLICE_EDIT_PAGE);
        //If the nav bar hasnt been drawn then draw it anyway, it should show there are no splices on this page
        if(!self::$blnFooterDrawn){
            $strHtml = SkinDriver::RawEvaluate(SPLICE_FOOTER_COMPONENT);
        }
    }
    public static function DrawSplice($strId, $strDefault = null, $intCols = 40, $intRows = 5){
        if(is_null($strDefault)){
            $strDefault = 'I am a blank splice. Edit me!';
        }
        self::$strId = $strId;
        self::$intSpliceCount += 1;
        self::$strSpliceHtml = Application::GetSetting(self::SPLICE_SETTING_PREFIX . self::$strId);
        self::$intCols = $intCols;
        self::$intRows = $intRows;
        if(is_null(self::$strSpliceHtml)){
            self::$strSpliceHtml = $strDefault;
        }
        switch(self::$strMode){
            case(SpliceMode::EDIT):
                //Check to see if info has been posted
                if(isset($_POST[self::$strId . self::SPLICE_POST_DATA])){
                    //if so save it
                    self::$strSpliceHtml = $_POST[self::$strId . self::SPLICE_POST_DATA];
                    Application::SetSetting(self::SPLICE_SETTING_PREFIX . self::$strId, self::$strSpliceHtml);
                }
                //Display what is currently in the splice
                $strHtml = SkinDriver::RawEvaluate(SPLICE_EDIT_COMPONENT);
                if(!self::$blnFooterDrawn){
                    $strHtml = SkinDriver::RawEvaluate(SPLICE_FOOTER_COMPONENT);
                    self::$blnFooterDrawn = true;
                }

            break;
            case(SpliceMode::DISPLAY):
            default:/* if it hasnt been set just set it to display */
                 if(is_null(self::$strSpliceHtml)){
                     echo $strDefault;
                 }else{
                     echo self::$strSpliceHtml;
                 }
            break;
        }
    }
}
?>
