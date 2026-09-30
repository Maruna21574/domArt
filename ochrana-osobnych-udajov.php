<?php
$pageTitle   = 'Ochrana osobných údajov';
$pageDesc    = 'Zásady spracúvania osobných údajov a používania cookies na webe DOMART servis, s.r.o.';
$currentPage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Omrvinková navigácia">
            <a href="<?= base_url('index.php') ?>">Domov</a><span>/</span><span aria-current="page">Ochrana osobných údajov</span>
        </nav>
        <h1>Ochrana osobných údajov</h1>
        <p>Informácie o spracúvaní osobných údajov podľa nariadenia GDPR a zákona č. 18/2018 Z. z.</p>
    </div>
</section>

<section class="section">
    <div class="container prose">
        <h2>Prevádzkovateľ</h2>
        <p>
            <strong><?= e(SITE['company']) ?></strong><br>
            <?= e(SITE['address']) ?><br>
            IČO: <?= e(SITE['ico']) ?><?= SITE['dic'] ? ', DIČ: ' . e(SITE['dic']) : '' ?><br>
            Zapísaná v: <?= e(SITE['register']) ?><br>
            E-mail: <a href="mailto:<?= e(SITE['email']) ?>"><?= e(SITE['email']) ?></a>, tel.: <a href="tel:<?= e(SITE['phone_href']) ?>"><?= e(SITE['phone']) ?></a>
        </p>

        <h2>Aké údaje spracúvame</h2>
        <p>Prostredníctvom kontaktného formulára spracúvame údaje, ktoré nám sami poskytnete: meno a priezvisko alebo názov firmy, e-mailovú adresu, telefónne číslo a obsah správy.</p>

        <h2>Účel a právny základ</h2>
        <ul>
            <li>vybavenie vášho dopytu a príprava cenovej ponuky – opatrenia pred uzavretím zmluvy (čl. 6 ods. 1 písm. b) GDPR),</li>
            <li>komunikácia s vami na základe vášho súhlasu (čl. 6 ods. 1 písm. a) GDPR).</li>
        </ul>

        <h2>Doba uchovávania</h2>
        <p>Údaje z formulára uchovávame najviac 2 roky od poslednej komunikácie, ak z nich nevznikne zmluvný vzťah. V takom prípade ich uchovávame po dobu vyžadovanú právnymi predpismi.</p>

        <h2>Príjemcovia</h2>
        <p>Údaje neposkytujeme tretím stranám na marketingové účely. Príjemcom môže byť poskytovateľ webhostingu a e-mailových služieb, ktorý údaje spracúva v našom mene.</p>

        <h2>Vaše práva</h2>
        <ul>
            <li>právo na prístup k údajom, ich opravu a vymazanie,</li>
            <li>právo na obmedzenie spracúvania a prenosnosť údajov,</li>
            <li>právo namietať a kedykoľvek odvolať súhlas,</li>
            <li>právo podať sťažnosť na Úrad na ochranu osobných údajov SR.</li>
        </ul>
        <p>Svoje práva si môžete uplatniť e-mailom na <a href="mailto:<?= e(SITE['email']) ?>"><?= e(SITE['email']) ?></a>.</p>

        <h2>Cookies</h2>
        <p>Web používa iba nevyhnutné technické cookies (relácia PHP pre bezpečné odoslanie formulára) a lokálne úložisko prehliadača na zapamätanie potvrdenia cookie lišty. Nepoužívame analytické ani reklamné cookies. Stránka Kontakt zobrazuje mapu Google, ktorá môže ukladať vlastné cookies podľa pravidiel spoločnosti Google.</p>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
