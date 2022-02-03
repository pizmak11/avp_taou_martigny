var wh = $(window).height();
var ww = $(window).width();
var scr = $(window).scrollTop();

/*** SCROLL FUNCTION ***/

$(window).scroll(function() {
    scr = $(window).scrollTop();
    //headerChange();
    parallax();
});

/*** RESIZE FUNCTION ***/

$(window).resize(function() {
    scr = $(window).scrollTop();
    wh = $(window).height();
    ww = $(window).width();
    parallax();
});

/*** PARALLAX EFFECT ***/

function parallax() {
    if($(".parallax").length) {
        $(".parallax").each(function() {
            $(this).css("transform", "translateY(" + (scr / 3) + "px)");
        });
    }
}

/*** CHANGE HEADER DESIGN ON SCROLL ***/

function headerChange() {
    if(scr > wh/5) {
        $("header").addClass("active");
    } else {
        $("header").removeClass("active");
    }
}