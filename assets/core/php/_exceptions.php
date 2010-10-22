<?php
/* 
 * This is thrown when an addon does not exist
 */
class AddonMissingException extends Exception{

    public function __construct($strEmail,$code = null) {
        $strMessage = sprintf("'%s' addon has not been downloaded or installed correctly", $strEmail);
        parent::__construct($strMessage,$code);
    }
}
/*
 * This is thrown by the auth driver and should be cought and displayed properly
 */
class AuthDriverException extends Exception{

    public function __construct($strEmail,$code = null) {
        $strMessage = sprintf("A User with an email address of '%s' already exists", $strEmail);
        parent::__construct($strMessage,$code);
    }
}
class DataBaseException extends Exception{

    public function __construct($strMessage,$code = null) {
        parent::__construct($strMessage,$code);
    }
}
?>
