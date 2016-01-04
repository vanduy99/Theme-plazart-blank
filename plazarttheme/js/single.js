jQuery(window).load(function(){

    // jQuery for flexslider------------------

    jQuery('.tz-single-slides').flexslider({
        animation: 'slide',
        slideDirection: "horizontal",
        slideshow: true,
        slideshowSpeed: 5000,
        animationDuration: 600,
        directionNav: true,
        controlNav: false,
        prevText: "",
        nextText: "",
        pausePlay: false,
        pauseText: "Pause",
        playText: "Play",
        pauseOnAction: true,
        pauseOnHover: false,
        useCSS: true,
        startAt: 0,
        animationLoop: true,
        smoothHeight: true,
        randomize: true,
        itemWidth:0,
        itemMargin:0,
        minItems:0,
        maxItems:0
    });

});
