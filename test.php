<?php
$arrayPointer = 'appleAplikace';

$doporuceni = array(
    'uceleneTexty' => 'text, který chcete přeložit, ve formátech Word .docx, OpenOffice .odt, nebo .pdf.',
    'appleAplikace' => 'lokalizační soubory, které budete chtít přeložit (např. složku cs.lproj nebo soubory .strings).',
    'weboveStranky' => 'všechny .html soubory, které budete chtít přeložit, a jakékoliv další soubory, které jsou třeba k tomu, aby vaše stránka správně vypadala (např. relevantní .css soubory).',
    'tlumoceni' => 'pár informací o vaší zakázce, například co přesně chcete přetlumočit, v jakém prostředí (budova, venkovní prostory apod.) a v jakém časovém rozmezí.'
);
$doplnekDoZpravy = $doporuceni[$arrayPointer];

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

    echo $zpravaZakaznik;
?>