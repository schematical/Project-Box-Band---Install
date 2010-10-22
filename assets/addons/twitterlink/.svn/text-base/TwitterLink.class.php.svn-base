<?php
/* 
 * This handles drawing the splice data to the screen and almost all splice functionality
 */
class TwitterLink{
    public static $strUsername = null;
    public static $strImageUrl = null;
    
    public static function DrawLink($strImageUrl = null){
        //if the TWITTERLINK_USERNAME setting has been defined
        self::$strUsername = Application::GetSetting(TwitterLinkSettings::TWITTERLINK_USERNAME);
        if(!is_null(self::$strUsername)){
            //draw the image link
            if(is_null($strImageUrl)){
                self::$strImageUrl = TWITTERLINK_IMG_URL;
            }else{
                self::$strImageUrl = $strImageUrl;
            }
            SkinDriver::RawEvaluate(TWITTERLINK_SKIN_LOC);
            
        }
        //else do nothing
    }
}
?>
