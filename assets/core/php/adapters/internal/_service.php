<?php
/* 
 * This file will connect all classes associated with this adaptor
 *
 */

$strDirname = dirname(__FILE__);
require_once($strDirname . '/_enum.php');
Application::$arrAutoLoadedClasses['InternalAdaptorLibrary'] = $strDirname . '/InternalAdaptorLibrary.class.php';
Application::$arrAutoLoadedClasses['InternalAdaptorConnection'] = $strDirname . '/InternalAdaptorConnection.class.php';
Application::$arrAutoLoadedClasses['InternalMusicAdaptorService'] = $strDirname . '/InternalMusicAdaptorService.class.php';
Application::$arrAutoLoadedClasses['InternalAdaptorSettingForm'] = $strDirname . '/InternalAdaptorSettingForm.class.php';

?>
