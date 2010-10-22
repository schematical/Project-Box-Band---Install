<?php
/* 
 * This is the collection object in charge of controling Gig data objects
 */
class GigCollection extends DataCollectionBase{
    
    public function AddNew($strName, $strDesc, $strDate, $strLink, $strLocation){
        $this->Add(new GigObject($strName, $strDesc, $strDate, $strLink, $strLocation));
    }
}
?>
