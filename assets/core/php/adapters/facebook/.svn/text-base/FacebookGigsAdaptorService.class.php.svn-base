<?php
/* 
 * This class will grab all youtube videos from the preset account
 */
class GoogleGigsAdaptorService extends GigsAdaptorServiceBase{
    const API_CALL_URL = "productsearch";
   
    public function ListAllGigs($intMaxSongs = 100){

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
        $strGoogleCalUrl = Application::GetSetting(GoogleSettings::GOOGLE_CAL_URL);
        if(is_null($strGoogleCalUrl)){
            return null;
        }
        try{
            $objGigColl = new GigCollection();
            $xmlCallXml = simplexml_load_file($strGoogleCalUrl);
            foreach($xmlCallXml->entry as $xmlEntry){
                $arrSummary = explode("&", $xmlEntry->summary);
                //When: Sat Feb 13, 2010 8:30pm to 10pm
                $arrDate = explode(" ", $arrSummary[0]);
                $strDate = sprintf("%s %s %s %s", $arrDate[1], $arrDate[2], $arrDate[3], $arrDate[4]);
                //die(print_r($xmlEntry));
                $objGigColl->AddNew(
                    $xmlEntry->title,
                    $arrSummary[0],
                    $strDate,
                    $xmlEntry->link[0]['href'],
                    ''
                );
                
            }
            return $objGigColl;
        }catch(Exception $e){

        }
        return $objMusicColl;
        
    }
}

?>
