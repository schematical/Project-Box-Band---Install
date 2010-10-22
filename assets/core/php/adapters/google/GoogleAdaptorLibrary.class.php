<?php
/* 
 * This holds all references to this services, connections, and setting forms associated with this
 * providor
 */

class GoogleAdaptorLibrary extends AdaptorLibraryBase{

     public function Initilize(){
         parent::Initilize('google', 'Google');//This connects to the API
         $this->AddService(Service::GIGS, 'GoogleGigsAdaptorService');
         
     }
     
}
?>
