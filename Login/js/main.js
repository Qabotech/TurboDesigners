$(document).ready(function() {
    if (window.location.href.indexOf("emptyInput") > -1) {
        $( "<h2 class='err'>Please fill all the fields</h2>" ).insertBefore( ".send" );
    }
    if (window.location.href.indexOf("WrongLogin") > -1) {
        $( "<h2 class='err'>Email or Password is nor Correct</h2>" ).insertBefore( ".send" );
    }
});