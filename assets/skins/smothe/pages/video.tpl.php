<?php SkinDriver::EvaluateHeader(); ?>
		<h1>Videos</h1>
        <div id="rotationHolderDiv">
            <ul>
                <?php
                    $objVideoColl = ServiceDriver::Videos()->ListVideos();
                    echo "Loaded<br>";
                    $arrVideos = $objVideoColl->GetCollection();
                    foreach($arrVideos as $objVideo){
                        echo $objVideo->DrawFromTemplate(Application::$strActiveSkinDir . "/components/video_obj_display.tpl.php");
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

                //Remove outline from links
                $("#navBarHolderDiv a").click(function(){
                    $(this).blur();
                });

                //When mouse rolls over
                $("#navBarHolderDiv li").mouseover(function(){
                    $(this).stop().animate({height:'150px'},{queue:false, duration:600, easing: 'easeOutBounce'});
                    $("#rotationHolderDiv").stop().animate({paddingTop:'150px'},{queue:false, duration:600, easing: 'easeOutBounce'});
                });
                
                //When mouse is removed
                $("#navBarHolderDiv li").mouseout(function(){
                    $(this).stop().animate({height:'50px'},{queue:false, duration:600, easing: 'easeOutBounce'});
                    $("#rotationHolderDiv").stop().animate({paddingTop:'50px'},{queue:false, duration:600, easing: 'easeOutBounce'})
                });

			});
			// ]]>
		</script>

<?php SkinDriver::EvaluateComponent(Components::PLAYBAR); ?>
<?php SkinDriver::EvaluateFooter(); ?>
