<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/header.tpl.php"); ?>
<div id="subNavBar">
    <?php
        $arrServices = Service::GetServicesAsArray();
        foreach($arrServices as $strService){
            AdminPageLink::DrawLink(AdminPage::SERVICES, $strService, AdminCssClass::SUB_NAV_DIV, new QSParam(ServicesPage::SERVICE, $strService));
        }
    ?>
</div>
<div id="serviceProvidorSelectionDiv" class="<?= AdminCssClass::GREY_BORDERED; ?>">
<?php
if(is_null($_THIS->arrProvidors)){
    ?>
        <h3>Please Select a Service</h3>
    <?php
}else{
    //Display the selected service name
    ?>
        <h3><?= $_THIS->strService; ?></h3>
    <?php
    //iterate through drawing links for each
    foreach($_THIS->arrProvidors as $objLibrary){
        AdminPageLink::DrawLink(
            AdminPage::SERVICES, $objLibrary->DisplayName, AdminCssClass::SERVICE_LINK_DIV,
            new QSParam(ServicesPage::SERVICE, $_THIS->strService),
            new QSParam(ServicesPage::PROVIDER, $objLibrary->LibraryName)
        );
        $objService = $objLibrary->GetAdaptorService($_THIS->strService);
        if((!is_null($objService)) && ($objService->IsActive())){
            ?>
                <div class="AdminCssClass::SERVICE_ACTIVATE_DIV">&nbsp;- Currently Active</div>
            <?php
        }else{
            //Draw activate link
            AdminPageLink::DrawLink(
                AdminPage::SERVICES, '&nbsp;-&nbsp;Activate', AdminCssClass::SERVICE_ACTIVATE_DIV,
                new QSParam(ServicesPage::SERVICE, $_THIS->strService),
                new QSParam(ServicesPage::PROVIDER, $objLibrary->LibraryName),
                new QSParam(ServicesPage::ACTIVATE, 'true')
            );
        }
    }
}
?>
</div>

<div id="serviceProvidorSettingsForm" class="<?= AdminCssClass::GREY_BORDERED; ?>">
    <?php
        if(!is_null($_THIS->objProvidorForm)){
            $_THIS->objProvidorForm->Draw();
        }
    ?>
</div>
<?php SkinDriver::RawEvaluate(ADMIN_COMPONENTS_SKINS_CORE_DIR . "/footer.tpl.php"); ?>
