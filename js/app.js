function IsLogged() {
    $(".sys li:nth-child(2) a").html('Log Out');
    $(".sys li:nth-child(2) a").attr("href", "../logout/")
    $(".sys li:nth-child(1) a").attr("href", "../UserProfile/")
    $(".this2").attr("href", "../UserProfile/")
    $(".this").attr("href", "../logout/");
}

function NoLogged() {
    $(".this2").attr("href", "../Register/")
    $(".sys li:nth-child(2) a").html('Login');
    $(".sys li:nth-child(2) a").attr("href", "../Login/");
    $(".this").attr("href", "../Login/");
}

$('a').attr("aria-label", "Turbo Designers");
$('button').attr("aria-label", "Turbo Designers");

function PhoneNav() {
    $(".P-nav").hide();

    $("#F-X").click(function () {
        $(".P-nav").hide();
        $("body").css("overflow", "auto");
        $(".fa-bars-staggered").attr("style", "display:gird !important;");
    })
    $(".fa-bars-staggered").click(function () {
        $(".P-nav").show();
        $("body").css("overflow", "hidden");
        $(".fa-bars-staggered").attr("style", "display:none !important;");
    })
}

function reload() {
    window.onload = function () {

        if (!window.location.hash) {
            $('.loading').hide();
            $("body").css('overflow', 'auto');
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
}

PhoneNav();

if ($(".OverLay ")[0]) {
    $(".STbox").css('background', 'unset');

} else {
    // Do something if class does not exist

}

document.title = "Turbo Designers";
if (window.location.href.indexOf("Store") > -1) {
    document.title = "Turbo Designers | Store";
}
if (window.location.href.indexOf("Services") > -1) {
    document.title = "Turbo Designers | Services";
}
if (window.location.href.indexOf("ContactUs") > -1) {
    document.title = "Turbo Designers | ContactUs";
}
if (window.location.href.indexOf("About") > -1) {
    document.title = "Turbo Designers | About";
}
if (window.location.href.indexOf("Register") > -1) {
    document.title = "Turbo Designers | Register";
}
if (window.location.href.indexOf("Login") > -1) {
    document.title = "Turbo Designers | Login";
}
if (window.location.href.indexOf("ERR") > -1) {
    document.title = "Turbo Designers | ERR";
}
if (window.location.href.indexOf("Shopping-cart") > -1) {
    document.title = "Turbo Designers | Shopping Cart";
}
if (window.location.href.indexOf("Favorite") > -1) {
    document.title = "Turbo Designers | Favorite";
}
if (window.location.href.indexOf("UserProfile") > -1) {
    document.title = "Turbo Designers | User Profile";
}
if (window.location.href.indexOf("Custom-Order") > -1) {
    document.title = "Turbo Designers | Custom Order";
}
if (window.location.href.indexOf("Custom-Order-Details") > -1) {
    document.title = "Turbo Designers | Order Details ";
}

$("body").css('overflow', 'hidden');




