<?php
/* 
 * This class will grab all youtube videos from the preset account
 */
class RssNewsAdaptorService extends NewsAdaptorServiceBase{
    protected $strRssType = null;
    public function ListAllNews($intMaxSongs = 100){
        //parse the query params
        return $this->QueryColl();
    }
    public function QueryColl(){
        $arrArgs = func_get_args();
        $arrQSParams = array();
        foreach($arrArgs as $objQSParam){
            if(get_class($objQSParam) == 'QSParam'){
                $arrQSParams[] = $objQSParam->ToString();
            }else{
                throw new Exception("All arguments in function 'QueryColl' must be QSParams");
            }
        }
        $strQueryParams = implode("&", $arrQSParams);
        $strRssUrl = Application::GetSetting(RssSettings::RSS_URL);
        if(is_null($strRssUrl)){
            return null;
        }
        try{
            $objNewsColl = new NewsCollection();
            $xmlRss = simplexml_load_file($strRssUrl);
            switch($xmlRss->getName()){
                case(RssNodeName::FEED):
                    $this->strRssType = RssType::ATOM;
                break;
                case(RssNodeName::RSS):
                    $this->strRssType = RssType::RSS2;
                break;
                default:
                    throw new Exception("This rss feed in an unreconizable type");
                break;
            }
            
            switch($this->strRssType){
                case(RssType::ATOM):
                    foreach($xmlRss->entry as $xmlEntry){
                        $objNewsColl->AddNew(
                            $xmlEntry->title,
                            $xmlEntry->summary,
                            $xmlEntry->published,
                            $xmlEntry->link,
                            ''
                        );
                    }
                break;
                case(RssType::RSS1):
                case(RssType::RSS2):
                    foreach($xmlRss->channel->item as $xmlEntry){
                        $objNewsColl->AddNew(
                            $xmlEntry->title,
                            $xmlEntry->description,
                            $xmlEntry->pubDate,
                            $xmlEntry->link,
                            ''
                        );
                    }
                break;
                default:
                    //The testing above should make this impossible, but just to be thoural
                    throw new Exception("Null or Unreconized RSS Type Set (" . $this->strRssType . ")");
                break;
            }
                
                
            
            return $objNewsColl;
        }catch(Exception $e){
            throw $e;
        }
        return $objMusicColl;
        
    }
}

?>
