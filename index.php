<!doctype HTML>
<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124054612-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-124054612-1');
        </script>
        
        <meta name="author" content="David Bureš">
        <meta name="description" content="Tlumočení, překlad a korektura angličtiny">
        <meta name="keywords" content="tlumočení angličtiny, překlad vědeckých článků, překlad angličtiny, korektura angličtiny, překlad softwaru, lokalizace software">
        <meta property="og:title" content="Tlumočník a překladatel David Bureš">
        <meta property="og:description" content="David Bureš je tlumočník, překladatel a korektor angličtiny. Specializuje se na vědecké články, lokalizaci softwaru a tlumočení konferencí a prezentací.">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#2196f3">
        <meta name="msapplication-TileColor" content="#2b5797">
        
        <meta name="theme-color" content="#2196F3">
        <title>Tlumočník a překladatel: David Bureš</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <link rel="stylesheet" href="stylesheet.css" type="text/css">
        <script src="cenik.js"></script>
        <script src="form.js"></script>
        <script src="vyhledavani.js"></script>
    </head>
    <body>
        <objednaniModalOverlay>
            <objednaniModal>
                <levaStrana>
                    <form>
                        Váš email:
                        <input type="email" placeholder="vas@email.cz">

                        <inlineContainer>
                            Vyberte si službu: 
                            <select name="sluzby" id="sluzby">
                                <option value="blank">-----</option>
                                <option value="preklad">Překlad</option>
                                <option value="korektura">Korektura</option>
                                <option value="tlumoceni">Tlumočení</option>
                            </select>
                        </inlineContainer>
                        <vybranPreklad class="vybrat">
                            Co chcete přeložit?
                            <input type="text" class="sluzbaVyhledavani" placeholder="Vědecký text, rodný list apod." class="hledani">
                            Kolik normostran? <span class="normostrana">Normostrana = 1 800 znaků včetně mezer</span>
                            <input type="number" placeholder="0-900">

                            <inlineContainer>
                                <input type="checkbox" name="zahrnoutKorekturu" value="zahrnoutKorekturu">Zahrnout korekturu
                            </inlineContainer>
                            <inlineContainer>
                                <input type="checkbox" name="grafickaUprava" value="zahrnoutGrafickouUpravu">Zahrnout grafickou úpravu
                            </inlineContainer>
                        </vybranPreklad>
                        <vybranaKorektura class="vybrat">
                            Čeho chcete provést korekturu?
                            <input type="text" class="sluzbaVyhledavani" placeholder="Vědecký text, rodný list apod." class="hledani">
                            Kolik normostran? <span class="normostrana">Normostrana = 1 800 znaků včetně mezer</span>
                            <input type="number" placeholder="0-900">

                            <inlineContainer>
                                <input type="checkbox" name="grafickaUprava" value="zahrnoutGrafickouUpravu">Zahrnout grafickou úpravu
                            </inlineContainer>
                        </vybranaKorektura>
                        <vybranoTlumoceni class="vybrat">
                            Co chcete přetlumočit?
                            <input type="text" class="sluzbaVyhledavani" placeholder="Konferenci, úřední komunikaci apod." class="hledani">
                            Kolik hodin bude vaše zakázka přibližně trvat?
                            <input type="number" placeholder="0-900">
                            <inlineContainer>
                                <input type="checkbox" name="mimoStandardniHodiny" value="mimoStandardniHodiny">Zakázka mimo 9:00 - 17:00
                            </inlineContainer>
                        </vybranoTlumoceni>

                        <inlineContainer style="margin-top: 1.5vw;">
                            <input type="checkbox" name="student" value="jsemStudent">Jsem student
                        </inlineContainer>
                        <!--
                        <br>Číslo vaší ISIC karty:
                        <input type="text" placeholder="S 123 456 789 000 N">-->
                        <input type="submit">
                    </form>
                </levaStrana>
                <pravaStrana>
                    <zavritModal>
                        <p>×</p>
                    </zavritModal>
                    <p>Přibližná cena:</p>
                    <h1 class="konecnaCenaValue">0 Kč</h1>
                    <div id="vypocet">
                        <table>
                            <tr id="zduvodneniCeny" class="hidden">
                                <td colspan="2" style="color: #fff; text-align: right !important;">Proč je tlumočení tak drahé?</td>
                            </tr>
                            <tr>
                                <td id="vychoziCena">Výchozí cena za stránku:</td><td id="vychoziCenaValue"></td>
                            </tr>
                            <tr class="hidden" id="korekturaRow">
                                <td id="korekturaCena">Korektura:</td><td id="korekturaCenaValue">+ 150</td>
                            </tr>
                            <tr class="hidden" id="grafickaUpravaRow">
                                <td id="grafickaUpravaCena">Grafická úprava:</td><td id="grafickaUpravaCenaValue">+ 200</td>
                            </tr>
                            <tr class="hidden" id="mimoStandardniHodinyRow">
                                <td id="standardHodinyCena">Mimo standardní hodiny:</td><td id="standardHodinyCenaValue">+ 250</td>
                            </tr>
                            <tr class="rovnaSe">
                                <td id="strankaCena">Cena za stránku:</td><td id="strankaCenaValue"></td>
                            </tr>
                            <tr>
                                <td id="pocetStranek">Počet stránek:</td><td id="pocetStranekValue"></td>
                            </tr>
                            <tr class="rovnaSe">
                                <td id="konecnaCena">Přibližná cena:</td><td class="konecnaCenaValue">---</td>
                            </tr>
                        </table>
                    </div>
                </pravaStrana>
            </objednaniModal>
        </objednaniModalOverlay>
        <bar>
            <a href="en/">English</a>
            <!--<a href="jp/">日本語</a>-->
            <a href="https://blog.davidbures.cz" style="margin-left: auto;">Blog</a>
            <a href="/oMne/">O mně</a>
        </bar>
        <transformer>
        <header>
            <h1>Tlumočník, překladatel, korektor</h1>
            <p id="jaz">Čeština, Angličtina, Japonština</p>
            <p>Překlad a korektura vědeckých článků, lokalizace softwaru,<br> tlumočení konferencí a prezentací</p>
            <a class="buttonLike" id="tlacitkoContact">KONTAKTUJTE MĚ</a>
            <cenikContainer>
                <p id="cenik">CENÍK</p>
                <div id="cenik-menu" class="">
                    <h1>Překlad</h1>
                    <table>
                        <tr>
                            <td>Vědecký článek</td><td>350 Kč/n.s.</td>
                        </tr>
                        <tr>
                            <td>Odborný text</td><td>300 Kč/n.s.</td>
                        </tr>
                        <tr>
                            <td>Obyčejný článek</td><td>200 Kč/n.s.</td>
                        </tr>
                    </table>
                    <h1>Korektura angličtiny</h1>
                        <table>
                            <tr>
                                <td>Vědecký článek</td><td>250 Kč/n.s.</td>
                            </tr>
                            <tr>
                                <td>Odborný text</td><td>200 Kč/n.s.</td>
                            </tr>
                        </table>
                    <h1>Tlumočení ČJ a AJ</h1>
                        <table>
                            <tr>
                                <td>Prezentace</td><td>400 Kč/hodina</td>
                            </tr>
                            <tr>
                                <td>Konference</td><td>400 Kč/hodina</td>
                            </tr>
                        </table>
                    <a href="#cn">Detailní ceník</a>
<!--                    <h3>Ceny zahrnují DPH</h3>-->
                </div>
            </cenikContainer>
        </header>
        <bImage></bImage>
        <whoami>
            <karta>
                <section style="width: 100%;">
                    <h2>Proč  já?</h2>
                    <div>
                        <img src="20180210-2138-ples-gymhol-095.jpg" style="max-width: 15vw; align-self: flex-start;">
                        <ul style="margin: 0;">
                            <li>Jako překladatel a korektor vědeckých, odborných a populárně-vědeckých textů působím už od roku 2014</li>
                            <li>O mé jazykové služby měly zájem instituce jako Waze a Univerzita Tomáše Bati ve Zlíně</li>
                            <li>Třetím rokem tlumočím mezinárodní konference</li>
                            <li>Jsem obeznámený s nejnovějším vývojem v tlumočnických a překladatelských technikách a zvyklostech</li>
                            <li>Proč ne?</li>
                        </ul>
                    </div>
                    <a href="/oMne">Více o mně</a>
                </section>
            </karta>
        </whoami>
        <content>
            <karta class="pak">
                <kartaThumb></kartaThumb>
                <h1>Překladatel a korektor</h1>
                <section>
                    <h2>Vědecké články</h2>
                    <a href="http://www.sciencedirect.com/science/article/pii/S002364381630010X">The comparison of the effect of sodium caseinate, calcium caseinate, carboxymethyl cellulose and xanthan gum on rice-buckwheat dough rheological characteristics and textural and sensory quality of bread</a>
                    <a href="http://www.sciencedirect.com/science/article/pii/S0023643817302311">The effect of Chios mastic gum addition on the characteristics of rice dough and bread</a>
                    <a href="http://www.sciencedirect.com/science/article/pii/S0733521014001246">The relationship between rheological characteristics of gluten-free dough and the quality of biologically leavened bread</a>
                    <a href="http://onlinelibrary.wiley.com/doi/10.1111/jtxs.12176/abstract">The Behavior of Amaranth, Chickpea, Millet, Corn, Quinoa, Buckwheat and Rice Doughs Under Shear Oscillatory and Uniaxial Elongational Tests Simulating Proving and Baking</a>
                    <a href="http://kvasnyprumysl.cz/artkey/kpr-201701-0002_Porovnani_schopnosti_bezlepkoveho_testa_produkovat_kyprici_plyn_behem_peceni_a_jeho_vliv_na_kvalitu_peciva.php">Porovnání schopnosti bezlepkového těsta produkovat kypřící plyn během pečení a jeho vliv na kvalitu pečiva</a>
                </section>
                <section>
                    <h2>Software</h2>
                    <a href="https://www.transifex.com/user/profile/lFenix/">Deepin Desktop Environment</a>
                    <a href="https://l10n.gnome.org/users/lFenix/">GNOME</a>
                    <a href="https://github.com/lFenix/MultiMC5-translate">MultiMC</a>
                    <p>Antergos<span class="konec">2017-2019</span></p>
                    <h2>Titulky (zatím nefunguje!)</h2>
                    <a href="/titulky/">Jojoovo šílené dobrodružství 5: zlatý vítr</a>
                </section>
            </karta>
            <karta id="tl" style="width: auto; flex-grow: 2;">
                <kartaThumb></kartaThumb>
                <h1>Tlumočník</h1>
                <section style="width: 100%;">
                    <h2>Konference</h2>
                    <a href="tlu/index.htm">Waze Česko-Slovenský Meetup 2018</a>
                    <a href="tlu/index.htm">Waze Česko-Slovenský Meetup 2017</a>
                    <a href="tlu/index.htm">Waze Česko-Slovenský Meetup 2016</a>
                </section>
            </karta>
            <karta style="width: 30%; flex-grow: 1;">
                <h1>A další</h1>
                <section style="width: 100%;">
                    <h2>Moje knihy</h2>
                    <a href="/psani/index.html#dynastieFeng">Dynastie Feng</a>
                    <a href="/psani/index.html#czechTheNormalWay">Czech the Normal Way</a>
                    <a href="/psani/index.html#sbirkaNahodneho">Sbírka náhodného</a>
                </section>
            </karta>
            <karta id="cn">
                <h1>Ceník</h1>
                <table>
                    <tr><td></td><td></td><th>Standard</th><th>Studenti</th></tr>
                    <tr><td rowspan="3">Překlad<br><span><p>Webové stránky jsou účtovány podle počtu objednaných stránek.</p><p>Grafická úprava dokumentů není v ceně zahrnuta.</p></span></td><td>Vědecký článek<br>Interní dokumentace</td><td>400 Kč/<span class="ns">ns</span></td><td>300 Kč/<span class="ns">ns</span></td></tr>
                    <tr><td>Odborný text<br>Webové stránky</td><td>300 Kč/<span class="ns">ns</span></td><td>200 Kč/<span class="ns">ns</span></td></tr>
                    <tr><td>Obyčejný text</td><td>250 Kč/<span class="ns">ns</span></td><td>150 Kč/<span class="ns">ns</span></td></tr>
                    <tr class="spacer"></tr>
                    <tr><td></td><td></td><th>Standard</th><th>Studenti</th></tr>
                    <tr><td rowspan="3">Korektura<br><span><p>Webové stránky jsou účtovány podle počtu objednaných stránek.</p><p>Grafická úprava textů není v ceně zahrnuta.</p></span></td><td>Vědecký článek<br>Interní dokumentace</td><td>300 Kč/<span class="ns">ns</span></td><td>200 Kč/<span class="ns">ns</span></td></tr>
                    <tr><td id="reference">Odborný text<br>Webové stránky</td><td>250 Kč/<span class="ns">ns</span></td><td>150 Kč/<span class="ns">ns</span></td></tr>
                    <tr><td>Obyčejný text</td><td>200 Kč/<span class="ns">ns</span></td><td>100 Kč/<span class="ns">ns</span></td></tr>
                    <tr class="spacer"></tr>
                    <tr><td></td><td></td><th>Standard</th><th>Studenti</th></tr>
                    <tr><td rowspan="3">Tlumočení<br><span><p>On-site nebo vzdálené tlumočení.</p><p>Mimo 9:00-17:00 je účtován poplatek 250 Kč/hod.</p></span></td><td>Úřední<br>Konferencí</td><td>800 Kč/<span class="ns">hod</span></td><td>650 Kč/<span class="ns">hod</span></td></tr>
                    <tr><td id="referenced">Policejní</td><td>1 000 Kč/<span class="ns">hod</span></td><td>750 Kč/<span class="ns">hod</span></td></tr>
                    <tr><td>Prezentací</td><td>700 Kč/<span class="ns">hod</span></td><td>450 Kč/<span class="ns">hod</span></td></tr>
                </table>
            </karta>
        </content>
        <links>
            <container>
                <h2>Najdete mě i jinde</h2>
                <odkazy>
                    <a href="https://anglicka-zachranka.cz">Anglická záchranka</a>
                    <a href="https://www.linkedin.com/in/buresdv/?locale=cs_CZ">LinkedIn</a>
                    <a href="http://blog.davidbures.cz">Blog</a>
                    <a href="https://www.youtube.com/channel/UCvxjzslUwAaWGvG3UyK-64g/">YouTube</a>
                </odkazy>
            </container>
            <footer>
                <h1>2014-<?php echo date("Y"); ?></h1>
            </footer>
        </links>
    </transformer>
    </body>
</html>