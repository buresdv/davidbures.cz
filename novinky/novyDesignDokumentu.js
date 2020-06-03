/*[...document.querySelectorAll('tr')].forEach(function(item) {
    item.addEventListener('mouseenter', function (event) {
        var vyska = this.offsetHeight;
        $("body").get(0).style.setProperty("--zvyrazneniVyska", vyska + "px");
    });
});*/



document.getElementById('qrPlatby').addEventListener('mouseenter', function (event) {
    console.log("I love youuu");
    document.getElementById('qrKod').classList.add('zvyrazneniBorder');
});

document.getElementById('qrPlatby').addEventListener('mouseleave', function (event) {
    console.log("I love youuu so muchhh");
    document.getElementById('qrKod').classList.remove('zvyrazneniBorder');
});