<?php
/* 
 * This class will grab all youtube videos from the preset account
 */
class YoutubeVideoAdaptorService extends VideoAdaptorServiceBase{
    const API_URL = 'http://gdata.youtube.com/feeds/api/users/%s/uploads?%s';

    public $strId;//This holds a temporary ID
    public function QueryColl(){
        $arrArgs = func_get_args();
        if(count($arrArgs) < 1){
            throw new Exception("A you tube video query needs at least one parameter of a username string");
        }
        $strUsername = $arrArgs[0];
        $strQS = '';
        for($i = 1; $i < count($arrArgs); $i++){
            $strQS .= $arrArgs[$i]->ToString() . "&";
        }
        $strUrl = sprintf(self::API_URL, $strUsername, $strQS);
        try{
            $xmlResponse = simplexml_load_file($strUrl);
            $objVideoColl = new VideoCollection();
            //die("Reading: . " . print_r($xmlResponse));
            foreach($xmlResponse->entry as $xmlEntity){
                $arrParts = explode("/", $xmlEntity->id);
                $this->strId = $arrParts[count($arrParts)-1];
                //$strEmbed = SkinDriver::RawEvaluate(VIDEO_EMBED_SKIN_LOC, false, $this);
                
                $objVideoColl->AddNew($xmlEntity->title, $xmlEntity->link[0], 'xxx');//$strEmbed);
            }
            return $objVideoColl;
        }catch(Exception $e){
            return new VideoCollection();
        }
    }
    public function ListVideos($strOrderBy = null){
        $strUsername = Application::GetSetting(YoutubeSettings::YOUTUBE_USERNAME);
        if(is_null($strUsername)){
            throw new Exception("No username set in the admin for youtube");
        }
        if(is_null($strOrderBy)){
            $strOrderBy = YoutubeOrderBy::UPDATED;
        }
        $objVideoColl = $this->QueryColl($strUsername, new QSParam(YoutubeQueryString::ORDER_BY, $strOrderBy));
        return $objVideoColl;

    }
}

?>
