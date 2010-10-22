<div id="splice_footerDiv">
    <?php foreach(Page::GetPagesAsArray() as $strPage){?>
        <a href="#" onclick="Splice.ChangePage('<?= $strPage; ?>');"><?= $strPage; ?></a>
    <?php } ?>
    <?php if(Splice::$intSpliceCount == 0){ ?>
        There are no splices on this page
    <?php }else{ ?>
        <input type="submit" value="Save" />
    <?php } ?>
    <input type="hidden" id="<?= SpliceQueryString::PAGE_NAME; ?>" name="<?= SpliceQueryString::PAGE_NAME; ?>" value="<?= Splice::$strEditPage; ?>" />
</div>