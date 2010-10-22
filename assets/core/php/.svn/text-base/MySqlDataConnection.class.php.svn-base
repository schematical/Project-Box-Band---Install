<?php
/* 
 * This class deals with connecting and querying a mysql database
 */
class MySqlDataConnection extends DataConnectionBase{

    public function Connect(){
        //die(LoadDriver::$intActiveConnection . "//" . $this->intConnectionNumber);
        if((is_null(LoadDriver::$intActiveConnection)) || (LoadDriver::$intActiveConnection != $this->intConnectionNumber)){
            $intLevel = error_reporting(0);
            $objConn = mysql_connect($this->strHostName, $this->strUsername, $this->strPassword);
            if(!$objConn){
                throw new DataBaseException('Unable to connect to database! Please try again later.');
            }
            error_reporting($intLevel);
            mysql_select_db($this->strDatabaseName);
            LoadDriver::$intActiveConnection = $this->intConnectionNumber;
        }
    }
    public function Query($sql){
		$result = mysql_query($sql);
		if($result) {
    		return $result;
		}else{
		 	throw new Exception("MySQL Query Failed\n\tError:" . mysql_error() . "\n\tQuery:" . $strSql);
		}
	}
    
}
?>
