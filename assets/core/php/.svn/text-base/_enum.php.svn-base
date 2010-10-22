<?php

abstract class Page{
    const INDEX = 'index';
    const MUSIC = 'music';
    const VIDEO = 'video';
    const PHOTOS = 'photos';
    const GIGS = 'gigs';
    const NEWS = 'news';
    const BIOS = 'bios';
    const CONTACT = 'contact';
    const MERCH = 'contact';
    public static function GetPagesAsArray(){
        $arrPages = array();
        $arrPages[] = self::INDEX;
        $arrPages[] = self::MUSIC;
        $arrPages[] = self::VIDEO;
        $arrPages[] = self::PHOTOS;
        $arrPages[] = self::GIGS;
        $arrPages[] = self::NEWS;
        $arrPages[] = self::BIOS;
        $arrPages[] = self::CONTACT;
        $arrPages[] = self::MERCH;
        return $arrPages;
    }
}
abstract class AdminPage{
    const INDEX = 'index';
    const SERVICES = 'services';
    const SKINS = 'skins';
    const ADDONS = 'addons';
    const USER = 'user';
    const INSTALL = 'install';
}
abstract class AdminPageInputType{
    const TEXT = 'text';
    const PASSWORD = 'password';
    const SUBMIT = 'submit';
    const BUTTON = 'button';
    const HIDDEN = 'hidden';
}
abstract class Service{
    const MUSIC = 'MUSIC';
    const GIGS = 'GIGS';
    const PHOTOS = 'PHOTOS';
    const VIDEO = 'VIDEO';
    const MERCH = 'MERCH';
    const NEWS = 'NEWS';
    public static function GetServicesAsArray(){
        $arrServices = array();
        $arrServices[] = self::MUSIC;
        $arrServices[] = self::GIGS;
        $arrServices[] = self::PHOTOS;
        $arrServices[] = self::VIDEO;
        $arrServices[] = self::MERCH;
        $arrServices[] = self::NEWS;
        return $arrServices;
    }
}

abstract class Components{
    const HEADER = 'header';
    const FOOTER = 'footer';
    const NAVBAR = 'navbar';
    const SIDEBAR = 'sidebar';
    const PLAYBAR = 'playbar';
}
abstract class CoreComponents{
    const FORM_START = 'form_start';
    const FORM_END = 'form_end';
}
abstract class Settings{
    const ACTIVE_SKIN = 'ACTIVE_SKIN';
    const VIDEO_SERVICE_PROVIDER = 'VIDEO_SERVICE_PROVIDER';
    const GIGS_SERVICE_PROVIDER = 'GIGS_SERVICE_PROVIDER';
    const PHOTO_SERVICE_PROVIDER = 'PHOTO_SERVICE_PROVIDER';
    const MUSIC_SERVICE_PROVIDER = 'MUSIC_SERVICE_PROVIDER';
    const MERCH_SERVICE_PROVIDER = 'MERCH_SERVICE_PROVIDER';
    const NEWS_SERVICE_PROVIDER = 'NEWS_SERVICE_PROVIDER';
}
abstract class QueryString{
    const AJAX_CALL = "AJAX_CALL";
    const CALL_TYPE = "CALL_TYPE";
    const TARGET_PAGE = "TARGET_PAGE";
    const PREVIEW_SKIN = "PREVIEW_SKIN";
}
abstract class Cookie{
    const AUTHENTICATION = 'AUTHENTICATION';
}
abstract class CallType{
    const AJAX = "AJAX";
    const POST = "POST";
    const GET = "GET";
}
abstract class SettingFormInputType{
    const TEXT = 'TEXT';
}
abstract class AdminCssClass{
    const NAV_BAR_LINK_DIV = 'navBarLinkDiv';
    const SUB_NAV_DIV = 'subNavDiv';
    const SERVICE_LINK_DIV = 'serviceLinkDiv';
    const SERVICE_ACTIVATE_DIV = 'serviceActivateDiv';
    const GREY_BORDERED = "greyBordered";
}
abstract class UserMetaData{
    const ROLL = 'ROLL';
}
abstract class UserMetaRoll{
    const ADMIN = 'ADMIN';
    const INSTALL = 'INSTALL';/*does not exist in database-only for use during install*/
}
abstract class DefaultSettingValues{
    const ACTIVE_SKIN = 'standard';
    public static function GetDefaultSettingValuesAsArray(){
        $arrValues = array();
        $arrValues['ACTIVE_SKIN'] = self::ACTIVE_SKIN;
        return $arrValues;

    }
}
?>
