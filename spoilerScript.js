function zobrazitSpoilery() {
    var spoiler = document.getElementsByClassName('spoiler');
    console.table(spoiler);
    
    for(var i = 0; i < spoiler.length; i += 1) {
        spoiler[i].style.display = "block";
    }
}