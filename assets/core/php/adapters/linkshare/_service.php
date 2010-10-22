<?php
/* 
 * This file will connect all classes associated with this adaptor
 *
 */
define('LINKSHARE_TOKEN', 'fc68a87238f603684b5afe61c9377b58a7feabf032ce67630a47e0a341bed860');
define('LINKSHARE_API_URL', 'http://feed.linksynergy.com/');

$strDirname = dirname(__FILE__);
require_once($strDirname . '/_enum.php');
Application::$arrAutoLoadedClasses['LinkshareAdaptorLibrary'] = $strDirname . '/LinkshareAdaptorLibrary.class.php';
Application::$arrAutoLoadedClasses['LinkshareAdaptorConnection'] = $strDirname . '/LinkshareAdaptorConnection.class.php';
Application::$arrAutoLoadedClasses['LinkshareMusicAdaptorService'] = $strDirname . '/LinkshareMusicAdaptorService.class.php';
Application::$arrAutoLoadedClasses['LinkshareAdaptorSettingForm'] = $strDirname . '/LinkshareAdaptorSettingForm.class.php';

?>
