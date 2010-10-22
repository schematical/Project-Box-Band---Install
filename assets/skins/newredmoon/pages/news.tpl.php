<?php SkinDriver::EvaluateHeader(); ?>
<div class="column_450">
            <p>
                <h1><?php Splice::DrawSplice('NEWS_1', "News", 25, 1); ?></h1>
                 <div id="gigHolderDiv">
                    <?php
                        $objNewsService = ServiceDriver::News();
                        if(!is_null($objNewsService)){
                            $objNewsServiceColl = ServiceDriver::News()->ListAllNews();
                            $arrNews = $objNewsServiceColl->GetCollection();
                            foreach($arrNews as $objNews){
                                echo $objNews->DrawFromTemplate(Application::$strActiveSkinDir . "/components/news_obj_display.tpl.php");
                            }
                        }
                    ?>
                </div>
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
