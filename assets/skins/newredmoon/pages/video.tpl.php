<?php SkinDriver::EvaluateHeader(); ?>
<div class="column_450">
		<h1><?php Splice::DrawSplice('VIDEO_1', "Videos", 25, 1); ?></h1>
        <div id="videoHolderDiv">
                <?php
                    $objVideoColl = ServiceDriver::Videos()->ListVideos();
                    echo "Loaded<br>";
                    $arrVideos = $objVideoColl->GetCollection();
                    foreach($arrVideos as $objVideo){
                        echo $objVideo->DrawFromTemplate(Application::$strActiveSkinDir . "/components/video_obj_display.tpl.php");
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
