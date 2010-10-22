<?php
/* 
 * This is the base for all video services communitcations
 */
abstract class VideoAdaptorServiceBase extends AdaptorServiceBase{
    public function __construct($objLibrary) {
        parent::__construct($objLibrary, Service::VIDEO);
    }
}
?>
