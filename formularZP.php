<?php
    /*header('Content-type: text/html; charset=utf-8');

    $jmeno = $_POST["jmeno"];
    $email = $_POST["email"];
    $zvolenaPomoc = $_POST["bezpecnostniOtazka"];


    $zvolenaPomocBezCisel = preg_replace('/[0-9]+/', '', $zvolenaPomoc);
    $kontrolniCislo = round(6.6);
    if ($zvolenaPomocBezCisel . $kontrolniCislo !== $zvolenaPomoc) {
        require "index.html";
        echo "
            <chyba>
                <h2>Špatně jste přepsali slovo do poslední kolonky.</h2>
                <button>Zavřít</button>
            </chyba>";
        $nepokracovat = true;
    }

    if (!isset($jmeno) || !isset($email) || !isset($zvolenaPomoc)) {
        require "index.html";
        echo "
            <chyba>
                <h2>Nevyplnili jste všechna políčka.</h2>
                <button>Zavřít</button>
            </chyba>";
        $nepokracovat = true;
    }

    if (!$nepokracovat) {
        $zprava = "Anglická záchranka: nový pacient\n\n"
        . "Zvolená pomoc: " . $zvolenaPomocBezCisel . "\n\n"
        . "Jméno: " . $jmeno . "\n\n"
        . "E-mail: " . $email . "\n\n";

        if (mail("buresdv@icloud.com", "A-Z: Nový uchazeč o " . $zvolenaPomocBezCisel, $zprava)) {
            require "odeslano.html";
        }
    }*/
    header('Content-type: text/html; charset=utf-8');

    $sluzba = $_POST["sluzba"];
    $stranky = $_POST["stranky"];
    $zahrnoutKorekturu = $_POST["zahrnoutKorekturu"];
    $zahrnoutGrafickouUpravu = $_POST["grafickaUprava"];
    $mimoStandardniHodiny = $_POST["mimoStandardniHodiny"];

    echo("Best girlfriend Elča <3");
?>