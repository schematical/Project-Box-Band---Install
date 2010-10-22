<?php
/* 
 *This will allow addons to dynamically include assets
 */
class CssAsset extends DrawableAssetBase {
    public $strUrl = null;
    public function  __construct($strUrl) {
        $this->strUrl = $strUrl;
    }
}
?>
