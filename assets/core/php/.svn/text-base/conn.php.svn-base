<?php
 error_reporting(E_ALL);
//if the configuration file doenst exist run the install script
if(!file_exists(dirname(__FILE__) . '/config.php')){
    require_once(dirname(__FILE__) . '/scripts/install_setup.php');
}else{
    //Get the configureation file
    require_once(dirname(__FILE__) . '/config.php');
}


define("ASSETS_DIR", INSTALL_DIR .'/assets');
define("CORE_ASSETS_DIR", ASSETS_DIR .'/core');
define("SKINS_CORE_DIR", CORE_ASSETS_DIR .'/skins');
define("COMPONENTS_SKINS_CORE_DIR", SKINS_CORE_DIR .'/components');
define("ADMIN_COMPONENTS_SKINS_CORE_DIR", COMPONENTS_SKINS_CORE_DIR .'/admin');
define("PAGES_SKINS_CORE_DIR", SKINS_CORE_DIR .'/pages');
define("ADMIN_PAGES_SKINS_CORE_DIR", PAGES_SKINS_CORE_DIR .'/admin');


define("PHP_CORE_DIR", CORE_ASSETS_DIR .'/php');
define("ADMIN_PAGE_CORE_DIR", PHP_CORE_DIR .'/admin_page');
define("ADAPTERS_CORE_DIR", PHP_CORE_DIR .'/adapters');
define("DATALAYER_DIR", PHP_CORE_DIR .'/data_layer');
define("SCRIPTS_PHP_CORE_DIR", PHP_CORE_DIR . '/scripts');
define("DATALAYER_GEN_DIR", DATALAYER_DIR .'/BaseClasses');
define("CORE_SKINS_DIR", CORE_ASSETS_DIR .'/skins');
define("SKINS_DIR", ASSETS_DIR .'/skins');
define("ADDONS_DIR", ASSETS_DIR .'/addons');

define("ASSETS_URL", INSTALL_URL . "/assets");
define("SKINS_URL", ASSETS_URL . "/skins");
define("ADDONS_URL", ASSETS_URL . "/addons");
define("CORE_ASSETS_URL", ASSETS_URL . "/core");
define("CSS_CORE_URL", CORE_ASSETS_URL . "/css");
define("JS_CORE_URL", CORE_ASSETS_URL . "/js");

define("ADMIN_URL", INSTALL_URL . "/admin");


//Decilair the applicaiton class
require(PHP_CORE_DIR . "/ApplicationBase.class.php");
require(PHP_CORE_DIR . "/_enum.php");
require(PHP_CORE_DIR . "/_exceptions.php");
abstract class Application extends ApplicationBase{


}

Application::$arrPreLoadedClasses['AuthDriver'] = PHP_CORE_DIR . '/AuthDriver.class.php';
Application::$arrPreLoadedClasses['SkinDriver'] = PHP_CORE_DIR . '/SkinDriver.class.php';
Application::$arrPreLoadedClasses['LoadDriver'] = PHP_CORE_DIR . '/LoadDriver.class.php';
Application::$arrPreLoadedClasses['SkinDriver'] = PHP_CORE_DIR . '/SkinDriver.class.php';
Application::$arrPreLoadedClasses['ServiceDriver'] = PHP_CORE_DIR . '/ServiceDriver.class.php';
Application::$arrPreLoadedClasses['AddonDriver'] = PHP_CORE_DIR . '/AddonDriver.class.php';
Application::$arrPreLoadedClasses['DataConnectionBase'] = PHP_CORE_DIR . '/DataConnectionBase.class.php';
Application::$arrPreLoadedClasses['MySqlDataConnection'] = PHP_CORE_DIR . '/MySqlDataConnection.class.php';
Application::$arrPreLoadedClasses['SimpleTemplateParser'] = PHP_CORE_DIR . '/SimpleTemplateParser.class.php';

Application::Initialize();

if(!function_exists('___autoload')){
    function __autoload($strClassName){
        if(key_exists($strClassName, Application::$arrAutoLoadedClasses)){
            require_once(Application::$arrAutoLoadedClasses[$strClassName]);
        }else{
            throw new Exception("No Class (" . $strClassName . ")");
        }
    }
        
}
Application::$arrAutoLoadedClasses['CookieDriver'] = PHP_CORE_DIR . '/CookieDriver.class.php';
Application::$arrAutoLoadedClasses['AddonLibrary'] = PHP_CORE_DIR . '/AddonLibrary.class.php';
Application::$arrAutoLoadedClasses['AddonLibrarySetting'] = PHP_CORE_DIR . '/AddonLibrarySetting.class.php';
Application::$arrAutoLoadedClasses['SkinLibrary'] = PHP_CORE_DIR . '/SkinLibrary.class.php';
Application::$arrAutoLoadedClasses['BaseEntity'] = PHP_CORE_DIR . '/BaseEntity.class.php';
Application::$arrAutoLoadedClasses['BaseEntityCollection'] = PHP_CORE_DIR . '/BaseEntityCollection.class.php';
Application::$arrAutoLoadedClasses['AdminApplication'] = PHP_CORE_DIR . '/AdminApplication.class.php';
Application::$arrAutoLoadedClasses['AdminPageBase'] =  ADMIN_PAGE_CORE_DIR . '/AdminPageBase.class.php';
Application::$arrAutoLoadedClasses['AdminPageLink'] =  ADMIN_PAGE_CORE_DIR . '/AdminPageLink.class.php';
Application::$arrAutoLoadedClasses['AdminPageInput'] =  ADMIN_PAGE_CORE_DIR . '/AdminPageInput.class.php';
Application::$arrAutoLoadedClasses['LoginPage'] =  ADMIN_PAGE_CORE_DIR . '/LoginPage.class.php';
Application::$arrAutoLoadedClasses['IndexPage'] =  ADMIN_PAGE_CORE_DIR . '/IndexPage.class.php';
Application::$arrAutoLoadedClasses['ServicesPage'] =  ADMIN_PAGE_CORE_DIR . '/ServicesPage.class.php';
Application::$arrAutoLoadedClasses['SkinsPage'] =  ADMIN_PAGE_CORE_DIR . '/SkinsPage.class.php';
Application::$arrAutoLoadedClasses['AddonsPage'] =  ADMIN_PAGE_CORE_DIR . '/AddonsPage.class.php';
Application::$arrAutoLoadedClasses['UserPage'] =  ADMIN_PAGE_CORE_DIR . '/UserPage.class.php';
Application::$arrAutoLoadedClasses['InstallPage'] =  ADMIN_PAGE_CORE_DIR . '/InstallPage.class.php';
Application::$arrAutoLoadedClasses['AddonSettingForm'] =  ADMIN_PAGE_CORE_DIR . '/AddonSettingForm.class.php';
Application::$arrAutoLoadedClasses['QSParam'] =  PHP_CORE_DIR . '/QSParam.class.php';

Application::$arrAutoLoadedClasses['DataCollectionBase'] =  PHP_CORE_DIR . '/data_types/DataCollectionBase.class.php';
Application::$arrAutoLoadedClasses['DataObjectBase'] =  PHP_CORE_DIR . '/data_types/DataObjectBase.class.php';
Application::$arrAutoLoadedClasses['MusicCollection'] =  PHP_CORE_DIR . '/data_types/MusicCollection.class.php';
Application::$arrAutoLoadedClasses['MusicObject'] =  PHP_CORE_DIR . '/data_types/MusicObject.class.php';
Application::$arrAutoLoadedClasses['VideoCollection'] =  PHP_CORE_DIR . '/data_types/VideoCollection.class.php';
Application::$arrAutoLoadedClasses['VideoObject'] =  PHP_CORE_DIR . '/data_types/VideoObject.class.php';
Application::$arrAutoLoadedClasses['GigCollection'] =  PHP_CORE_DIR . '/data_types/GigCollection.class.php';
Application::$arrAutoLoadedClasses['GigObject'] =  PHP_CORE_DIR . '/data_types/GigObject.class.php';
Application::$arrAutoLoadedClasses['MerchCollection'] =  PHP_CORE_DIR . '/data_types/MerchCollection.class.php';
Application::$arrAutoLoadedClasses['MerchObject'] =  PHP_CORE_DIR . '/data_types/MerchObject.class.php';
Application::$arrAutoLoadedClasses['NewsCollection'] =  PHP_CORE_DIR . '/data_types/NewsCollection.class.php';
Application::$arrAutoLoadedClasses['NewsObject'] =  PHP_CORE_DIR . '/data_types/NewsObject.class.php';
Application::$arrAutoLoadedClasses['PhotoCollection'] =  PHP_CORE_DIR . '/data_types/PhotoCollection.class.php';
Application::$arrAutoLoadedClasses['PhotoObject'] =  PHP_CORE_DIR . '/data_types/PhotoObject.class.php';


Application::$arrAutoLoadedClasses['AdaptorConnectionBase'] =  ADAPTERS_CORE_DIR . '/base/AdaptorConnectionBase.class.php';
Application::$arrAutoLoadedClasses['AdaptorLibraryBase'] =  ADAPTERS_CORE_DIR . '/base/AdaptorLibraryBase.class.php';
Application::$arrAutoLoadedClasses['AdaptorServiceBase'] =  ADAPTERS_CORE_DIR . '/base/AdaptorServiceBase.class.php';
Application::$arrAutoLoadedClasses['AdaptorSettingFormBase'] =  ADAPTERS_CORE_DIR . '/base/AdaptorSettingFormBase.class.php';
Application::$arrAutoLoadedClasses['AdaptorSettingFormText'] =  ADAPTERS_CORE_DIR . '/base/AdaptorSettingFormText.class.php';
Application::$arrAutoLoadedClasses['VideoAdaptorServiceBase'] =  ADAPTERS_CORE_DIR . '/base/VideoAdaptorServiceBase.class.php';
Application::$arrAutoLoadedClasses['MusicAdaptorServiceBase'] =  ADAPTERS_CORE_DIR . '/base/MusicAdaptorServiceBase.class.php';
Application::$arrAutoLoadedClasses['MerchAdaptorServiceBase'] =  ADAPTERS_CORE_DIR . '/base/MerchAdaptorServiceBase.class.php';
Application::$arrAutoLoadedClasses['GigsAdaptorServiceBase'] =  ADAPTERS_CORE_DIR . '/base/GigsAdaptorServiceBase.class.php';
Application::$arrAutoLoadedClasses['NewsAdaptorServiceBase'] =  ADAPTERS_CORE_DIR . '/base/NewsAdaptorServiceBase.class.php';
Application::$arrAutoLoadedClasses['PhotosAdaptorServiceBase'] =  ADAPTERS_CORE_DIR . '/base/PhotosAdaptorServiceBase.class.php';

Application::$arrAutoLoadedClasses['SettingFormInputBase'] =  PHP_CORE_DIR . '/setting_form/SettingFormInputBase.class.php';
Application::$arrAutoLoadedClasses['SettingFormText'] =  PHP_CORE_DIR . '/setting_form/SettingFormText.class.php';
Application::$arrAutoLoadedClasses['SettingFormBase'] =  PHP_CORE_DIR . '/setting_form/SettingFormBase.class.php';
Application::$arrAutoLoadedClasses['DrawableAssetBase'] =  PHP_CORE_DIR . '/DrawableAssetBase.class.php';
Application::$arrAutoLoadedClasses['CssAsset'] =  PHP_CORE_DIR . '/CssAsset.class.php';
Application::$arrAutoLoadedClasses['JsAsset'] =  PHP_CORE_DIR . '/JsAsset.class.php';

//Add datalayer stuff
require(DATALAYER_GEN_DIR . "/Conn.php");

if(Application::IsInstallMode()){
    require_once(dirname(__FILE__) . '/scripts/install.php');
    exit();
}

?>