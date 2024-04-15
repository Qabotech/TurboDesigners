$('.ADD-FAV').click(function() {
    $( ".ADD-TO-FAV" ).trigger( "click" );
    alert("hi")
});
function reload() {
    window.onload = function() {
        if (!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
}
reload();