<?php
/*
 *This will allow addons to dynamically include assets
 */
class JsAsset extends DrawableAssetBase {
    public $strUrl = null;
    public function  __construct($strCssUrl) {
        $this->strUrl = $strCssUrl;
    }
}
?>
