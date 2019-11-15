$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    console.log("Ay");

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
        if (vybranaSluzba == "Tlumočení" ) {
            $('#zduvodneniCeny').removeClass('hidden');
        } else {
            $('#zduvodneniCeny').addClass('hidden');
        }
    });

    // Výchozí ceny
    var vychoziCena = 0;
    var standardniHodinyCena = 0;
    var korekturaCena = 0;
    var grafickaUpravaCena = 0;
    var pocetNormostran = 0;


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
                vychoziCena = $(".sluzbaVyhledavani").getSelectedItemData().cena;
                $(".konecnaCenaValue").html(vychoziCena);
                $('#vychoziCenaValue').html(vychoziCena);
                prepocitatCenu();
                pridatNormostrany();
            }
        }
    };
    $(".sluzbaVyhledavani.preklad").easyAutocomplete(optionsPreklad);

    var optionsKorektura = {
        url: "sluzbyKorektura.json",
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
                vychoziCena = $(".sluzbaVyhledavani").getSelectedItemData().cena;
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
                vychoziCena = $(".sluzbaVyhledavani").getSelectedItemData().cena;
                $(".konecnaCenaValue").html(vychoziCena);
                $('#vychoziCenaValue').html(vychoziCena);
                prepocitatCenu();
                pridatNormostrany();
            }
        }
    };
    $(".sluzbaVyhledavani.tlumoceni").easyAutocomplete(optionsTlumoceni);

    //Vyhledávání
    /*$(".sluzbaVyhledavani").focus().keyup(function() {
        $("vysledky li").html("");
        var searchField = $(".sluzbaVyhledavani").focus().val();
        var expression = new RegExp(searchField, "i");
        $.getJSON("sluzbyText.json", function(data) {
            $.each(data, function(key, value) {
                if (value.sluzba.search(expression) != -1) {
                    $("vysledky li").append("<ul> <vysledek>" + value.sluzba + "</vysledek>");
                }
            });
        });
        if ($(".sluzbaVyhledavani").focus().val() == "") {
            $("vysledky li").html("");
        }
    });
    $(document).on("click", "vysledek" , function() {        
        var clickText = $(this).text().split('|');
        $(".sluzbaVyhledavani").focus().val($.trim(clickText[0]));
        nacistCenu();
        $("vysledky li").html("");
    });*/

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
        //Je zatržená zakázka mimo normální dobu?
        if ($('input[name=mimoStandardniHodiny]').is(':checked')) {
            standardniHodinyCena = 250;
            $('#mimoStandardniHodinyRow').removeClass('hidden');
        } else {
            $('#mimoStandardniHodinyRow').addClass('hidden');
            standardniHodinyCena = 0;
        }

        strankaCena = Number(vychoziCena)  + standardniHodinyCena + korekturaCena + grafickaUpravaCena;
        
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
        $('.konecnaCenaValue').html(konecnaCena + ' Kč');
    }
});