<?php
/* 
 * This holds all references to this services, connections, and setting forms associated with this
 * providor
 */

class InternalAdaptorLibrary extends AdaptorLibraryBase{

     public function Initilize(){
         parent::Initilize('internal', 'Internal');//This connects to the API
         $this->AddService(Service::MUSIC, 'InternalMusicAdaptorService');
         
     }
     
}
?>
