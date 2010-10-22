$(document).ready(function() {
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