var wh = $(this).height();
$(window).resize(function() { wh = $(this).height(); });

var prevScrollpos = window.pageYOffset;

$(window).on("mousewheel scroll", function(event) {
    var currentScrollPos = window.pageYOffset;

    setTimeout(function() {
        if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0 || prevScrollpos > currentScrollPos) {
            $(".header").css("top", "0px");
            $("#filters-wrap").addClass("margin");
            $("#go-to-gallery").removeClass("hidden");
        } else {
            if($(window).scrollTop() > 130) {
                $(".header").css("top", "-130px");
                $("#filters-wrap").removeClass("margin");
                $("#go-to-gallery").addClass("hidden");     
            }
        }
        prevScrollpos = currentScrollPos;

        $(".h").each(function() {
            var scr = $(window).scrollTop() + (wh);
            var top = $(this).offset().top;
            if(scr > top) { $(this).removeClass("hidden"); }
            else { $(this).addClass("hidden"); }
        });
    }, 100);
});

setTimeout(function() {
    $(".h").each(function() {
        var scr = $(window).scrollTop() + (wh);
        var top = $(this).offset().top;
        if(scr > top) { $(this).removeClass("hidden"); }
        else { $(this).addClass("hidden"); }
    });
}, 500);