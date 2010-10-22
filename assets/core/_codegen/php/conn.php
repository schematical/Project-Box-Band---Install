<?php
define("ROOT_DIR", "/home/content/m/a/d/madisonbars/html/ride2shoot/assets/core/_codegen/");
define("DB_XML_PATH", ROOT_DIR . "config/xml/db.xml");
define("TEMP_XML_PATH", ROOT_DIR . "config/xml/temp.xml");
define("TEMP_DIR_PATH", ROOT_DIR . "config/templates/");
define("ESCAPE_IDENT_BEGIN","<%");
define("ESCAPE_IDENT_END","%>");
$includeArr = array();
$includeArr['dbParser'] = 'dbParser.php';
$includeArr['fieldObj'] = 'fieldObj.php';
$includeArr['tableObj'] = 'tableObj.php';
$includeArr['tempDriver'] = 'tempDriver.php';
$includeArr['baseXMLParser'] = 'baseXMLParser.php';
$includeArr['dbXMLParser'] = 'dbXMLParser.php';
$includeArr['tempXMLParser'] = 'tempXMLParser.php';
$includeArr['genDriver'] = 'genDriver.php';
//$includeArr['dbParser'] = 'dbParser.php';
foreach($includeArr as $includeArr){
    require_once($includeArr);

}
?>