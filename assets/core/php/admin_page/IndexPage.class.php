<?php
/*
 * This will serve as a dashboard doing numberious tasks
 */
class IndexPage extends AdminPageBase{

    public function  __construct() {
        parent::__construct(array(UserMetaRoll::ADMIN));
        $this->strSkinLoc = ADMIN_PAGES_SKINS_CORE_DIR . '/index.tpl.php';
      
    }
}
?>