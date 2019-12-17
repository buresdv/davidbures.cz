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

    $email = $_POST["email"];
    $sluzba = array_filter($_POST["sluzba"]);
    $stranky = array_filter($_POST["stranky"]);
    $zahrnoutKorekturu = $_POST["zahrnoutKorekturu"];
    $zahrnoutGrafickouUpravu = $_POST["grafickaUprava"];
    $mimoStandardniHodiny = $_POST["mimoStandardniHodiny"];
    
    $vypocitanaCena = $_POST["vypocitanaCena"];

    echo "Elčaaaa 💗💗💗💗💗💗";
    echo "I seriously love you so so so much... You're just... perfect... 💗💗💗💗💗💗 >___<";
    /*echo $stranky . $sluzba . $zahrnoutKorekturu . $zahrnoutGrafickouUpravu . $mimoStandardniHodiny;*/
    echo '<br> e-mail: <b>' . $email . '</b>';
    echo '<pre>'; print_r($sluzba); echo '</pre>';
    echo '<pre>'; print_r($stranky); echo '</pre>';
    if (!empty($zahrnoutKorekturu)) {
        echo "✔ Zahrnuta <b>korektura</b>";
    }
    if (!empty($zahrnoutGrafickouUpravu)) {
        echo "✔ Zahrnuta <b>grafická úprava</b>";
    }
    if (!empty($mimoStandardniHodiny)) {
        echo "✔ Zakázka <b>mimo standardní hodiny</b>";
    }
    echo "Cena: " . $vypocitanaCena;
    /*echo '<pre>'; print_r($zahrnoutKorekturu); echo '</pre>';*/
    /*echo '<pre>'; print_r($zahrnoutGrafickouUpravu); echo '</pre>';*/
?>