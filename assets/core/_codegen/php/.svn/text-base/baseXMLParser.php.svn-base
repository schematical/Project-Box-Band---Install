<?php
class baseXMLParser{
    private static $currFilePath;
    protected static $XML;
    protected static function load($filePath){
        if(file_exists($filePath)){
            self::$currFilePath = $filePath;
            //echo("Path:".$filePath);
            $xmlStr = file_get_contents($filePath);
            //echo "XMLSTR:" .$xmlStr;
            self::$XML = new SimpleXMLElement($xmlStr);
           
        }else{
            throw new Exception("No Template XML File found at " . $filePath);
        }
    }
    
}

?>
