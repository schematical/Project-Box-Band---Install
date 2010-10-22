<?php
/*
 * This is the base for all Gig services communitcations
 */
abstract class NewsAdaptorServiceBase extends AdaptorServiceBase{
    public function __construct($objLibrary) {
        parent::__construct($objLibrary, Service::NEWS);
    }
}
?>
