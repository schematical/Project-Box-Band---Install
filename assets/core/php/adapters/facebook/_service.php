<?php
/* 
 * This file will connect all classes associated with this adaptor
 *
 */

$strDirname = dirname(__FILE__);
require_once($strDirname . '/_enum.php');
Application::$arrAutoLoadedClasses['FacebookAdaptorLibrary'] = $strDirname . '/FacebookAdaptorLibrary.class.php';
Application::$arrAutoLoadedClasses['FacebookAdaptorConnection'] = $strDirname . '/FacebookAdaptorConnection.class.php';
Application::$arrAutoLoadedClasses['FacebookGigsAdaptorService'] = $strDirname . '/FacebookGigsAdaptorService.class.php';
Application::$arrAutoLoadedClasses['FacebookAdaptorSettingForm'] = $strDirname . '/FacebookAdaptorSettingForm.class.php';

?>
