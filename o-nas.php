<?php
$pageTitle   = 'O nás';
$pageDesc    = 'DOMART servis, s.r.o. z Trenčína – od roku 2010 predaj, montáž a servis bránovej, nakladacej a tieniacej techniky a vstupných systémov.';
$currentPage = 'o-nas';
require __DIR__ . '/includes/header.php';

$years = (int) date('Y') - SITE['founded'];
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Omrvinková navigácia">
            <a href="<?= base_url('index.php') ?>">Domov</a><span>/</span><span aria-current="page">O nás</span>
        </nav>
        <h1>O nás</h1>
        <p>Hodnotou našich služieb je ich kvalita. Bezpečnosťou až k Vám – od roku <?= SITE['founded'] ?>.</p>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="split__text reveal">
            <span class="eyebrow">Príbeh spoločnosti DOMART</span>
            <h2>Jeden z lídrov v regióne</h2>
            <p>Na základe dlhoročných skúseností a poctivého prístupu k práci sa naša spoločnosť stala jednou z najvýznamnejších firiem v regióne, ktoré sa zaoberajú predajom a servisom bránovej, nakladacej a tieniacej techniky a vstupných systémov.</p>
            <p>Poctivý prístup nie je len fráza, ale základný kameň našej filozofie. Každý proces – od prvého kontaktu so zákazníkom až po finálnu montáž a servis – robíme tak, aby ste boli spokojní. Naši ľudia sú technicky zdatní a vyškolení v profesionálnych normách.</p>
            <p>Ponúkame výhradne značkové produkty renomovaných európskych výrobcov so zárukou kvalitnej montáže a s bezpodmienečným dodržiavaním platných technických noriem a bezpečnostných predpisov. Naša práca nekončí predajom – staráme sa, aby všetko fungovalo počas celej životnosti.</p>
        </div>
        <div class="about-visual reveal" aria-hidden="true">
            <div class="about-visual__box">
                <img src="<?= base_url('assets/img/logo-mono-white.svg') ?>" alt="">
                <span>Predaj · Montáž · Servis</span>
            </div>
        </div>
    </div>
</section>

<section class="section section--light">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Náš tím</span>
            <h2>Kto stojí za firmou</h2>
        </div>
        <div class="team">
            <?php foreach (TEAM as $key => $person):
                $photo = glob(__DIR__ . '/assets/img/tim/' . $key . '.{jpg,jpeg,png,webp}', GLOB_BRACE)[0] ?? null;
                $initials = implode('', array_map(fn($w) => mb_substr($w, 0, 1), explode(' ', $person['name'])));
            ?>
                <article class="person reveal">
                    <div class="person__photo">
                        <?php if ($photo): ?>
                            <img src="<?= base_url('assets/img/tim/' . basename($photo)) ?>" alt="<?= e($person['name']) ?>" loading="lazy">
                        <?php else: ?>
                            <span aria-hidden="true"><?= e($initials) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="person__body">
                        <h3><?= e($person['name']) ?></h3>
                        <span class="person__role"><?= e($person['role']) ?></span>
                        <p><?= e($person['bio']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--dark">
    <div class="container split">
        <div class="split__text reveal">
            <span class="eyebrow eyebrow--light">Naša vízia</span>
            <h2>Etablovaná značka v bezpečnosti objektov</h2>
            <p>Zákazníci zo západného Slovenska prichádzajú za nami, lebo vedia, že DOMART im pomôže s riešením ich problémov. V oblasti bezpečnosti chceme byť prvou firmou, ktorá im napadne.</p>
            <p>Naším cieľom je neustále napredovať, zlepšovať sa a rozširovať služby, aby sme mohli ponúknuť to najlepšie, čo trh ponúka.</p>
        </div>
        <ul class="check-list check-list--big reveal">
            <li><?= icon('check') ?> Na trhu od roku <?= SITE['founded'] ?></li>
            <li><?= icon('check') ?> Sídlo v Trenčíne, pôsobnosť najmä na západnom Slovensku</li>
            <li><?= icon('check') ?> Oprávnenie na odborné prehliadky a skúšky zdvíhacích a elektrických zariadení</li>
            <li><?= icon('check') ?> Vlastná zámočnícka dielňa</li>
            <li><?= icon('check') ?> Zákazníci od rodinných domov po veľké priemyselné podniky</li>
        </ul>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Prečo si vybrať nás</span>
            <h2>Na čom nám záleží</h2>
        </div>
        <div class="cards-3">
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('shield') ?></span>
                <h3>Kvalitné produkty</h3>
                <p>Dodávame rokmi overené kvalitné značkové produkty.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('users') ?></span>
                <h3>Klient na prvom mieste</h3>
                <p>To, čo robíme, robíme tak, aby ste boli spokojní.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('wrench') ?></span>
                <h3>Autorizovaný servis</h3>
                <p>Záručný aj pozáručný servis na všetky dodané produkty.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('chat') ?></span>
                <h3>Poradenstvo</h3>
                <p>Ak potrebujete poradiť, sme tu pre vás.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('industrial') ?></span>
                <h3>B2B služby pre firmy</h3>
                <p>V portfóliu našich zákazníkov sú aj veľké podniky. Pomôžeme vám bez ohľadu na veľkosť vašej spoločnosti.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('truck') ?></span>
                <h3>Dovoz kamkoľvek</h3>
                <p>Pomôžeme s výberom, montážou a samozrejme dovezieme až k vám.</p>
            </div>
        </div>
    </div>
</section>

<section class="stats">
    <div class="container stats__grid">
        <div class="stat reveal"><strong data-count="<?= $years ?>" data-suffix="+"><?= $years ?>+</strong><span>rokov na trhu</span></div>
        <div class="stat reveal"><strong><?= SITE['founded'] ?></strong><span>rok založenia</span></div>
        <div class="stat reveal"><strong data-count="<?= count(SERVICES) ?>"><?= count(SERVICES) ?></strong><span>oblastí služieb</span></div>
        <div class="stat reveal"><strong>B2B &amp; B2C</strong><span>firmy aj domácnosti</span></div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
