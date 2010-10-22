<?php SkinDriver::EvaluateHeader(); ?>
<div class="column_450">
            <p>
                <h1><?php Splice::DrawSplice('BIOS_1', "The Band", 25, 1); ?></h1>
                <p>
                     <?php Splice::DrawSplice('BIOS_2', null, 40, 5); ?>
                </p>
            </p>
</div>
<div class="column_160">
            <?php SkinDriver::EvaluateComponent(Components::SIDEBAR); ?>
</div>
<div id="pageFooter">
     <?php Splice::DrawSplice('FOOTER_1', null, 25, 2); ?>
</div>
<?php SkinDriver::EvaluateComponent(Components::PLAYBAR); ?>
<?php SkinDriver::EvaluateFooter(); ?>
