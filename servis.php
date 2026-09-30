<?php
$pageTitle   = 'Servis a revízie';
$pageDesc    = 'Servis, opravy a pravidelné revízie priemyselných a garážových brán, nakladacích rámp, závor a roliet.';
$currentPage = 'servis';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Omrvinková navigácia">
            <a href="<?= base_url('index.php') ?>">Domov</a><span>/</span><span aria-current="page">Servis</span>
        </nav>
        <h1>Servis a revízie</h1>
        <p>Profesionálny servis bránovej a nakladacej techniky. Roky skúseností a kvalifikovaní servisní technici sú zárukou, že váš problém odstránime odborne a v najkratšom možnom čase.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cards-3">
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('shield') ?></span>
                <h3>Záručný servis</h3>
                <p>Vykonávame na základe predpisov Obchodného alebo Občianskeho zákonníka.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('wrench') ?></span>
                <h3>Pozáručný servis</h3>
                <p>Pre nami dodané zariadenia aj pre zariadenia dodané inými firmami – podľa našich servisných podmienok a cenníka.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('tool') ?></span>
                <h3>Odborné prehliadky a skúšky</h3>
                <p>Pravidelné revízne prehliadky brán a nakladacej techniky. Máme oprávnenie na odborné prehliadky a skúšky zdvíhacích a elektrických vyhradených technických zariadení.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section--light" id="cennik">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Cenník</span>
            <h2>Cena servisných služieb a prác</h2>
            <p>Ceny za 1 servisného technika bez použitia materiálu.</p>
        </div>
        <div class="price-table reveal">
            <table>
                <thead>
                    <tr><th scope="col">Služba</th><th scope="col">bez DPH</th><th scope="col">s DPH</th></tr>
                </thead>
                <tbody>
                    <tr><td>Jednorazový výjazd – diagnostika do 1 hodiny, <strong>fyzické osoby</strong></td><td>45 €</td><td>54 €</td></tr>
                    <tr><td>Jednorazový výjazd – diagnostika do 1 hodiny, <strong>právnické osoby</strong></td><td>85 €</td><td>102 €</td></tr>
                    <tr><td>Každá ďalšia začatá hodina v pracovnom čase (8:00 – 16:00)</td><td>28 €</td><td>33,60 €</td></tr>
                    <tr><td>Každá ďalšia začatá hodina po pracovnej dobe (16:00 – 22:00)</td><td>90 €</td><td>108 €</td></tr>
                    <tr><td>Každá ďalšia začatá hodina v čase 22:00 – 8:00, cez víkendy a sviatky</td><td>100 €</td><td>120 €</td></tr>
                    <tr><td>Doprava v rámci mesta Trenčín (jednotný poplatok)</td><td>15 €</td><td>18 €</td></tr>
                    <tr><td>Doprava mimo mesta Trenčín (tam aj späť)</td><td>0,70 €/km</td><td>0,84 €/km</td></tr>
                </tbody>
            </table>
        </div>
        <div class="price-notes reveal">
            <p>Cena výjazdu zahŕňa čas samotnej opravy na mieste a čas potrebný na prípravu servisného zásahu. Prvá hodina sa vždy účtuje ako jednorazový výjazd – diagnostika, ďalej sa účtuje každá začatá hodina. K cene sa pripočítavajú použité náhradné diely a doprava.</p>
            <p>Servisné práce vykonávame na základe písomnej objednávky. Zmluvní partneri môžu servis objednať aj telefonicky a mať dohodnuté individuálne podmienky v servisnej zmluve. Súkromní zákazníci platia na mieste v hotovosti (príjmový doklad, následne faktúra), firmy na základe faktúry alebo zálohovej faktúry. Po každom zásahu vystavíme <em>Záznam o vykonaní</em> servisného zásahu.</p>
        </div>
    </div>
</section>

<section class="section section--dark">
    <div class="container split">
        <div class="split__text reveal">
            <span class="eyebrow eyebrow--light">Servisná zmluva</span>
            <h2>Pravidelná údržba vyjde lacnejšie ako havária</h2>
            <p>Pre firmy ponúkame servisné zmluvy s nadštandardnými podmienkami. Napríklad pre LEONI Wiring System Slovakia v Trenčíne zabezpečujeme už viac ako 15 rokov kompletný servis brán vrátane pravidelných revíznych prehliadok.</p>
            <a class="btn btn--primary" href="<?= base_url('kontakt.php?sluzba=servis#formular') ?>">Mám záujem <?= icon('arrow') ?></a>
        </div>
        <ul class="check-list check-list--big reveal">
            <li><?= icon('check') ?> Bezodkladný zásah servisných technikov</li>
            <li><?= icon('check') ?> Pravidelné revízne prehliadky</li>
            <li><?= icon('check') ?> Individuálne cenové podmienky</li>
            <li><?= icon('check') ?> Objednanie servisu aj telefonicky</li>
            <li><?= icon('check') ?> Záznam o vykonaní ku každému zásahu</li>
        </ul>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Čo servisujeme</span>
            <h2>Servis pre všetky naše oblasti</h2>
        </div>
        <div class="services-grid">
            <?php foreach (SERVICES as $slug => $s): ?>
                <a class="service-card reveal" href="<?= base_url($slug . '.php') ?>">
                    <span class="service-card__icon"><?= icon($s['icon']) ?></span>
                    <h3><?= e($s['title']) ?></h3>
                    <p><?= e($s['short']) ?></p>
                    <span class="service-card__more">Zistiť viac <?= icon('arrow') ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
