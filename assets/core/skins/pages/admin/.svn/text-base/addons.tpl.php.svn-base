<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/header.tpl.php"); ?>
<div id="subNavBar">
    Todo: Insert Search and download bar
    <?php
        //Search and download bar
    ?>
</div>
<div id="addonSelectionDiv" class="<?= AdminCssClass::GREY_BORDERED; ?>">
<?php
    //iterate through drawing links for each
    foreach($_THIS->arrAddons as $objAddonLibrary){
        AdminPageLink::DrawLink(
            AdminPage::ADDONS, $objAddonLibrary->DisplayName, AdminCssClass::SERVICE_ACTIVATE_DIV,
            new QSParam(AddonsPage::ADDON, $objAddonLibrary->Name)
        );
    }
?>
</div>
<?php if($_THIS->objAddonLibrary){ ?>
    <div id="skinInfoDiv" class="<?= AdminCssClass::GREY_BORDERED; ?>">
        <h3>Skin Name: <?= $_THIS->objAddonLibrary->DisplayName; ?></h3>
        <p>
            <?= $_THIS->objAddonLibrary->Description; ?>
        </p>
        <p>
            <b>Author:</b> <?= $_THIS->objAddonLibrary->Author; ?>
        </p>
        <?php }
        if(
           (!is_null($_THIS->strCustomSettingsPage)) &&
           (strlen((String) $_THIS->strCustomSettingsPage) > 1)
           ){
            AdminPageLink::DrawLink(
                AdminPage::ADDONS, "Open up edit page", AdminCssClass::SERVICE_ACTIVATE_DIV,
                new QSParam(AddonsPage::ADDON, $_THIS->objAddonLibrary->Name),
                new QSParam(AddonsPage::CUST_EDIT, 'true') 
            );
        }?>
        <p>
        <?php if(!is_null($_THIS->objSettingForm)){ ?>
            <b>Settings:</b>
            <ul>
                <?php $_THIS->objSettingForm->Draw(); ?>
            </ul>
        </p>
    </div>
<?php } ?>
<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/footer.tpl.php"); ?>
