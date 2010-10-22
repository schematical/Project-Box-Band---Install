<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class YoutubeAdaptorLibrary extends AdaptorLibraryBase{

     public function Initilize(){
         parent::Initilize('youtube', 'YouTube');//This connects to the API
         $this->AddService(Service::VIDEO, 'YoutubeVideoAdaptorService');
         
     }
}
?>
