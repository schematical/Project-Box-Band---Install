<?php
/* 
 * This class will generate a link to an aother admin page
 */
class AdminPageLink{
    public $strAdminPage = null;
    public $strInnerHtml = null;
    public $strUrl = null;
    public $strCssClass = null;
    protected $arrQSParams = array();
    public static function DrawLink(/*$strAdminPage, $objQSParam1, $objQSParam2, etc... */){
        $arrArg = func_get_args();
        
        $objLink = new AdminPageLink($arrArg);
        $objLink->Draw();
    }

    public function  __construct(/*$strAdminPage, $objQSParam1, $objQSParam2, etc... */) {
        $arrArg = func_get_args();
        
        if((count($arrArg) == 1) && (is_array($arrArg[0]))){
            $arrArg = $arrArg[0];
        }
        if(count($arrArg) < 1){
            throw new Exception("AdminPageLinks need at least one argument - The AdminPage to redirect to");
        }
        
        $this->strAdminPage = $arrArg[0];
        $this->strInnerHtml = $arrArg[1];
        if(!is_string($this->strAdminPage)){
            throw new Exception("First argument must be a string from the Enumerated class AdminPage");
        }
        for($i = 2; $i < count($arrArg); $i++){
            if(is_string($arrArg[$i])){
                //assume it is a css class
                $this->strCssClass = $arrArg[$i];
            }else{
                $this->arrQSParams[] = $arrArg[$i];
            }
        }

    }

    public function Draw($blnDraw = true){
        $this->strUrl = sprintf("%s/%s.php?", ADMIN_URL, $this->strAdminPage);
        foreach($this->arrQSParams as $objQSParam){
            $this->strUrl .= $objQSParam->ToString() . "&";
        }
        
        $strHtml = SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/" . __CLASS__ . '.tpl.php', false, $this);
        if($blnDraw){
            echo $strHtml;
        }else{
            return $strHtml;
        }
    }
}
?>
