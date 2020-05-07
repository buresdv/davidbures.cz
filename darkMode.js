$(document).ready(function(){
    $("#dark").click(function() {
        $("body").addClass("darkMode");
    });
    $("#white").click(function() {
        $("body").removeClass("darkMode");
    });
});