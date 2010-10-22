<?php
abstract class genDriver{
    private static $logStr;
    public static function log($str){
        echo sprintf("%s  <br>\n", $str);
        //self::$logStr .= sprintf("%s  <br>\n", $str);
    }
	public static function run(){
        //load the data base from xml
        $dbNodes = dbXMLParser::parseXml(DB_XML_PATH);
        //populate the tables collections
        foreach($dbNodes as $db){
            //$db will be a list of nodes pull the appropriate attributes from it       
            self::log("Parsing Database:" . $db['hostname'] . "." .  $db['dbname']);
            $tables = dbParser::readDB($db['hostname'], $db['username'], $db['password'], $db['dbname']);
          
        }
        
        //load the template from xml
        $tempNodes = tempXMLParser::parseXml(TEMP_XML_PATH);
        //loop through and create templates
        foreach($tempNodes as $temp){
            self::log(sprintf("Parsing Template:%s => %s (%s)", $temp['from'], $temp['to'], $temp['capitalize']));


            self::parseTemp(TEMP_DIR_PATH . $temp['from'], $temp['to'], $temp['overwrite'], $temp['capitalize'], $tables);
        }

        //generate conn files
        $connTempNodes = tempXMLParser::parseConnXml(TEMP_XML_PATH);
        //loop through and create templates
        foreach($connTempNodes as $temp){
            self::log(sprintf("Parsing Conn Template:%s => %s (%s)", $temp['from'], $temp['to'], $temp['overwrite'], $temp['capitalize']));
            self::parseConnTemp(TEMP_DIR_PATH . $temp['from'], $temp['to'], $temp['overwrite'], $temp['capitalize'], $tables);
        }
    }
    public static function parseTemp($tempFromLoc, $tempToLoc, $overwrite, $capitalize, $tables){
        foreach($tables as $t){
			$t->getChildren();
			self::createNewFile($t, $tempFromLoc, $tempToLoc, $overwrite, $capitalize);
		}
    }
	public static function createNewFile($table, $tempFromLoc, $tempToLoc, $overwrite, $capitalize, $writeDb = true, $writeFiles = true){
        //declair native functions to ignore
        //TODO: make this adjustable in the db file
       if(!$capitalize == 'true'){
           $newFileLoc = str_replace("*", $table->name, $tempToLoc);
       }else{
           $newFileLoc = str_replace("*", tempDriver::capatilize($table->name), $tempToLoc);
       }
       self::log(sprintf("Creating New File:" . $newFileLoc));
      
        if(!file_exists($newFileLoc) || ($overwrite == 'true')){
            $nativeArr = array("creDate", "creUser", "endDate");

            //make directorys
                $fileInfo = pathinfo($tempToLoc);
                $saveClassDir = $fileInfo['dirname'];
                

                if(!is_dir($saveClassDir) && $writeFiles) {

                   if (!mkdir($saveClassDir, 0777, true)) {
                        throw new Exception("Could not make directory(" . $saveClassDir . ")");
                       return false;
                   }
                }
            // Interate through database
                    //load each table in to a table object
                $vArr = array();
                $vArr['table'] = $table;
                
                if($capitalize == 'true'){
                    $vArr['className'] = tempDriver::capatilize($table->name);
                }else{
                    $vArr['className'] = $table->name;
                }
                $vArr['fields'] = fieldObj::getFieldNamesFromArr($table->fields);
                $vArr['fieldObjs'] = $table->fields;
                $vArr['childFields'] = $table->children;
                $vArr['parentFields'] = $table->parents;
                $vArr['pKey'] = $table->pKeyField->name;
                
                $templateClassStr = tempDriver::renderTempFromFile($tempFromLoc, $vArr, $nativeArr, false);
                if($writeFiles){
                    $fp = fopen($newFileLoc, 'w');
                    fwrite($fp, $templateClassStr);
                    fclose($fp);
                     self::log(sprintf("File written successfully:" . $newFileLoc));
                }else{
                    self::log($templateClassStr);
                    self::log("\n\n--------------------------------------\n\n");
                }
          }else{
               self::log(sprintf("File already exists, Skipping:" . $newFileLoc));
          }
          
			
	}
	public static function parseConnTemp($tempFromLoc, $tempToLoc, $overwrite, $capitalize, $tables){

        self::createConnFile($tables, $tempFromLoc, $tempToLoc, $overwrite, $capitalize);
	
    }
	public static function createConnFile($tables, $tempFromLoc, $tempToLoc, $writeFiles = true, $overwrite = 'true'){
		
	   //declair native functions to ignore
        //TODO: make this adjustable in the db file

      
       if(!$capitalize == 'true'){
           $newFileLoc = str_replace("*", $table->name, $tempToLoc);
       }else{
           $newFileLoc = str_replace("*", tempDriver::capatilize($table->name), $tempToLoc);       
       }
       self::log(sprintf("Creating New Conn File:" . $newFileLoc));

        
        $nativeArr = array("creDate", "creUser", "endDate");

        //make directorys
            $fileInfo = pathinfo($tempToLoc);
            $saveClassDir = $fileInfo['dirname'];

            if(!is_dir($saveClassDir) && $writeFiles) {
               if (!mkdir($saveClassDir, 0777, true)) {
                    throw new Exception("Could not make directory(" . $saveClassDir . ")");
                   return false;
               }
            }
        // Interate through database
          //load each table in to a table object
            $vArr = array();
            $vArr['tables'] = $tables;


            $templateClassStr = tempDriver::renderTempFromFile($tempFromLoc, $vArr, $nativeArr, false);
           
            if($writeFiles){
                $fp = fopen($newFileLoc, 'w');
                fwrite($fp, $templateClassStr);
                fclose($fp);
                 self::log(sprintf("Conn File written successfully:" . $newFileLoc));
            }else{
                self::log($templateClassStr);
                self::log("\n\n--------------------------------------\n\n");
            }
   
	}
	public static function unlinkRecursive($dir, $deleteRootToo = false){
		if(!$dh = @opendir($dir))
		{
			return;
		}
		while (false !== ($obj = readdir($dh)))
		{
			if($obj == '.' || $obj == '..')
			{
				continue;
			}
	
			if (!@unlink($dir . '/' . $obj))
			{
				unlinkRecursive($dir.'/'.$obj, true);
			}
		}
	
		closedir($dh);
	   
		if ($deleteRootToo)
		{
			@rmdir($dir);
		}
	   
		return;
	}

   

	
}