<?php SkinDriver::EvaluateHeader(); ?>
		<h1>Videos</h1>
        <div id="rotationHolderDiv">
            <ul>
                <?php
                    $objGigsColl = ServiceDriver::Gigs()->ListAllGigs();
                    $arrGigs = $objGigsColl->GetCollection();
                    foreach($arrGigs as $objGigs){
                        echo $objGigs->DrawFromTemplate(Application::$strActiveSkinDir . "/components/gigs_obj_display.tpl.php");
                    }
                ?>
            </ul>
        </div>
        <script type="text/javascript">
			// <[CDATA[
			$(document).ready(function() {
				$('#rotationHolderDiv ul').roundabout({
                    duration: 1200
                });
                $('#rotationHolderDiv ul').roundabout_setTilt(10);

                //Fix Errors - http://www.learningjquery.com/2009/01/quick-tip-prevent-animation-queue-buildup/
			});
			// ]]>
		</script>

<?php SkinDriver::EvaluateComponent(Components::PLAYBAR); ?>
<?php SkinDriver::EvaluateFooter(); ?>
