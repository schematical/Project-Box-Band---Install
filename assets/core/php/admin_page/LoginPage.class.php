<?php
/*
 * This will serve as a dashboard doing numberious tasks
 */
class LoginPage extends AdminPageBase{
    const EMAIL_INPUT_ID = 'email';
    const PASS_INPUT_ID = 'pass';
    const SUBMIT_INPUT_ID = 'submit';
    public $objEmailInput = null;

    public $objPassInput = null;

    public $objSubmitInput = null;

    public $strError = null;

    public function  __construct() {
        $this->strSkinLoc = ADMIN_PAGES_SKINS_CORE_DIR . '/login.tpl.php';
        //Check for post, if post redraw or redirect
        $this->objEmailInput = new AdminPageInput(self::EMAIL_INPUT_ID, '', AdminPageInputType::TEXT);

        $this->objPassInput = new AdminPageInput(self::PASS_INPUT_ID, '', AdminPageInputType::PASSWORD);

        $this->objSubmitInput = new AdminPageInput(self::SUBMIT_INPUT_ID, 'Login', AdminPageInputType::SUBMIT);

        //Check to see if stuff is posted and save and redraw when its done
        if(($this->objEmailInput->DataWasPosted()) && ($this->objPassInput->DataWasPosted())){
            
           try{
               $blnSuccess = AuthDriver::Authenticate($this->objEmailInput->Value, $this->objPassInput->Value);
           }catch (AuthDriverException $e){
                $this->strError = $e->getMessage();
           }
        }
    }
}
?>