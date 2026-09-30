<?php
$pageTitle   = 'Brány, rolety, rampy a bariéry';
$currentPage = 'home';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="hero__bg" aria-hidden="true"></div>
    <div class="container hero__inner">
        <div class="hero__content">
            <span class="eyebrow eyebrow--light">DOMART servis, s.r.o. · Trenčín · od roku 2010</span>
            <h1 class="hero__title">Brány a technológie, <span class="text-red">na ktoré sa dá spoľahnúť</span></h1>
            <p class="hero__lead">Predaj, montáž a servis bránovej, nakladacej a tieniacej techniky a vstupných systémov. Značkové produkty renomovaných európskych výrobcov a montáž podľa platných noriem – pre rodinné domy aj veľké podniky.</p>
            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="<?= base_url('kontakt.php#formular') ?>">Chcem cenovú ponuku <?= icon('arrow') ?></a>
                <a class="btn btn--ghost btn--lg" href="<?= base_url('sluzby.php') ?>">Naše služby</a>
            </div>
            <ul class="hero__badges">
                <li><?= icon('check') ?> Poradenstvo a zameranie</li>
                <li><?= icon('check') ?> Montáž na kľúč</li>
                <li><?= icon('check') ?> Záručný aj pozáručný servis</li>
            </ul>
        </div>

        <div class="hero__visual" aria-hidden="true">
            <svg class="gate" viewBox="0 0 400 340">
                <defs>
                    <linearGradient id="gPanel" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0" stop-color="#f5f5f5"/><stop offset="1" stop-color="#d9d9d9"/>
                    </linearGradient>
                    <clipPath id="gClip"><rect x="60" y="80" width="280" height="230"/></clipPath>
                </defs>
                <path d="M30 80 L200 10 L370 80 L370 320 L30 320 Z" fill="#1c1c1f" stroke="#2c2c31" stroke-width="2"/>
                <rect x="52" y="72" width="296" height="248" fill="#0d0d0f"/>
                <rect x="60" y="80" width="280" height="240" fill="#141417"/>
                <g clip-path="url(#gClip)">
                    <g class="gate__panels">
                        <?php for ($i = 0; $i < 5; $i++): $y = 80 + $i * 46; ?>
                            <rect x="60" y="<?= $y ?>" width="280" height="44" rx="2" fill="url(#gPanel)"/>
                            <rect x="60" y="<?= $y + 42 ?>" width="280" height="2" fill="#bdbdbd"/>
                        <?php endfor; ?>
                        <rect x="60" y="126" width="280" height="10" fill="#e40a13"/>
                    </g>
                </g>
                <rect x="52" y="72" width="8" height="248" fill="#2c2c31"/>
                <rect x="340" y="72" width="8" height="248" fill="#2c2c31"/>
                <circle class="gate__lamp" cx="380" cy="96" r="7" fill="#e40a13"/>
                <rect x="0" y="318" width="400" height="6" fill="#2c2c31"/>
            </svg>
            <div class="hero__card hero__card--1"><?= icon('shield') ?><div><strong>Bezpečnosťou</strong><span>až k Vám</span></div></div>
            <div class="hero__card hero__card--2"><?= icon('clock') ?><div><strong>Autorizovaný servis</strong><span>záručný aj pozáručný</span></div></div>
        </div>
    </div>
</section>

<section class="stats">
    <div class="container stats__grid">
        <div class="stat reveal"><strong data-count="<?= date('Y') - SITE['founded'] ?>" data-suffix="+"><?= date('Y') - SITE['founded'] ?>+</strong><span>rokov na trhu</span></div>
        <div class="stat reveal"><strong><?= SITE['founded'] ?></strong><span>rok založenia</span></div>
        <div class="stat reveal"><strong data-count="<?= count(SERVICES) ?>"><?= count(SERVICES) ?></strong><span>oblastí služieb</span></div>
        <div class="stat reveal"><strong>B2B &amp; B2C</strong><span>firmy aj domácnosti</span></div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Čo robíme</span>
            <h2>Naše služby</h2>
            <p>Komplexné riešenia pre rodinné domy, firmy, sklady aj výrobné haly – od poradenstva cez montáž až po servis.</p>
        </div>
        <div class="services-grid">
            <?php foreach (SERVICES as $slug => $s):
                $photo = glob(__DIR__ . '/assets/img/sluzby/' . $slug . '-*.{jpg,jpeg,png,webp}', GLOB_BRACE)[0] ?? null; ?>
                <a class="service-card<?= $photo ? ' service-card--photo' : '' ?> reveal" href="<?= base_url($slug . '.php') ?>">
                    <?php if ($photo): ?>
                        <span class="service-card__img"><img src="<?= base_url('assets/img/sluzby/' . basename($photo)) ?>" alt="" loading="lazy"></span>
                    <?php endif; ?>
                    <span class="service-card__icon"><?= icon($s['icon']) ?></span>
                    <h3><?= e($s['title']) ?></h3>
                    <p><?= e($s['short']) ?></p>
                    <span class="service-card__more">Zistiť viac <?= icon('arrow') ?></span>
                </a>
            <?php endforeach; ?>
            <a class="service-card service-card--accent reveal" href="<?= base_url('servis.php') ?>">
                <span class="service-card__icon"><?= icon('wrench') ?></span>
                <h3>Servis a revízie</h3>
                <p>Záručný aj pozáručný servis, odborné prehliadky a revízie – aj zariadení od iných dodávateľov.</p>
                <span class="service-card__more">Objednať servis <?= icon('arrow') ?></span>
            </a>
        </div>
    </div>
</section>

<section class="section section--dark">
    <div class="container split">
        <div class="split__text reveal">
            <span class="eyebrow eyebrow--light">Prečo DOMART</span>
            <h2>Jeden partner od návrhu po servis</h2>
            <p>Na základe dlhoročných skúseností a poctivého prístupu sme sa stali jednou z najvýznamnejších firiem v regióne v oblasti bránovej, nakladacej a tieniacej techniky. Poradíme, dodáme, namontujeme a postaráme sa o servis počas celej životnosti.</p>
            <a class="btn btn--primary" href="<?= base_url('o-nas.php') ?>">Viac o nás <?= icon('arrow') ?></a>
        </div>
        <div class="features">
            <div class="feature reveal"><span class="feature__icon"><?= icon('shield') ?></span><h3>Kvalitné produkty</h3><p>Dodávame rokmi overené značkové produkty renomovaných európskych výrobcov.</p></div>
            <div class="feature reveal"><span class="feature__icon"><?= icon('users') ?></span><h3>Klient na prvom mieste</h3><p>To, čo robíme, robíme tak, aby ste boli spokojní.</p></div>
            <div class="feature reveal"><span class="feature__icon"><?= icon('wrench') ?></span><h3>Autorizovaný servis</h3><p>Záručný aj pozáručný servis na všetky dodané produkty.</p></div>
            <div class="feature reveal"><span class="feature__icon"><?= icon('truck') ?></span><h3>B2B služby a dovoz</h3><p>Pracujeme pre domácnosti aj veľké podniky. Pomôžeme s výberom, montážou a dovezieme až k vám.</p></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Ako to prebieha</span>
            <h2>Od dopytu k hotovej realizácii</h2>
        </div>
        <ol class="steps">
            <li class="step reveal"><span class="step__num">01</span><h3>Dopyt</h3><p>Zavoláte alebo vyplníte formulár a ozveme sa vám s ďalším postupom.</p></li>
            <li class="step reveal"><span class="step__num">02</span><h3>Obhliadka a zameranie</h3><p>Prídeme na miesto, zameriame a poradíme s riešením.</p></li>
            <li class="step reveal"><span class="step__num">03</span><h3>Cenová ponuka</h3><p>Pripravíme prehľadnú ponuku bez skrytých poplatkov.</p></li>
            <li class="step reveal"><span class="step__num">04</span><h3>Montáž a servis</h3><p>Profesionálna montáž, zaškolenie a dlhodobý servis.</p></li>
        </ol>
    </div>
</section>

<section class="section section--light">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Povedali o nás</span>
            <h2>Referencie klientov</h2>
        </div>
        <?php foreach (TESTIMONIALS as $t): ?>
            <figure class="testimonial reveal">
                <span class="testimonial__icon"><?= icon('quote') ?></span>
                <blockquote><?= e($t['text']) ?></blockquote>
                <figcaption><strong><?= e($t['name']) ?></strong><span><?= e($t['role']) ?></span></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Časté otázky</span>
            <h2>Máte otázku?</h2>
        </div>
        <div class="faq">
            <details class="faq__item reveal">
                <summary>Ako získam cenovú ponuku?</summary>
                <p>Vyplňte formulár alebo zavolajte na <?= e(SITE['phone']) ?> (cenové ponuky). Podľa potreby prídeme na obhliadku a zameranie a pripravíme nezáväznú ponuku.</p>
            </details>
            <details class="faq__item reveal">
                <summary>Robíte servis aj na brány, ktoré ste nemontovali?</summary>
                <p>Áno. Poskytujeme záručný aj pozáručný servis pre nami dodané zariadenia, aj pre zariadenia dodané inými firmami. Cenník servisu nájdete na stránke <a href="<?= base_url('servis.php') ?>">Servis</a>.</p>
            </details>
            <details class="faq__item reveal">
                <summary>Ako dlho trvá realizácia?</summary>
                <p>Závisí od typu produktu a dodacích lehôt výrobcu. Predpokladaný termín realizácie vám oznámime spolu s cenovou ponukou.</p>
            </details>
            <details class="faq__item reveal">
                <summary>Kde pôsobíte?</summary>
                <p>Sídlime v Trenčíne a našimi zákazníkmi sú najmä firmy a domácnosti zo západného Slovenska. Pomôžeme s výberom aj montážou a dovezieme až k vám – pre dostupnosť vo vašej lokalite nás kontaktujte.</p>
            </details>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
