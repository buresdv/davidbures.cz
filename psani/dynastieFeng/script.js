$(document).ready(function(){
    $("#dark").click(function() {
        $(":root").get(0).style.setProperty("--theme2", "#2e2e2e");
        $(":root").get(0).style.setProperty("--theme1", "#fff");
        $(":root").get(0).style.setProperty("--themeAccent", "#747474");
    });
    $("#white").click(function() {
        $(":root").get(0).style.setProperty("--theme2", "#fff");
        $(":root").get(0).style.setProperty("--theme1", "#2e2e2e");
        $(":root").get(0).style.setProperty("--themeAccent", "#747474");
    });
});