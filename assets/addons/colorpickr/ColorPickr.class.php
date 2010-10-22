<?php
/* 
 * This will serve as the main driver class for most of our color pickr functionality
 */
class ColorPickr{

    public static function Color1(){
        return Application::GetSetting(ColorPickrSettings::COLORPICKR_COLOR1);
    }
    public static function Color2(){
        return Application::GetSetting(ColorPickrSettings::COLORPICKR_COLOR2);
    }
    public static function Color3(){
        return Application::GetSetting(ColorPickrSettings::COLORPICKR_COLOR3);
    }
    public static function Draw($strFileLoc = null){
        if(is_null($strFileLoc)){
            $strFileLoc = COLORPICKR_CSS_SKIN;
        }
        return SkinDriver::RawEvaluate($strFileLoc);
    }
    
}
?>
