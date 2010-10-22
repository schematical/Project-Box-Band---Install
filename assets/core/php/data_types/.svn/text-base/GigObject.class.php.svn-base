<?php
/* 
 * This will hold all video data for this type
 */
class GigObject extends DataObjectBase{
    protected $strName;
    protected $strDate;
    protected $strDesc;
    protected $strLink;
    protected $strLocation;
    public function  __construct($strName, $strDesc, $strDate, $strLink, $strLocation) {
        $this->strName = $strName;
        $this->strDesc = $strDesc;
        $this->strDate = $strDate;
        $this->strLink = $strLink;
        $this->strLocation = $strLocation;
    }
    public function  __get($strName) {
        switch($strName){
            case("Name"):
                return $this->strName;
            break;
            case("Desc"):
                return $this->strDesc;
            break;
            case("Date"):
                return $this->strDate;
            break;
            case("Link"):
                return $this->strLink;
            break;
            case("Location"):
                return $this->strLocation;
            break;
            default:
                throw new Exception("There is no property'" . $strName . "' in " . __CLASS__ . "");
            break;
        }
    }
}
?>