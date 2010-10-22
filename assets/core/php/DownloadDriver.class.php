<?php
/* 
 * This class will be responsible for controling downloads, saving, zipping, updateing, etc
 */
abstract class DownloadDriver{
    public static function WriteFile(){
        file_put_contents($filename, $data);
    }
}
?>
