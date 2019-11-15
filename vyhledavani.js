
/*$('objednaniModal').ready(function() {
    $.ajaxSetup({cache: false});
    
    var dataJSON = '{"text": [{"cena": "400","sluzby": ["Vědecký text", "Interní dokumentaci", "Rodný list", "Program", "Aplikaci"]}, {"cena": "300", "sluzby": ["Odborný text", "Webové stránky", "Knihu", "Novinový článek"]}, {"cena": "250","sluzby": ["Obyčejný text"]}],"tlumoceni": [{"cena": "800","sluzby": ["Úřední komunikaci", "Koferenci"]}, {"cena": "1000","sluzby": ["Policejní"]}, {"cena": "700","sluzby": ["Prezentací"]}]}';

    $('.sluzbaVyhledavani').keyup(function() {
        var vyhledavaciPole = $(this).val();
        if (vyhledavaciPole == '') {
            $('vysledky').remove();
        } else {
            $('.sluzbaVyhledavani').after('<vysledky><ul></ul></vysledky>');
        }

        const regex = new RegExp(vyhledavaciPole, 'i');
        var output = '<div class="row">';
        var count = 1;

        $.getJSON('sluzby.json', function(data) {
            $.each(data, function(key, val) {
                if((val.sluzby.search(regex) != -1) || (val.cena.search(regex) != -1)) {
                    $('vysledky ul').append('<li>' + val.sluzby + val.cena + '</li>');
                }
            });
        });
    });
});*/