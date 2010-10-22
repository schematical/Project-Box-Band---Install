<?php
/*
 * This will serve as a dashboard doing numberious tasks
 */
class UserPage extends AdminPageBase{
    const EMAIL_INPUT_ID = 'email';
    const PASS_INPUT_ID = 'pass';
    const SUBMIT_INPUT_ID = 'submit';
    public $objEmailInput = null;

    public $objPassInput = null;

    public $objSubmitInput = null;

    public $strMessage = null;

    public function  __construct() {
        parent::__construct(array(UserMetaRoll::ADMIN));
        
        $this->strSkinLoc = ADMIN_PAGES_SKINS_CORE_DIR . '/user.tpl.php';
        //Check for post, if post redraw or redirect
        $this->objEmailInput = new AdminPageInput(self::EMAIL_INPUT_ID, '', AdminPageInputType::TEXT);

        $this->objPassInput = new AdminPageInput(self::PASS_INPUT_ID, '', AdminPageInputType::PASSWORD);

        $this->objSubmitInput = new AdminPageInput(self::SUBMIT_INPUT_ID, 'Login', AdminPageInputType::SUBMIT);

        //Check to see if stuff is posted and save and redraw when its done
        if(($this->objEmailInput->DataWasPosted()) && ($this->objPassInput->DataWasPosted())){
            try{
                AuthDriver::CreateNewUser($this->objEmailInput->Value, $this->objPassInput->Value, array(UserMetaData::ROLL => UserMetaRoll::ADMIN));
                $this->strMessage = "User Created Successfully";
            }catch (AuthDriverException $e){
                $this->strMessage = $e->getMessage();
            }
        }
        
    }
}
?>