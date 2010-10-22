<?php
/*
 * This will serve as a dashboard doing numberious tasks
 */
class InstallPage extends AdminPageBase{
    const DB_HOST_ID = "DB_HOST";
    const DB_NAME_ID = "DB_NAME";
    const DB_USER_NAME_ID = "DB_USER_NAME";
    const DB_PASS_ID = "DB_PASS";
    const DB_PREFIX_ID = "DB_PREFIX";
   
    const EMAIL_INPUT_ID = 'email';
    const PASS_INPUT_ID = 'pass';
    const SUBMIT_INPUT_ID = 'submit';


    public $objDBHostInput = null;
    public $objDBNameInput = null;
    public $objDBUserNameInput = null;
    public $objDBPassInput = null;
    public $objDBPrefixInput = null;
    public $objEmailInput = null;

    public $objPassInput = null;

    public $objSubmitInput = null;

    public $strMessage = null;

    public function  __construct() {
        parent::__construct(array(UserMetaRoll::INSTALL));
        
        $this->strSkinLoc = ADMIN_PAGES_SKINS_CORE_DIR . '/install.tpl.php';

        $this->objDBHostInput = new AdminPageInput(self::DB_HOST_ID, '', AdminPageInputType::TEXT);

        $this->objDBNameInput = new AdminPageInput(self::DB_NAME_ID, '', AdminPageInputType::TEXT);

        $this->objDBUserNameInput = new AdminPageInput(self::DB_USER_NAME_ID, '', AdminPageInputType::TEXT);
        
        $this->objDBPassInput = new AdminPageInput(self::DB_PASS_ID, '', AdminPageInputType::TEXT);

        $this->objDBPrefixInput = new AdminPageInput(self::DB_PREFIX_ID, '', AdminPageInputType::TEXT);
        

        $this->objEmailInput = new AdminPageInput(self::EMAIL_INPUT_ID, '', AdminPageInputType::TEXT);

        $this->objPassInput = new AdminPageInput(self::PASS_INPUT_ID, '', AdminPageInputType::PASSWORD);

        $this->objSubmitInput = new AdminPageInput(self::SUBMIT_INPUT_ID, '', AdminPageInputType::SUBMIT);

        //Check to see if any info was posted(IE: DB credentials)
        if($this->objDBHostInput->DataWasPosted()){
        //If the correct infromation was posted write the script
            Application::Install(
                    $this->objDBHostInput->Value,
                    $this->objDBNameInput->Value,
                    $this->objDBUserNameInput->Value,
                    $this->objDBPassInput->Value,
                    $this->objDBPrefixInput->Value,
                    $this->objEmailInput->Value,
                    $this->objPassInput->Value
                );
        }
      
        
    }
}
?>