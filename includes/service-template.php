<?php
/**
 * Spoločná šablóna pre podstránky služieb.
 * Pred include nastavte $slug (kľúč z poľa SERVICES).
 */
require_once __DIR__ . '/config.php';

if (!isset($slug, SERVICES[$slug])) {
    http_response_code(404);
    require __DIR__ . '/../404.php';
    exit;
}

$service     = SERVICES[$slug];
$pageTitle   = $service['title'];
$pageDesc    = $service['short'] . ' Predaj, montáž a servis – ' . SITE['company'] . '.';
$currentPage = 'sluzby';
require __DIR__ . '/header.php';

// Voliteľné fotky: assets/img/sluzby/<slug>-1.jpg, -2.jpg, ... (ak existujú, zobrazia sa v galérii)
$photos = glob(__DIR__ . '/../assets/img/sluzby/' . $slug . '-*.{jpg,jpeg,png,webp}', GLOB_BRACE) ?: [];
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Omrvinková navigácia">
            <a href="<?= base_url('index.php') ?>">Domov</a>
            <span>/</span>
            <a href="<?= base_url('sluzby.php') ?>">Služby</a>
            <span>/</span>
            <span aria-current="page"><?= e($service['title']) ?></span>
        </nav>
        <div class="page-hero__row">
            <span class="page-hero__icon"><?= icon($service['icon']) ?></span>
            <div>
                <h1><?= e($service['title']) ?></h1>
                <p><?= e($service['lead']) ?></p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container service-layout">
        <div class="service-layout__main">
            <?php if (!empty($service['text'])): ?>
                <div class="service-intro reveal">
                    <?php foreach ($service['text'] as $para): ?>
                        <p><?= e($para) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <h2 class="reveal">Čo ponúkame</h2>
            <div class="feature-list">
                <?php foreach ($service['features'] as $i => [$title, $text]): ?>
                    <article class="feature-list__item reveal">
                        <span class="feature-list__num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                        <div>
                            <h3><?= e($title) ?></h3>
                            <p><?= e($text) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <h2 class="reveal">Fotogaléria</h2>
            <?php if ($photos): ?>
                <div class="gallery gallery--compact">
                    <?php foreach ($photos as $photo): $src = 'assets/img/sluzby/' . basename($photo); ?>
                        <a class="gallery__item reveal" href="<?= base_url($src) ?>" data-lightbox>
                            <img src="<?= base_url($src) ?>" alt="<?= e($service['title']) ?> – fotografia" loading="lazy">
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="placeholder-gallery reveal">
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <div class="placeholder-gallery__item"><?= icon($service['icon']) ?></div>
                    <?php endfor; ?>
                </div>
                <p class="muted">Fotografie našich realizácií nájdete aj na <a href="<?= e(SITE['instagram']) ?>" target="_blank" rel="noopener">Instagrame</a>.</p>
            <?php endif; ?>
        </div>

        <aside class="service-layout__side">
            <div class="side-card reveal">
                <h3>Čo získate</h3>
                <ul class="check-list">
                    <?php foreach ($service['benefits'] as $b): ?>
                        <li><?= icon('check') ?> <?= e($b) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="side-card side-card--red reveal">
                <h3>Nezáväzná ponuka</h3>
                <p>Pošlite nám rozmery a predstavu, pripravíme vám nezáväznú cenovú ponuku.</p>
                <a class="btn btn--white btn--block" href="<?= base_url('kontakt.php?sluzba=' . urlencode($slug) . '#formular') ?>">Poslať dopyt</a>
                <a class="side-card__phone" href="tel:<?= e(SITE['phone_href']) ?>"><?= icon('phone') ?> <?= e(SITE['phone']) ?></a>
            </div>
        </aside>
    </div>
</section>

<section class="section section--light">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Ďalšie služby</span>
            <h2>Mohlo by vás zaujímať</h2>
        </div>
        <div class="services-grid services-grid--4">
            <?php foreach (SERVICES as $otherSlug => $s): if ($otherSlug === $slug) continue; ?>
                <a class="service-card reveal" href="<?= base_url($otherSlug . '.php') ?>">
                    <span class="service-card__icon"><?= icon($s['icon']) ?></span>
                    <h3><?= e($s['title']) ?></h3>
                    <p><?= e($s['short']) ?></p>
                    <span class="service-card__more">Zistiť viac <?= icon('arrow') ?></span>
                </a>
            <?php endforeach; ?>
            <a class="service-card service-card--accent reveal" href="<?= base_url('servis.php') ?>">
                <span class="service-card__icon"><?= icon('wrench') ?></span>
                <h3>Servis a revízie</h3>
                <p>Záručný aj pozáručný servis, odborné prehliadky – aj zariadení iných dodávateľov.</p>
                <span class="service-card__more">Objednať servis <?= icon('arrow') ?></span>
            </a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/footer.php'; ?>
