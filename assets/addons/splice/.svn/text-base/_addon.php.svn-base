<?php
$strDirname = dirname(__FILE__);
require_once($strDirname . '/_enum.php');
define("SPLICE_EDIT_COMPONENT", $strDirname . "/skins/component/splice_edit.tpl.php");
define("SPLICE_FOOTER_COMPONENT", $strDirname . "/skins/component/splice_footer.tpl.php");
define("SPLICE_EDIT_PAGE", $strDirname . "/skins/page/splice.tpl.php");
Application::$arrAutoLoadedClasses['Splice'] = $strDirname . '/Splice.class.php';
Application::AddAsset(new CssAsset($_ADDON_URL. '/css/splice.css'));
Application::AddAsset(new JsAsset($_ADDON_URL. '/js/splice.js'));
?>
