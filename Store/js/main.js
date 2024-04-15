


function boldDay() {
    $("#D00").click(function () {
        window.location = 'index.php?ALL=true';
        $("#D00").addClass("active");
        $("#D1").removeClass("active");
        $("#D1").removeClass("active");
        $("#D2").removeClass("active");
    })
    $("#D0").click(function () {
        window.location = 'index.php?Day=true';
        $("#D0").addClass("active");
        $("#D00").removeClass("active");
        $("#D1").removeClass("active");
        $("#D2").removeClass("active");
    })
    $("#D1").click(function () {
        window.location = 'index.php?Week=true';
        $("#D1").addClass("active");
        $("#D00").removeClass("active");
        $("#D0").removeClass("active");
        $("#D2").removeClass("active");
    })
    $("#D2").click(function () {
        $("#D2").addClass("active");
        $("#D00").removeClass("active");
        $("#D0").removeClass("active");
        $("#D1").removeClass("active");
        window.location = 'index.php?Month=true';
    })

}
boldDay();







function prdsize() {
    $(".fa-bars").click(function () {
        $(this).addClass("active");
        $(".fa-th-large").removeClass("active");
        $(".PRD").addClass("active");
        $(".content").addClass("active");
    })
    $(".fa-th-large").click(function () {
        $(".PRD").removeClass("active");
        $(this).addClass("active");
        $(".fa-bars").removeClass("active");
    })
}
prdsize();

if ($(window).width() < 1024) {
    $(".fa-bars-staggered").hide();
}

document.addEventListener('resize', function () {
    $(".PRD").removeClass("active");
    $(".PRD").css("transition", "none");
    if ($(window).width() < 1024) {
        //$(this).addClass("active");
        $(".sort").addClass("D-F");
        $(".fa-bars").trigger("click");
    } else {
        $(".sort").removeClass("D-F");
    }
});

function f() {
    $(".phone-cont-cat").hide();
    $(".cat-drop").click(function () {
        $(".phone-cont-cat").show();
        $("body").css("overflow", "hidden");
        $("html, body").animate({ scrollTop: 0 }, 1);
        return false;
    })
    $(".x-leave").click(function () {
        $(".phone-cont-cat").hide();
        $(".PRD").show();
        $("body").css("overflow", "auto");
        $(".fa-bars-staggered").hide();
    })

}
f();
function centerNoData() {
    if ($('.PRD:not([style*="display:none"])').length === 0) {
        var SortW = $('.sort .sort-by-day').innerWidth();
        $('.container-PRD .content').css('justify-content', 'center')
        $('.container-PRD .content').css('width', SortW)
    }
}



if (window.location.href.indexOf("Day=true") > -1) {
    if ($('.PRD:not([style*="display:none"])').length === 0) {
        $('#nodata').show();
        $('#nodata').html('<i class="fa-solid fa-circle-exclamation"></i> Nothing Posted Today');

    }
    centerNoData()
}
if (window.location.href.indexOf("Week=true") > -1) {
    if ($('.PRD:not([style*="display:none"])').length === 0) {
        $('#nodata').show();
        $('#nodata').html('<i class="fa-solid fa-circle-exclamation"></i> Nothing Posted this Week');

    }
    centerNoData()
}

if (window.location.href.indexOf("Month=true") > -1) {
    if ($('.PRD:not([style*="display:none"])').length === 0) {
        $('#nodata').show();
        $('#nodata').html('<i class="fa-solid fa-circle-exclamation"></i> Nothing Posted this Month');

    }
    centerNoData()
}



$('.ADD-FAV').click(function () {
    $(this).parent().trigger("click");
});



$("#search-ico").click(function () {
    centerNoData()
    var filter = $('#search-in').val(),
        count = 0;
    $('#results div').each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
            $(this).toggleClass("slide-in-left");
            count++;

        }

    });

});

$(document).on('keypress', function (e) {
    if (e.which == 13) {
        $("#search-ico").trigger("click");
        if ($('.PRD:not([style*="display: none"])').length === 0) {
            $('#nodata').show();
        } else {
            $('#nodata').hide();
        }
        console.log($('.PRD:not([style*="display: none"])').length);

    }
});
$("#search-in").keydown(function () {
    var filter = $(this).val(),
        count = 0;
    $('#results div').each(function () {
        if ($(this).text().search(new RegExp(filter, "i")) < 1) {
            $(this).show();
            count++;
            $('#nodata').hide();
        }
    });
    centerNoData()
});
