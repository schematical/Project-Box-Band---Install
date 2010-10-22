<?php
/* 
 *  This will render and read an Admin Page input
 */
class AdminPageInput{
    const VALUE_POST = "_value";

    protected $strId = null;
    public $strValue = null;
    public $strType = null;
    public $strAdminPage = null;

    protected $arrAttributes = array();

    public function  __construct($strId, $strValue = null, $strType = null, $strAdminPage = null) {
        //save the
        $this->strId = $strId;
        $this->strValue = $strValue;
        if(is_null($strType)){
            $this->strType = AdminPageInputType::TEXT;
        }else{
            $this->strType = $strType;
        }
        if(is_null($strAdminPage)){
            $this->strAdminPage = AdminApplication::$strAdminPage;
        }else{
            $this->strAdminPage = $strAdminPage;
        }
        //check for posted data
        if($this->DataWasPosted()){
            $this->strValue = $_POST[$this->FullId];
        }
    }
    public function AddAttribute($strAttributeName, $strAttributeValue){
        $this->arrAttributes[$strAttributeName] = $strAttributeValue;
    }
    public function AttributesToString(){
        $strAttributes = '';
        foreach($this->arrAttributes as $strName=>$strValue){
            $strAttributes .= sprintf("%s='%s' ", $strName, $strValue);
        }
        return $strAttributes;
    }
    
    public function DataWasPosted(){
        return isset($_POST[$this->FullId]);
    }
    public function  __get($strName) {
        switch($strName){
            case("Id"):
                return $this->strId;
            break;
            case("Value"):
                return $this->strValue;
            break;
            case("Type"):
                return $this->strType;
            break;
            case("Value"):
                return $this->strValue;
            break;
            case("AdminPage"):
                return $this->strAdminPage;
            break;
            //Derived Propertys
            case("FullId"):
                return $this->strId . self::VALUE_POST;
            break;
            default:
                throw new Exception("There is no property'" . $strName . "' in " . __CLASS__ . "");
            break;
        }
    }

    public function Draw($blnDraw = true){
        $this->strUrl = sprintf("%s/%s.php?", ADMIN_URL, $this->strAdminPage);
/*
 *      //I'm keeping this next bit incalse I decide to allow people to add QS Params
        foreach($this->arrQSParams as $objQSParam){
            $this->strUrl .= $objQSParam->ToString() . "&";
        }
 */

        $strHtml = SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/" . __CLASS__ . '.tpl.php', false, $this);
        if($blnDraw){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }

    /**
     * todo: add the on focus stuff to clear info
     */
}
?>
