function OLHeight() {

    $(".OverLay").css("height", $(".header").height());
    $(".OverLay").css("width", $(".header").width());
    $(".SBG").css("height", $(".header").height());
    $(".SBG").css("width", $(".header").width());
}

OLHeight();
$(window).resize(function() {
    OLHeight();
});
alert = function() {};