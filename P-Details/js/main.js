
$(".IMG-NAV > .C-img").click(function () {
    $(".ACont > .C-img").css("display", "flex");
    $(".ACont > .P-img").hide();
    $(".ACont > .R-img").hide();
});

$(".IMG-NAV > .R-img").click(function () {
    $(".ACont > .R-img").css("display", "flex");
    $(".ACont > .P-img").hide();
    $(".ACont > .C-img").hide();
});

$(".IMG-NAV > .P-img").click(function () {
    $(".ACont > .P-img").css("display", "flex");
    $(".ACont > .R-img").hide();
    $(".ACont > .C-img").hide();
});
$('.fa-heart').click(function () {
    $(this).parent().trigger("click");
});

function countWord() {
    var words = document.getElementById("Comment").value;
    var CHAR = document.getElementById("charNum");
    var count = 500 - words.length;
    CHAR.innerHTML = count;
    if (count < 1) {
        CHAR.style.color = '#FF5A5A';
    } else {
        CHAR.style.color = '#D1D1D1';
    }
    console.log(count);
}

function reload() {
    window.onload = function () {
        if (!window.location.hash) {
            window.location = window.location + '#l';
            window.location.reload();
        }
    }
}
reload();

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("show");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";

}

function SetHeight() {
    var CBHeight = $('.C-box:is([style*="display: block"])').outerHeight();
    $('#Comment').css('height', CBHeight)
}
var submitWidth =$("#CSubmit").innerWidth();
var submitHeight =$("#CSubmit").innerHeight();
$(".P.next").innerWidth(submitWidth);
$(".P.next").innerHeight(submitHeight);
$(".PC.next").innerWidth(submitWidth);
$(".PC.next").innerHeight(submitHeight);
var pos = $('#CSubmit').offset()
$(".PC.next").offset({ top: pos.top});
$(window).resize(function () {
    if ($(window).width() > 960) {
        $(window).resize(function () {
            var submitWidth =$("#CSubmit").innerWidth();
            var submitHeight =$("#CSubmit").innerHeight();
            $(".P.next").innerWidth(submitWidth);
            $(".P.next").innerHeight(submitHeight);
            $(".PC.next").innerWidth(submitWidth);
            $(".PC.next").innerHeight(submitHeight);
            var pos = $('#CSubmit').offset()
            $(".PC.next").offset({ top: pos.top});
            SetHeight();
            reload();
        });
    }

});

if ($(window).width() > 960) {
    SetHeight();
}

$(".fa-chevron-down").click(function () {
    $('.Q').trigger("click");
});

var i = -1;
var classes = ['one', 'two', 'three'];
function INC() { i++; }
function imgSlider() {
    if ($(".ACont")[0].classList.length === 4) {
        i = -1;
        $('.ACont').removeClass(classes[0]);
        $('.ACont').removeClass(classes[1]);
        $('.ACont').removeClass(classes[2]);
    }

    INC();
    $('.ACont').toggleClass(classes[i]);
    if ($(".ACont").hasClass("one")) {
        $('.S-img0').show();
        $('.S-img1').hide();
        $('.S-img2').hide();
    }
    if ($(".ACont").hasClass("two")) {
        $('.S-img1').show();
        $('.S-img0').hide();
        $('.S-img2').hide();
    }
    if ($(".ACont").hasClass("three")) {
        $('.S-img2').show();
        $('.S-img0').hide();
        $('.S-img1').hide();
    }
}
function imgSliderL() {
    i--;
    if ($(".ACont")[0].classList.length === 4) {
        i = -1;
        $('.ACont').removeClass(classes[0]);
        $('.ACont').removeClass(classes[1]);
        $('.ACont').removeClass(classes[2]);
    }
    console.log(i);
    INC();

}

$(".fa-chevron-left").click(function () {
    imgSlider()
});
$(".fa-chevron-right").click(function () {
    imgSlider()
});

$('.fa-chevron-down').click(function () {
    $(this).parent().trigger("click");
});
$('.QTY').click(function () {
    $(this).parent().trigger("click");
});



$(document).ready(function () {
    if ($('.Review:is([style*="display: block"])').length == 0) {
        $('.next').css('opacity', '0');
        $('.next').css('pointer-events', 'none');
    } else if ($('.Review:is([style*="display: block"])').length == 1) {
        $('.next').css('opacity', '1');
        $('.next').css('pointer-events', 'auto');
    }
});