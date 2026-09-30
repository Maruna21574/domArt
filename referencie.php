<?php
$pageTitle   = 'Referencie';
$pageDesc    = 'Ukážky realizácií DOMART servis – priemyselné a garážové brány, rolety, žalúzie, nakladacie rampy, závory a stĺpiky.';
$currentPage = 'referencie';
require __DIR__ . '/includes/header.php';

/*
 * Galéria so všetkými fotkami služieb + vlastné fotky z assets/img/referencie/.
 * Názov súboru začnite skratkou služby (napr. garazove-brany-3.jpg, nakladacie-rampy-sklad.webp),
 * podľa toho sa fotka zaradí pod správne tlačidlo filtra.
 */
$photos = [];
$counts = [];
foreach (['sluzby', 'referencie'] as $dir) {
    foreach (glob(__DIR__ . "/assets/img/$dir/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}", GLOB_BRACE) ?: [] as $file) {
        $name = basename($file);
        $cat  = '';
        foreach (array_keys(SERVICES) as $slug) {
            if (str_starts_with($name, $slug . '-')) { $cat = $slug; break; }
        }
        $photos[] = ['src' => "assets/img/$dir/$name", 'cat' => $cat, 'name' => $name];
        $counts[$cat] = ($counts[$cat] ?? 0) + 1;
    }
}
// Poradie ako v menu služieb, v rámci služby prirodzene podľa čísla
$order = array_flip(array_keys(SERVICES));
usort($photos, fn($a, $b) => [($order[$a['cat']] ?? 99), $a['name']] <=> [($order[$b['cat']] ?? 99), $b['name']]
    ?: strnatcasecmp($a['name'], $b['name']));
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Omrvinková navigácia">
            <a href="<?= base_url('index.php') ?>">Domov</a><span>/</span><span aria-current="page">Referencie</span>
        </nav>
        <h1>Referencie</h1>
        <p>Pozrite si, čo sme už pre našich zákazníkov urobili – od garáží rodinných domov až po logistické areály.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Naše realizácie</span>
            <h2>Galéria prác</h2>
        </div>

        <?php if ($photos): ?>
            <?php if (count(array_filter(array_keys($counts))) > 1): ?>
                <div class="filters reveal" data-filter-group=".gallery__item" role="group" aria-label="Filtrovať realizácie podľa služby">
                    <button type="button" class="is-active" data-filter="*" aria-pressed="true">Všetko <span><?= count($photos) ?></span></button>
                    <?php foreach (SERVICES as $slug => $s): if (empty($counts[$slug])) continue; ?>
                        <button type="button" data-filter="<?= e($slug) ?>" aria-pressed="false"><?= e($s['title']) ?> <span><?= $counts[$slug] ?></span></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="gallery">
                <?php foreach ($photos as $p): $label = $p['cat'] ? SERVICES[$p['cat']]['title'] : 'Realizácia'; ?>
                    <a class="gallery__item" href="<?= base_url($p['src']) ?>" data-lightbox data-category="<?= e($p['cat']) ?>">
                        <img src="<?= base_url($p['src']) ?>" alt="<?= e($label) ?>" loading="lazy">
                        <span class="gallery__label"><?= e($label) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="gallery reveal">
                <?php foreach (SERVICES as $slug => $s): ?>
                    <div class="placeholder-gallery__item" title="<?= e($s['title']) ?>"><?= icon($s['icon']) ?></div>
                <?php endforeach; ?>
                <div class="placeholder-gallery__item"><?= icon('wrench') ?></div>
                <div class="placeholder-gallery__item"><?= icon('shield') ?></div>
                <div class="placeholder-gallery__item"><?= icon('tool') ?></div>
            </div>
            <p class="muted" style="text-align:center;margin-top:18px">Fotogaléria sa pripravuje. Aktuálne realizácie nájdete na našom Instagrame.</p>
        <?php endif; ?>
    </div>
</section>

<section class="section section--light">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Pre koho pracujeme</span>
            <h2>Typy zákaziek</h2>
        </div>
        <div class="project-types">
            <div class="project-type reveal">
                <?= icon('garage') ?>
                <h3>Rodinné domy</h3>
                <p>Garážové brány, vonkajšie rolety, žalúzie a screenové clony pre novostavby aj rekonštrukcie.</p>
            </div>
            <div class="project-type reveal">
                <?= icon('industrial') ?>
                <h3>Výrobné haly</h3>
                <p>Sekcionálne a rýchlobežné brány, automatika a pravidelné revízie.</p>
            </div>
            <div class="project-type reveal">
                <?= icon('truck') ?>
                <h3>Sklady a logistika</h3>
                <p>Kompletné nakladacie miesta – mostíky, tesniace límce, nárazníky a brány.</p>
            </div>
            <div class="project-type reveal">
                <?= icon('barrier') ?>
                <h3>Areály a parkoviská</h3>
                <p>Závory, stĺpiky, turnikety a parkovacie systémy EkoPark II.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Vybrané realizácie</span>
            <h2>Pre koho sme pracovali</h2>
        </div>
        <div class="cards-3 cards-3--2">
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('industrial') ?></span>
                <h3>LEONI Wiring System Slovakia, Trenčín</h3>
                <p>Dodávka všetkých sekčných a rýchlobežných brán v areáli výrobného závodu. Viac ako 15 rokov kompletný servis vrátane pravidelných revíznych prehliadok.</p>
            </div>
            <div class="info-card reveal">
                <span class="info-card__icon"><?= icon('blinds') ?></span>
                <h3>Facility System Hub</h3>
                <p>Realizácia tieniacej techniky – riešenie na mieru podľa potrieb klienta.</p>
            </div>
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

<?php if (SITE['instagram']): ?>
<section class="section">
    <div class="container">
        <div class="insta-cta reveal">
            <div class="insta-cta__body">
                <span class="insta-cta__icon"><?= icon('instagram') ?></span>
                <div>
                    <h2>Sledujte nás na Instagrame</h2>
                    <p>Najnovšie realizácie a novinky zverejňujeme na profile @domart_servis.</p>
                </div>
            </div>
            <a class="btn btn--primary" href="<?= e(SITE['instagram']) ?>" target="_blank" rel="noopener">Otvoriť Instagram <?= icon('arrow') ?></a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
