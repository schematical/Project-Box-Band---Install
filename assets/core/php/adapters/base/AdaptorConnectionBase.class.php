<?php
/* 
 * This sets up the connection between this app and the providors API
 */
abstract class AdaptorConnectionBase{
    protected $blnConnected = false;

    public function Connect(){
        //There is nothing to do here
        $this->blnConnected = true;
    }
    
    
}
?>
