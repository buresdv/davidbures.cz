$(document).ready(function(){
    //Otevírání a zavírání formuláře
    $('#tlacitkoContact').click(function() {
        $('objednaniModalOverlay').addClass('modalAktivni');
        $('transformer').addClass('transformerAktivni');
    });
    $('zavritModal').click(function() {
        $('objednaniModalOverlay').removeClass('modalAktivni');
        $('transformer').removeClass('transformerAktivni');
    });

    //Vybrání služby
    $(document).on('change', '#sluzby', function(e) {
        $('input[type="number"]').val('');
        $('input[type="checkbox"]').prop("checked", false);

        console.log($('input[type="checkbox"], input[type="number"]').val());
        console.table("Změna tabu, " + $('input[type="number"]'));

        prepocitatCenu();
        pridatNormostrany();

        vybranaSluzba = this.options[e.target.selectedIndex].text;
        //console.log(vybranaSluzba);
        
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

    // Výchozí ceny
    var vychoziCena = 150;
    var korekturaCena = 0;
    var grafickaUpravaCena = 0;
    var pocetNormostran = 0;

    $(document).on('change', 'input[type="checkbox"], input[type="number"]', function(e) {
        prepocitatCenu();
        pridatNormostrany();
    });

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

        strankaCena = vychoziCena + korekturaCena + grafickaUpravaCena;
        
        $('#strankaCenaValue').html(strankaCena);
    }

    function pridatNormostrany() {
        pocetNormostran = $('input[type="number"]').val();

        if (pocetNormostran == "") {
            $('#pocetStranekValue').html('× 0');
        }

        $('#pocetStranekValue').html('× ' + pocetNormostran);
        konecnaCena = strankaCena * pocetNormostran;
        $('.konecnaCenaValue').html(konecnaCena + ' Kč');
        console.log(pocetNormostran);
    }
});