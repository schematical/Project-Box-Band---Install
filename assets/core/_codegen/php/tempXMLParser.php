<?php
class tempXMLParser extends baseXMLParser{

    public static function parseXml($filePath){
        self::load($filePath);
        return self::$XML->template;
    }
     public static function parseConnXml($filePath){
        self::load($filePath);
        return self::$XML->connTemplate;
        
    }


}
?>
