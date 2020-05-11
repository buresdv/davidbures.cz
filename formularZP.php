<?php
    header("Content-type: text/html; charset=utf-8");

    $email = $_POST["email"];
    $sluzba = array_filter($_POST["sluzba"]);
    $stranky = array_filter($_POST["stranky"]);
    $zahrnoutKorekturu = $_POST["zahrnoutKorekturu"];
    $zahrnoutGrafickouUpravu = $_POST["grafickaUprava"];
    $mimoStandardniHodiny = $_POST["mimoStandardniHodiny"];

    $sluzba = implode("I", $sluzba);
    $stranky = implode("I", $stranky);
    $arrayPointer = $_POST["typSluzbyHack"];
    
    $vypocitanaCena = $_POST["cenaHack"];

    $zahrnoutKorekturuMail = "❌ <b>Korektura</b> nezahrnuta";
    $zahrnoutGrafickouUpravuMail = "❌ <b>Grafická úrava</b> nezahrnuta";
    $mimoStandardniHodinyMail = "❌ <b>Zakázka mimo standardní hodiny</b>";

    if (!empty($zahrnoutKorekturu)) {
        $zahrnoutKorekturuMail = "✔ Zahrnuta <b>korektura</b>";
    }
    if (!empty($zahrnoutGrafickouUpravu)) {
        $zahrnoutGrafickouUpravuMail = "✔ Zahrnuta <b>grafická úprava</b>";
    }
    if (!empty($mimoStandardniHodiny)) {
        $mimoStandardniHodinyMail = "✔ Zakázka <b>mimo standardní hodiny</b>";
    }

    $doporuceni = array(
        'uceleneTexty' => 'text, který chcete přeložit, ve formátech Word .docx, OpenOffice .odt, nebo .pdf.',
        'appleAplikace' => 'lokalizační soubory, které budete chtít přeložit (např. složku cs.lproj nebo soubory .strings).',
        'weboveStranky' => 'všechny .html soubory, které budete chtít přeložit, a jakékoliv další soubory, které jsou třeba k tomu, aby vaše stránka správně vypadala (např. relevantní .css soubory).',
        'tlumoceni' => 'pár informací o vaší zakázce, například co přesně chcete přetlumočit, v jakém prostředí (budova, venkovní prostory apod.) a v jakém časovém rozmezí.'
    );
    $doplnekDoZpravy = $doporuceni[$arrayPointer];

    $headers = 'From: David Bureš <ja@davidbures.cz>' . PHP_EOL .
    'Reply-To: David Bureš <buresdv@gmail.com>' . PHP_EOL .
    'Content-Type: text/html; charset=UTF-8' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

    $headersZakaznik = 'From: davidbures.cz <ja@davidbures.cz>' . PHP_EOL .
    'Reply-To: David Bureš <buresdv@gmail.com>' . PHP_EOL .
    'Content-Type: text/html; charset=UTF-8' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

    $zprava = "E-mail: " . $email . "\n\n"
        . "Zvolená služba: " . $sluzba . "\n\n"
        . "Počet stránek: " . $stranky . "\n\n"
        . "Cena: " . $vypocitanaCena . "\n\n"
        . $zahrnoutKorekturuMail . "\n\n"
        . $zahrnoutGrafickouUpravuMail . "\n\n"
        . $mimoStandardniHodinyMail . "\n\n";

    mail("buresdv@icloud.com", "Test " . $sluzba, $zprava, $headers);

    $zpravaZakaznik = 
    '
    <html>
    <head>
        </head>
    <body>
        <!--[if mso]>
        <style type="text/css">
        h1, h2, h3, h4, h5, h6, p, a, span, td, strong {
            font-family: Helvetica, Arial, Verdana, sans-serif !important;
        }
        </style>
        <![endif]-->
        <table width="800" style="border-collapse:collapse">
            <tr>
    <td width="50" style="color:#384046; font-family:Inter, Helvetica, Arial, Verdana, sans-serif; font-size:16px; font-weight:500; line-height:1.7; padding:15px; height:50px; padding-right:0; width:50px" height="50" width="50"><img width="50" height="50" style="height: 50px; width: 50px; display: block;" src="https://davidbures.cz/apple-touch-icon.png" alt="Logo"></td>
    <td style="color:#384046; font-family:Inter, Helvetica, Arial, Verdana, sans-serif; font-size:16px; font-weight:500; line-height:1.7; padding:15px">Překlad<br>Tlumočení</td>
    <td style="color:#384046; font-family:Inter, Helvetica, Arial, Verdana, sans-serif; font-size:16px; font-weight:500; line-height:1.7; padding:15px; width:160px" width="160">
    <span class="secondary" style="color:#7A8B98">IČO: </span>08097941<br><span class="secondary" style="color:#7A8B98">DIČ: </span>CZ9806014768</td>
    </tr>
            <tr><td colspan="3" style="color:#384046; font-family:Nunito, Helvetica, Arial, Verdana, sans-serif; font-size:20px; font-weight:bold; line-height:1.7; padding:15px; padding-bottom:10px; padding-top:10px">Potvrzení přijetí objednávky</td></tr>
            <tr><td colspan="3" style="color:#384046; font-family:Inter, Helvetica, Arial, Verdana, sans-serif; font-size:16px; font-weight:500; line-height:1.7; padding:15px; padding-top:10px">
                <p>Dobrý den,<br>
                    vaši objednávku jsem přijal a brzy vám poušlu e-mail s dalšími informacemi.</p>
                <p>Než se vám ozvu, můžete si připravit ' . $doplnekDoZpravy . '
                </p>
                <p>
                    <br>Těším se na naši spolupráci a přeji pěkný zbytek dne,<br><br><span style="font-family: Nunito, Helvetica, Arial, Verdana, sans-serif; font-weight:500;">David Bureš<br><span class="modra" style="color:#2196F3; font-family:Nunito, Helvetica, Arial, Verdana, sans-serif; font-weight:500;">Tlumočení a překlad Bureš</span><br><a style="color:#384046 !important; text-decoration:none; font-weight:500;" href="https://davidbures.cz">https://davidbures.cz</a></span>
                </p>
            </td></tr>
        </table>
    </body>
    </html>';
    

    $subject = "davidbures.cz: Informace o vaší objednávce";
    $sub = '=?UTF-8?B?'.base64_encode($subject).'?=';
    mail($email, $sub, $zpravaZakaznik, $headersZakaznik);

    /*echo "Elčaaaa 💗💗💗💗💗💗";
    echo "I seriously love you so so so much... You're just... perfect... 💗💗💗💗💗💗 >___<";
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
    echo "Cena: " . $vypocitanaCena;*/
    /*echo '<pre>'; print_r($zahrnoutKorekturu); echo '</pre>';*/
    /*echo '<pre>'; print_r($zahrnoutGrafickouUpravu); echo '</pre>';*/
?>