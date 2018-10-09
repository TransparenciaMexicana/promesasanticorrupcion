jQuery(document).ready(function($) {
    
    // on menu button click
    $('.menu-toggle').click(function(){
        
        // If menu is closed
        if($(this).hasClass("fa-align-justify")){
            // console.log($(window).height());
            // console.log($("#masthead").outerHeight());
            var targetHeight = $(window).height() - $("#masthead").outerHeight() + "px";
            $(this).removeClass("fa-align-justify").addClass("fa-times");
            $('.menu-primary-container').css({"height":targetHeight});
            $('.menu-primary-container').slideToggle(500);
        }
        
        // Else menu is open
        else{
            $(this).removeClass("fa-times").addClass("fa-align-justify");
            $('.menu-primary-container').slideToggle(500);
        }
        
    });
    
    // on compromisos menu click, close menu so anchoring can be seen
    $('.main-navigation li.menu-item-14').click(function(){
        if($(".menu-toggle").hasClass("fa-times")){
            $(".menu-toggle").removeClass("fa-times").addClass("fa-align-justify");
            $('.menu-primary-container').slideToggle(500);
        }
    });

    // debouncing (ripped from StackOver)
    var waitForFinalEvent = (function () {
        var timers = {};
        return function (callback, ms, uniqueId) {
          if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
          }
          if (timers[uniqueId]) {
            clearTimeout (timers[uniqueId]);
          }
          timers[uniqueId] = setTimeout(callback, ms);
        };
    })();
    
    
    //resizing
    window.onresize = function() {
        waitForFinalEvent(function(){
            
            // console.log("resized");
            if ($(window).width() > 599) {
                if($(".menu-primary-container").css("display")=="none" || $(".menu-toggle").hasClass("fa-times")){
                    $(".menu-primary-container").css({"display":"block","height":"auto"});
                }
            }
            else{
                if($(".menu-primary-container").css("display")=="block"){
                    $(".menu-primary-container").css({"display":"none"});
                    $(".menu-toggle").removeClass("fa-times").addClass("fa-align-justify");
                }
            }
            
           
        }, 10, "some unique string");
          
    };
    $(window).trigger('resize');

});