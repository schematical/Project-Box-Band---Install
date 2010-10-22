<?php
/* 
 * This file will connect all classes associated with this adaptor
 *
 */
$strDirname = dirname(__FILE__);
require_once($strDirname . '/_enum.php');
Application::$arrAutoLoadedClasses['MyspaceAdaptorLibrary'] = $strDirname . '/MyspaceAdaptorLibrary.class.php';
Application::$arrAutoLoadedClasses['MyspaceAdaptorConnection'] = $strDirname . '/MyspaceAdaptorConnection.class.php';
Application::$arrAutoLoadedClasses['MyspaceVideoAdaptorService'] = $strDirname . '/MyspaceVideoAdaptorService.class.php';
Application::$arrAutoLoadedClasses['MyspaceAdaptorSettingForm'] = $strDirname . '/MyspaceAdaptorSettingForm.class.php';

?>
