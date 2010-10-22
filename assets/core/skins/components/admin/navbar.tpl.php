<?php if(!is_null(AuthDriver::User())){ ?>
    <?php AdminPageLink::DrawLink(AdminPage::INDEX, 'Home', AdminCssClass::NAV_BAR_LINK_DIV);?>
    <?php AdminPageLink::DrawLink(AdminPage::ADDONS, 'Addons', AdminCssClass::NAV_BAR_LINK_DIV);?>
    <?php AdminPageLink::DrawLink(AdminPage::SERVICES, 'Services', AdminCssClass::NAV_BAR_LINK_DIV);?>
    <?php AdminPageLink::DrawLink(AdminPage::SKINS, 'Skins', AdminCssClass::NAV_BAR_LINK_DIV);?>
    <?php AdminPageLink::DrawLink(AdminPage::USER, 'User', AdminCssClass::NAV_BAR_LINK_DIV);?>
<?php }else{ ?>
    Please Log in
<?php } ?>