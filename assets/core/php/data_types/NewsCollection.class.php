<?php
/* 
 * This is the collection object in charge of controling Gig data objects
 */
class NewsCollection extends DataCollectionBase{
    
    public function AddNew($strName, $strDesc, $strDate, $strLink, $strAuthor){
        $this->Add(new NewsObject($strName, $strDesc, $strDate, $strLink, $strAuthor));
    }
}
?>
