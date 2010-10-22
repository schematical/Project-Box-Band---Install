<?php
/* 
 * This holds all references to this services, connections, and setting forms associated with this
 * providor
 */

class RssAdaptorLibrary extends AdaptorLibraryBase{

     public function Initilize(){
         parent::Initilize('rss', 'Rss');//This connects to the API
         $this->AddService(Service::NEWS, 'RssNewsAdaptorService');
         
     }
     
}
?>
