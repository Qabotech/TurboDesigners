$(document).ready(function() {
    if (window.location.href.indexOf("emptyInput") > -1) {
        $( "<h2 class='err'>Please fill all the fields</h2>" ).insertBefore( ".send" );
    }
    if (window.location.href.indexOf("EmailTaken") > -1) {
        $( "<h2 class='err'>This Email is already in use</h2>" ).insertBefore( ".send" );
        $("input[name='Email']").css("border","1px solid #f25861")
        $("input[name='Email']").prev().css("color","#f25861")
    }
    if (window.location.href.indexOf("InvalidEmail") > -1) {
        $( "<h2 class='err'>Please Enter a suitable Email</h2>" ).insertBefore( ".send" );
        $("input[name='Email']").css("border","1px solid #f25861")
        $("input[name='Email']").prev().css("color","#f25861")
    }
    if (window.location.href.indexOf("PWDnoMatch") > -1) {
        $( "<h2 class='err'>Passwords does not match</h2>" ).insertBefore( ".send" );
        $("input:password").css("border","1px solid #f25861")
        $("input:password").prev().css("color","#f25861")
    }


  });

  