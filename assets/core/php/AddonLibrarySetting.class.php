<?php
/* 
 * 
 */
class AddonLibrarySetting{
    const NAME = 'name';
    const DEFAULT_VALUE = 'defaultValue';
    const TYPE = 'type';
    const DISPLAY_NAME = 'displayName';
    protected $strName = null;
    protected $strDefaultValue = null;
    protected $strType = null;
    protected $strDisplayName = null;
    public function __construct($xmlSetting) {
        $this->strName = (string)$xmlSetting[self::NAME];
        $this->strDefaultValue = (string)$xmlSetting[self::DEFAULT_VALUE];
        $this->strType = strtoupper((string)$xmlSetting[self::TYPE]);
        $this->strDisplayName = (string)$xmlSetting[self::DISPLAY_NAME];
    }
      public function  __get($strName) {
        switch($strName){
            case('Name'):
                return $this->strName;
            break;
            case('DefaultValue'):
                return $this->strDefaultValue;
            break;
            case('Type'):
                return $this->strType;
            break;
            case('DisplayName'):
                return $this->strDisplayName;
            break;
            case('Value'):
                return Application::GetSetting($this->strName);
            break;
            default:
                throw new Exception("No property with name '" . $strName . "' in class '" . __CLASS__ . "'");
            break;
        }
    }
}
?>