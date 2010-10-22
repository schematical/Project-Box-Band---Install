<?php SkinDriver::EvaluateHeader(); ?>
<div class="column_450">
            <h1>
                <?php Splice::DrawSplice('INDEX_2', "Welcome!", 25, 1); ?>
            </h1>
            <p>
                <?php Splice::DrawSplice('INDEX_1', null, 40, 10); ?>
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
