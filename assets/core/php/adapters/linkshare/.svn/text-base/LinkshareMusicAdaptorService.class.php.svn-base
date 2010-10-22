<?php
/* 
 * This class will grab all youtube videos from the preset account
 */
class LinkshareMusicAdaptorService extends MusicAdaptorServiceBase{
    const API_CALL_URL = "productsearch";
   
    public function GetAllSongs($intMaxSongs = 100){

        $objMusicColl = new MusicCollection();
        $objMusicColl->AddNew('Song 1', 'http://www.3villabs.com', "<a href='http://www.3villabs.com'>I am a link to buy a song</a>");
        $objMusicColl->AddNew('Song 2', 'http://www.dibsonthefatty.com', "<a href='http://www.dibsonthefatty.com'>I am a link to buy another song</a>");
        return $objMusicColl;


        //load settings
        $strMerchentId = Application::GetSetting(LinkshareSettings::LINKSHARE_MID);
        //parse the query params
        return $this->QueryColl(
            new QSParam(LinkshareQueryString::MID, $strMerchentId),
            new QSParam(LinkshareQueryString::MAX, $intMaxSongs)
        );
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
        $strUrl = LINKSHARE_API_URL . self::API_CALL_URL;

  
        $strRestUrl = sprintf("%?token=%s&%s", $strUrl, LINKSHARE_TOKEN, $strQueryParams);
        $strSafeQuery = urlencode($strRestUrl);
        $objXml = simplexml_load_file($strSafeQuery);
        // Check to see if the XML response was loaded, else print an error
        if ($objXml)
         {
            $objMusicColl = new MusicCollection();
            // If the XML response was loaded, parse it and build links
            foreach ($objXml as $objItem) {
                $strLink  = $objItem->linkurl;
                $strTitle = $objItem->productname;
                $strImgUrl = $objItem->imageurl;
                $strPrice = $objItem->price;
                $strMerchantName = $objItem->merchantname;
                $strEmbed ="<a href=\"$strLink\">Merchant Name:<b> $strMerchantName </b>| Product Name: $strTitle | Price:$strPrice<IMG
        border=\"0\" src=\"$strImgUrl\"></a><br/>";
                $objMusicColl->AddNew($strTitle, $strLink, $strEmbed);
            }
            return $objMusicColl;
        }else {
            return null;
        }
    }
}

?>
