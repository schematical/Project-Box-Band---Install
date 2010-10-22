<?php
/* 
 * This file will connect all classes associated with this adaptor
 *
 */

$strDirname = dirname(__FILE__);
require_once($strDirname . '/_enum.php');
Application::$arrAutoLoadedClasses['RssAdaptorLibrary'] = $strDirname . '/RssAdaptorLibrary.class.php';
Application::$arrAutoLoadedClasses['RssAdaptorConnection'] = $strDirname . '/RssAdaptorConnection.class.php';
Application::$arrAutoLoadedClasses['RssNewsAdaptorService'] = $strDirname . '/RssNewsAdaptorService.class.php';
Application::$arrAutoLoadedClasses['RssAdaptorSettingForm'] = $strDirname . '/RssAdaptorSettingForm.class.php';

?>
