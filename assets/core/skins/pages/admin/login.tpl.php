<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/header.tpl.php"); ?>
     <div id="skinsSelectionDiv" class="<?= AdminCssClass::GREY_BORDERED; ?>">
        <?php $_THIS->objEmailInput->Draw(); ?>

        <?php $_THIS->objPassInput->Draw(); ?>

        <?php $_THIS->objSubmitInput->Draw(); ?>
     </div>

<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/footer.tpl.php"); ?>