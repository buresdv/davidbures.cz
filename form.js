$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    console.log("Ay");

    //Otevírání a zavírání formuláře
    $('#tlacitkoContact').click(function() {
        if($('objednaniModalOverlay').hasClass('modalNeaktivni')) {
            $('objednaniModalOverlay').removeClass('modalNeaktivni');
        }
        if($('transformer').hasClass('transformerNeaktivni')) {
            $('transformer').removeClass('transformerNeaktivni');
        }
        $('objednaniModalOverlay').addClass('modalAktivni');
        $('transformer').addClass('transformerAktivni');
    });
    $('zavritModal').click(function() {
        $('objednaniModalOverlay').removeClass('modalAktivni');
        $('objednaniModalOverlay').addClass('modalNeaktivni');
        $('transformer').removeClass('transformerAktivni');
        $('transformer').addClass('transformerNeaktivni');
    });

    $(document).on('click', 'buttonContainer a', function(e){
        $('buttonContainer a').removeClass('activeSelection');
        $(this).addClass('activeSelection');

        if(vychoziCena != 0) {
            vychoziCena = 0;
        }
        if(pocetNormostran != 0) {
            pocetNormostran = 0;
            alert("Elčaaa");
            $("input[type=number]").val();
        }

        $('form')[0].reset();

        vybranaSluzba = $(".activeSelection").html();
        console.log(vybranaSluzba);

        prepocitatCenu();
        pridatNormostrany();
        
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
        }
    });

    // Výchozí ceny
    var vychoziCena = 0;
    var standardniHodinyCena = 0;
    var korekturaCena = 0;
    var grafickaUpravaCena = 0;
    var pocetNormostran = 0;
    var korekturaCenaModifier = 0;

    var optionsPreklad = {
        url: "sluzbyText.json",
        getValue: "sluzba",
        list: {
            match: {
                enabled: true
            },
            maxNumberOfElements: 3,
            showAnimation: {
                type: "slide",
                time: 400
            },
            hideAnimation: {
                type: "slide",
                time: 400
            },

            onClickEvent: function() {
                vychoziCena = $(".sluzbaVyhledavani.preklad").getSelectedItemData().cena;
                korekturaCena = Number($(".sluzbaVyhledavani.preklad").getSelectedItemData().korektura);
                console.log(korekturaCena);
                $(".konecnaCenaValue").html(vychoziCena);
                $('#vychoziCenaValue').html(vychoziCena);
                prepocitatCenu();
                pridatNormostrany();
                console.log(vychoziCena);
            }
        }
    };
    $(".sluzbaVyhledavani.preklad").easyAutocomplete(optionsPreklad);

    var optionsKorektura = {
        url: "sluzbyText.json",
        getValue: "sluzba",
        list: {
            match: {
                enabled: true
            },
            maxNumberOfElements: 3,
            showAnimation: {
                type: "slide",
                time: 400
            },
            hideAnimation: {
                type: "slide",
                time: 400
            },

            onClickEvent: function() {
                vychoziCena = $(".sluzbaVyhledavani.korektura").getSelectedItemData().korektura;
                $(".konecnaCenaValue").html(vychoziCena);
                $('#vychoziCenaValue').html(vychoziCena);
                prepocitatCenu();
                pridatNormostrany();
            }
        }
    };
    $(".sluzbaVyhledavani.korektura").easyAutocomplete(optionsKorektura);

    var optionsTlumoceni = {
        url: "sluzbySlovo.json",
        getValue: "sluzba",
        list: {
            match: {
                enabled: true
            },
            maxNumberOfElements: 3,
            showAnimation: {
                type: "slide",
                time: 400
            },
            hideAnimation: {
                type: "slide",
                time: 400
            },

            onClickEvent: function() {
                vychoziCena = $(".sluzbaVyhledavani.tlumoceni").getSelectedItemData().cena;
                $(".konecnaCenaValue").html(vychoziCena);
                $('#vychoziCenaValue').html(vychoziCena);
                prepocitatCenu();
                pridatNormostrany();
            }
        }
    };
    $(".sluzbaVyhledavani.tlumoceni").easyAutocomplete(optionsTlumoceni);

    //Ostatní úpravy
    $(document).on('keyup', ' input[type="number"]', function(e) {
        prepocitatCenu();
        pridatNormostrany();
    });
    $(document).on('change', 'input[type="checkbox"]', function(e) {
        prepocitatCenu();
        pridatNormostrany();
    });

    $('#pocetStranekValue').append('× ' + pocetNormostran);

    function prepocitatCenu() {
        //Je zatržená korektura?
        if ($('input[name="zahrnoutKorekturu[]"]').is(':checked')) {
            $('#korekturaRow').removeClass('hidden');
            $("#korekturaCenaValue").html("+ " + korekturaCena);
            korekturaCenaModifier = 0;
        } else {
            $('#korekturaRow').addClass('hidden');
            korekturaCenaModifier = korekturaCena;
        }

        //Je zatržená grafická úprava?
        if ($('input[name="grafickaUprava[]"]').is(':checked')) {
            $('#grafickaUpravaRow').removeClass('hidden');
            grafickaUpravaCena = 200;
        } else {
            $('#grafickaUpravaRow').addClass('hidden');
            grafickaUpravaCena = 0;
        }
        //Je zatržená zakázka mimo normální dobu?
        if ($('input[name="mimoStandardniHodiny[]"]').is(':checked')) {
            standardniHodinyCena = 250;
            $('#mimoStandardniHodinyRow').removeClass('hidden');
        } else {
            $('#mimoStandardniHodinyRow').addClass('hidden');
            standardniHodinyCena = 0;
        }

        strankaCena = Number(vychoziCena)  + standardniHodinyCena + korekturaCena + grafickaUpravaCena - korekturaCenaModifier;
        
        $('#strankaCenaValue').html(strankaCena);
    }

    function pridatNormostrany() {
        var pocetNormostran = $('input[type="number"]').map(function(idx, elem) {
           return $(elem).val();
        }).get();
        pocetNormostran = pocetNormostran.filter(function(el) {
            return el.length && el==+el;
        });

        if (pocetNormostran == "") {
            $('#pocetStranekValue').html('× 0');
        }

        $('#pocetStranekValue').html('× ' + pocetNormostran);
        konecnaCena = strankaCena * pocetNormostran;
        if (isNaN(Number(vychoziCena)) || isNaN(Number(strankaCena))) {
            $('.konecnaCenaValue').html(konecnaCena + 'i');
        } else {
            $('.konecnaCenaValue').html(konecnaCena + ' Kč');
        }
    }

    //Pass ceny do PHP
    $('#kontaktFormularOdeslat').on("click", function() {
        $.post('formularZP.php', 'vypocitanaCena=' + konecnaCena, function(response) {
            alert("E");
        })
        /*$.ajax(
            {
                url: "formularZP.php",
                type: "POST",

                data: { vypocitanaCena: konecnaCena }
            }
        );*/
    });
});