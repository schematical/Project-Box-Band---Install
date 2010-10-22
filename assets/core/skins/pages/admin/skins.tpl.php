<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/header.tpl.php"); ?>
<div id="subNavBar">
    <?php
       
    ?>
</div>
<div id="skinsSelectionDiv" class="<?= AdminCssClass::GREY_BORDERED; ?>">
<?php
    //iterate through drawing links for each
    foreach($_THIS->arrSkins as $objSkinLibrary){
        AdminPageLink::DrawLink(
            AdminPage::SKINS, $objSkinLibrary->DisplayName, AdminCssClass::SERVICE_LINK_DIV,
            new QSParam(SkinsPage::SKIN, $objSkinLibrary->Name)
        );
        if($objSkinLibrary->IsActive()){ ?>
            <div class="AdminCssClass::SERVICE_ACTIVATE_DIV">&nbsp;- Currently Active</div>
        <?php }else{
            //Draw activate link
             ?>
            <div class="<?= AdminCssClass::SERVICE_LINK_DIV; ?>">&nbsp;-&nbsp;
                <a href="<?= Application::GetPageLink(Page::INDEX, new QSParam(QueryString::PREVIEW_SKIN, $objSkinLibrary->Name)); ?>">
                    Preview
                </a>
            </div>
            <?php
            AdminPageLink::DrawLink(
                AdminPage::SKINS, '&nbsp;-&nbsp;Activate', AdminCssClass::SERVICE_ACTIVATE_DIV,
                new QSParam(SkinsPage::SKIN, $objSkinLibrary->Name),
                new QSParam(SkinsPage::ACTIVATE, 'true')
            );
           
            
        }
    }
?>
</div>
<?php if(!is_null($_THIS->objSkinLibrary)){ ?>
<div id="skinInfoDiv" class="<?= AdminCssClass::GREY_BORDERED; ?>">
    <h3>Skin Name: <?= $_THIS->objSkinLibrary->DisplayName; ?></h3>
    <p>
        <?= $_THIS->objSkinLibrary->Description; ?>
    </p>
    <p>
        <b>Author:</b> <?= $_THIS->objSkinLibrary->Author; ?>
    </p>
    <p>
        <b>Required Addons:</b>
        <ul>
            <?php foreach($_THIS->objSkinLibrary->RequiredAddons as $strAddon){ ?>
                <li><?= $strAddon; ?></li>
            <?php } ?>
        </ul>
    </p>
</div>
<?php } ?>
<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/footer.tpl.php"); ?>
