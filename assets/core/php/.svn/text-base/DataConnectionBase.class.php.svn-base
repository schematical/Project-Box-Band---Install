<?php
/* 
 * 
 */
abstract class DataConnectionBase{

    protected $intConnectionNumber;
    protected $strHostName;
    protected $strDatabaseName;
    protected  $strUsername;
    protected  $strPassword;
    public function  __construct($strHostName, $strDatabaseName, $strUsername, $strPassword) {
        $this->strHostName = $strHostName;
        $this->strDatabaseName = $strDatabaseName;
        $this->strUsername = $strUsername;
        $this->strPassword = $strPassword;
        LoadDriver::AddDataConnection($this);
    }
    public function SetConnectionNumber($intConnectionNumber){
        $this->intConnectionNumber = $intConnectionNumber;
    }
    public function __get($strName){
        switch($strName){
            case("ConnectionNumber"):
                return $this->intConnectionNumber;
            break;
            default:
                throw new Exception("No property exists with the name " . $name);
            break;
        }
    }
}
?>
