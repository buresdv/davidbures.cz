$(document).ready(function(){
    //Otevírání a zavírání formuláře
    $('#tlacitkoContact').click(function() {
        $('objednaniModalOverlay').addClass('modalAktivni');
        $('transformer').addClass('transformerAktivni');
    });
    $('zavritModal' || 'transformer').click(function() {
        $('objednaniModalOverlay').removeClass('modalAktivni');
        $('transformer').removeClass('transformerAktivni');
    });

    //Vybrání služby
    $(document).on('change', '#sluzby', function(e) {
        vybranaSluzba = this.options[e.target.selectedIndex].text;
        console.log(vybranaSluzba);
        
        if (vybranaSluzba == 'Překlad') {
            $('vybranPreklad').addClass('vybrano');
            $('vybranaKorektura').removeClass('vybrano');
            $('vybranoTlumoceni').removeClass('vybrano');
        } else if (vybranaSluzba == 'Korektura') {
            $('vybranaKorektura').addClass('vybrano');
            $('vybranPreklad').removeClass('vybrano');
            $('vybranoTlumoceni').removeClass('vybrano');
        } else if (vybranaSluzba == 'Tlumočení') {
            $('vybranoTlumoceni').addClass('vybrano');
            $('vybranPreklad').removeClass('vybrano');
            $('vybranaKorektura').removeClass('vybrano');
        } else {
            $('vybranoTlumoceni').removeClass('vybrano');
            $('vybranPreklad').removeClass('vybrano');
            $('vybranaKorektura').removeClass('vybrano');
        }  
    });

    $(document).on('change', 'input[type="checkbox"], input[type="number"]', function(e) {
        prepocitatCenu();
        pridatNormostrany();
    });

    //Výpočet ceny
    var vychoziCena = 150;
    var korekturaCena = 0;
    var grafickaUpravaCena = 0;
    var pocetNormostran = 0;

    $('#vychoziCenaValue').html(vychoziCena);
    $('#pocetStranekValue').append('× ' + pocetNormostran);

    function prepocitatCenu() {
        //Je zatržená korektura?
        if ($('input[name=zahrnoutKorekturu]').is(':checked')) {
            $('#korekturaRow').removeClass('hidden');
            korekturaCena = 150;
        } else {
            $('#korekturaRow').addClass('hidden');
            korekturaCena = 0;
        }

        //Je zatržená grafická úprava?
        if ($('input[name=grafickaUprava]').is(':checked')) {
            $('#grafickaUpravaRow').removeClass('hidden');
            grafickaUpravaCena = 200;
        } else {
            $('#grafickaUpravaRow').addClass('hidden');
            grafickaUpravaCena = 0;
        }

        //Vytáhnout počet normostran

        strankaCena = vychoziCena + korekturaCena + grafickaUpravaCena;
        konecnaCena = strankaCena * pocetNormostran;
        
        $('#strankaCenaValue').html(strankaCena);
    }

    function pridatNormostrany() {
        $(document).on('input', 'input[name=pocetNormostran]', function(){
            alert("e");
            pocetNormostran = $('input[name=pocetNormostran]').val();
        });
    }

});