<?php
/* 
 * This will hold all video data for this type
 */
class VideoObject extends DataObjectBase{
    protected $strName;
    protected $strLink;
    protected $strEmbed;
    public function  __construct($strName, $strLink, $strEmbed) {
        $this->strName = $strName;
        $this->strLink = $strLink;
        $this->strEmbed = $strEmbed;
    }
    public function  __get($strName) {
        switch($strName){
            case("Name"):
                return $this->strName;
            break;
            case("Link"):
                return $this->strLink;
            break;
            case("Embed"):
                return $this->strEmbed;
            break;
            default:
                throw new Exception("There is no property'" . $strName . "' in " . __CLASS__ . "");
            break;
        }
    }
}
?>
