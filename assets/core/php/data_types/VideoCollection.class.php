<?php
/* 
 * This is the collection object in charge of controling video data objects
 */
class VideoCollection extends DataCollectionBase{

    public function AddNew($strName, $strLink, $strEmbed){
        $this->Add(new VideoObject($strName, $strLink, $strEmbed));
    }
}
?>
