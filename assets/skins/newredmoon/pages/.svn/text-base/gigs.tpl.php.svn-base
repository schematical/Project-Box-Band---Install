<?php SkinDriver::EvaluateHeader(); ?>
<div class="column_450">
		<h1>Gigs</h1>
        <p>
            <?php Splice::DrawSplice('GIGS_2', 'I am an empty splice on the gigs page', 25, 2); ?>
        </p>
        
        <div id="gigHolderDiv">
                <?php
                    $objGigService = ServiceDriver::Gigs();
                    if(!is_null($objGigService)){
                        $objGigsColl = $objGigService->ListAllGigs();
                        $arrGigs = $objGigsColl->GetCollection();
                        foreach($arrGigs as $objGigs){
                            echo $objGigs->DrawFromTemplate(Application::$strActiveSkinDir . "/components/gigs_obj_display.tpl.php");
                        }
                    }
                ?>
        </div>
</div>
<div class="column_160">
            <?php SkinDriver::EvaluateComponent(Components::SIDEBAR); ?>
</div>
<div id="pageFooter">
     <?php Splice::DrawSplice('FOOTER_1', null, 25, 2); ?>
</div>
<?php SkinDriver::EvaluateComponent(Components::PLAYBAR); ?>
<?php SkinDriver::EvaluateFooter(); ?>
