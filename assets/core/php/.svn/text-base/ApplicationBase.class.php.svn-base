<?php
abstract class ApplicationBase{
    public static $objDataBase = null;
    public static $objSkinLibrary = null;
    public static $arrPreLoadedClasses = array();
    public static $arrAutoLoadedClasses = array();
    public static $arrSettings = array();
    
    public static $arrAssets = array();
    
    public static $strActiveSkinDir = null;
    public static $strActiveSkinUrl = null;

    public static $strCallType = null;
    public static $strCurrPage = null;

    public static $blnPreviewSkin = false;
    
    public static function Initialize(){
        
        foreach(self::$arrPreLoadedClasses as $strClassLoc){
            require_once($strClassLoc);
        }

        if((!defined("INSTALL_MODE")) || (INSTALL_MODE != 'true')){
            self::$objDataBase = new MySqlDataConnection(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
            self::$objDataBase->Connect();
        }

    }
    
    public static function TestDB($strDBHost, $strDBName, $strDBUsername, $strDBPassword){
        
        try{
            self::$objDataBase = new MySqlDataConnection($strDBHost, $strDBName, $strDBUsername, $strDBPassword);
            self::$objDataBase->Connect();
            return true;
        }catch(Exception $e){
            //throw $e;
            return false;
        }
    }
    public static function AutoloadSettings(){
        $collSettings = Setting::LoadAutoload();
    }
    public static function GetSetting($strKey){
        if(key_exists($strKey, self::$arrSettings)){
            return self::$arrSettings[$strKey]->value;
        }else{
            //load from db
            $objSetting = Setting::LoadByKey($strKey);
            if(!is_null($objSetting)){
                self::$arrSettings[$strKey] = $objSetting;
                return $objSetting->value;
            }else{
                return null;
            }
        }
    }
    public static function SetSetting($strKey, $strValue){
        if(key_exists($strKey, self::$arrSettings)){
            self::$arrSettings[$strKey]->value = $strValue;
            self::$arrSettings[$strKey]->Save();
        }else{
            //load from db
            
            $objSetting = Setting::LoadByKey($strKey);
            if(is_null($objSetting)){
                $objSetting = new Setting();
                $objSetting->key = $strKey;
            }
            self::$arrSettings[$strKey] = $objSetting;
            $objSetting->value = $strValue;
            $objSetting->Save();
        }
    }
    public static function Run($strPage){
        //Get current theme
        if(key_exists(QueryString::PREVIEW_SKIN, $_GET)){
            $strActiveTheme = $_GET[QueryString::PREVIEW_SKIN];
            self::$blnPreviewSkin = true;
        }else{
            $strActiveTheme = self::GetSetting(Settings::ACTIVE_SKIN);
        }
        self::$objSkinLibrary = new SkinLibrary($strActiveTheme);
        self::$strActiveSkinDir = self::$objSkinLibrary->SkinDir;
        self::$strActiveSkinUrl = self::$objSkinLibrary->SkinUrl;
        /**
         * Initialize all  addons
         */
         $arrRequiredAddons = self::$objSkinLibrary->RequiredAddons;
         foreach($arrRequiredAddons as $strRequiredAddon){
             AddonDriver::IntilizeAddon($strRequiredAddon);
         }
         if((key_exists(QueryString::AJAX_CALL, $_GET))&&($_GET[QueryString::AJAX_CALL] == 'true')){

             //Encase it in an XML response
             self::$strCallType = CallType::AJAX;
             if(isset($_GET[QueryString::TARGET_PAGE])){
                 self::$strCurrPage = $_GET[QueryString::TARGET_PAGE];
             }
             $strHtml = SkinDriver::Evaluate(self::$strCurrPage);
         }elseif((key_exists(QueryString::CALL_TYPE, $_POST))&&($_POST[QueryString::CALL_TYPE] == CallType::POST)){
            //Data has been posted to the form
            self::$strCallType = CallType::POST;
            if(isset($_POST[QueryString::TARGET_PAGE])){
                 self::$strCurrPage = $_POST[QueryString::TARGET_PAGE];
             }
            $strBody = SkinDriver::RawEvaluate(self::$strCurrPage);

        }else{
            //No data was posted so do nothing
            self::$strCallType = CallType::GET;
            self::$strCurrPage = $strPage;
            $strBody = SkinDriver::EvaluatePage($strPage);

        }


    }
    public static function GetPageLink($strPageUrl){
         $arrArg = func_get_args();

        if((count($arrArg) == 1) && (is_array($arrArg[0]))){
            $arrArg = $arrArg[0];
        }
        if(count($arrArg) < 1){
            throw new Exception("AdminPageLinks need at least one argument - The AdminPage to redirect to");
        }
        if(self::$blnPreviewSkin){
            $arrArg[] = new QSParam(QueryString::PREVIEW_SKIN, self::$objSkinLibrary->Name);
        }
        $strPageUrl = $arrArg[0];
        
        if(!is_string($strPageUrl)){
            throw new Exception("First argument must be a string from the Enumerated class Page");
        }
        $arrQSParams = array();
        for($i = 1; $i < count($arrArg); $i++){
            $arrQSParams[] = $arrArg[$i];
        }

        $strUrl = sprintf("%s/%s.php?", INSTALL_URL, $strPageUrl);
        foreach($arrQSParams as $objQSParams){
            $strUrl .= $objQSParams->ToString() . "&";
        }
        
        return $strUrl;
    }
    public static function AddAsset($objAsset, $strKey = null){
        //if((is_string($strKey)) && (!is_null($strKey))){
        //    self::$arrAssets[$strKey] = $objAsset;
        //}else{
            self::$arrAssets[] = $objAsset;
        //}
    }
    public static function DrawAssets(){
        //attach all externally loaded stuff to be referenced by returned html document
        foreach(Application::$arrAssets as $objAsset){
            $objAsset->Draw();

        }
    }
    public static function IsInstallMode(){
        return((defined("INSTALL_MODE")) && (INSTALL_MODE == 'true'));
    }
    public static function SetDefaultSettings(){
        if(self::IsInstallMode()){
            foreach(DefaultSettingValues::GetDefaultSettingValuesAsArray() as $strKey=>$strValue){
                Application::SetSetting($strKey, $strValue);
            }
        }
    }
    public static function Install($strDBHost, $strDBName, $strDBUserName, $strDBPass, $strDBPrefix, $strEmail, $strPass){
                $strMessage = '';
                //Test DB
                $blnSuccess = Application::TestDB(
                    $strDBHost,
                    $strDBName,
                    $strDBUserName,
                    $strDBPass
                    );

                if($blnSuccess){

                //Create Config File
                    //Use SERVER_NAME + SCRIPT NAME to determin the install loc
                    $arrVars = array();
                    $arrVars[InstallPage::DB_HOST_ID] = $strDBHost;
                    $arrVars[InstallPage::DB_NAME_ID] = $strDBName;
                    $arrVars[InstallPage::DB_USER_NAME_ID] = $strDBUserName;
                    $arrVars[InstallPage::DB_PASS_ID] = $strDBPass;
                    $arrVars[InstallPage::DB_PREFIX_ID] = $strDBPrefix;
                    $arrVars['INSTALL_DIR'] = dirname($_SERVER['SCRIPT_FILENAME']);
                    $strDirUrl = substr(dirname($_SERVER['REQUEST_URI']), 1);
                    $arrVars['INSTALL_URL'] = 'http://' . $_SERVER['SERVER_NAME']. $strDirUrl;
                    $arrVars['PASSWORD_HASH_PRE'] = AuthDriver::GenRandomString();
                    $arrVars['PASSWORD_HASH_POST'] = AuthDriver::GenRandomString();

                    //Install DB Tables
                    $strSql = SimpleTemplateParser::ParseTemplate(SCRIPTS_PHP_CORE_DIR . '/setting.stpl', $arrVars);
                    $arrResult = LoadDriver::Query($strSql);
                    $strSql = SimpleTemplateParser::ParseTemplate(SCRIPTS_PHP_CORE_DIR . '/user.stpl', $arrVars);
                    $arrResult = LoadDriver::Query($strSql);
                    $strSql = SimpleTemplateParser::ParseTemplate(SCRIPTS_PHP_CORE_DIR . '/userMeta.stpl', $arrVars);
                    $arrResult = LoadDriver::Query($strSql);
               
                    //Config.php

                    $strConfig = SimpleTemplateParser::ParseTemplate(SCRIPTS_PHP_CORE_DIR . '/config.mlc.php', $arrVars);
                    //Try writing, but if it doesnt work then print to a text area for user to save
                    try{
                        file_put_contents(PHP_CORE_DIR . '/config.php', $strConfig);
                        require_once(PHP_CORE_DIR . '/config.php');
                    }catch(Exception $e){
                        throw $e;
                    }
                   //Create a new admin user
                    try{
                        AuthDriver::CreateNewUser($strEmail, $strPass, array(UserMetaData::ROLL => UserMetaRoll::ADMIN));
                        $strMessage .= "<br>User Created Successfully";
                    }catch (AuthDriverException $e){
                        $strMessage .= "<br>" .$e->getMessage();
                    }
                      
                      //Set settings
                      Application::SetDefaultSettings();
                      //Redirect to
                      header("Location:/admin/");

                }else{
                    $strMessage = "Sorry, but we cannot connect to the database you provided. Please check your information and try again.";
                }
                return $strMessage;

    }
}

?>