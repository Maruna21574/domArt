<?php
/**
 * Hlavička stránky.
 * Pred include nastavte: $pageTitle, $pageDesc, $currentPage
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';

$pageTitle   = $pageTitle ?? SITE['tagline'];
$pageDesc    = $pageDesc ?? 'DOMART servis, s.r.o. – predaj, montáž a servis priemyselných a garážových brán, roliet, žalúzií, screenov, nakladacích rámp, bariér a stĺpikov.';
$currentPage = $currentPage ?? '';
$fullTitle   = $pageTitle . ' | ' . SITE['name'];
$cssVer      = @filemtime(__DIR__ . '/../assets/css/style.css') ?: 1;
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($fullTitle) ?></title>
    <script>document.documentElement.classList.add('js');</script>
    <meta name="description" content="<?= e($pageDesc) ?>">
    <meta name="theme-color" content="#e40a13">
    <meta property="og:title" content="<?= e($fullTitle) ?>">
    <meta property="og:description" content="<?= e($pageDesc) ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="sk_SK">
    <?php $iconVer = @filemtime(__DIR__ . '/../favicon.ico') ?: 1; ?>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>?v=<?= $iconVer ?>" sizes="48x48">
    <link rel="icon" href="<?= base_url('assets/img/favicon.svg') ?>?v=<?= $iconVer ?>" type="image/svg+xml">
    <link rel="icon" href="<?= base_url('assets/img/favicon-32.png') ?>?v=<?= $iconVer ?>" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/apple-touch-icon.png') ?>?v=<?= $iconVer ?>">
    <link rel="manifest" href="<?= base_url('site.webmanifest') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>?v=<?= $cssVer ?>">
    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'logo' => (isset($_SERVER['HTTP_HOST']) ? 'https://' . $_SERVER['HTTP_HOST'] : '') . base_url('assets/img/logo-znak-512.png'),
        'name' => SITE['company'],
        'telephone' => SITE['phone'],
        'email' => SITE['email'],
        'address' => SITE['address'],
        'sameAs' => array_values(array_filter([SITE['instagram'], SITE['facebook']])),
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
    </script>
</head>
<body class="page-<?= e($currentPage ?: 'default') ?>">
<a class="skip-link" href="#main">Preskočiť na obsah</a>

<div class="topbar">
    <div class="container topbar__inner">
        <div class="topbar__info">
            <a href="tel:<?= e(SITE['phone_href']) ?>"><?= icon('phone') ?> <?= e(SITE['phone']) ?></a>
            <a href="mailto:<?= e(SITE['email']) ?>"><?= icon('mail') ?> <?= e(SITE['email']) ?></a>
        </div>
        <div class="topbar__meta">
            <span><?= icon('clock') ?> <?= e(SITE['hours']) ?></span>
            <?php if (SITE['instagram']): ?>
                <a href="<?= e(SITE['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram"><?= icon('instagram') ?></a>
            <?php endif; ?>
            <?php if (SITE['facebook']): ?>
                <a href="<?= e(SITE['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook"><?= icon('facebook') ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<header class="header" id="header">
    <div class="container header__inner">
        <a class="logo" href="<?= base_url('index.php') ?>" aria-label="<?= e(SITE['company']) ?> – domov">
            <img src="<?= base_url('assets/img/logo.svg') ?>" alt="<?= e(SITE['name']) ?>" width="198" height="50">
        </a>

        <nav class="nav" id="nav" aria-label="Hlavné menu">
            <ul class="nav__list">
                <li><a class="nav__link<?= is_active('home', $currentPage) ?>" href="<?= base_url('index.php') ?>">Domov</a></li>
                <li class="nav__item--dropdown">
                    <a class="nav__link<?= is_active('sluzby', $currentPage) ?>" href="<?= base_url('sluzby.php') ?>" aria-haspopup="true">
                        Služby <svg class="nav__caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
                    </a>
                    <button class="nav__sub-toggle" type="button" aria-label="Zobraziť služby" aria-expanded="false">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <ul class="nav__dropdown">
                        <?php foreach (SERVICES as $navSlug => $s): ?>
                            <li>
                                <a href="<?= base_url($navSlug . '.php') ?>">
                                    <span class="nav__dropdown-icon"><?= icon($s['icon']) ?></span>
                                    <span><?= e($s['title']) ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><a class="nav__link<?= is_active('servis', $currentPage) ?>" href="<?= base_url('servis.php') ?>">Servis</a></li>
                <li><a class="nav__link<?= is_active('referencie', $currentPage) ?>" href="<?= base_url('referencie.php') ?>">Referencie</a></li>
                <li><a class="nav__link<?= is_active('o-nas', $currentPage) ?>" href="<?= base_url('o-nas.php') ?>">O nás</a></li>
                <li><a class="nav__link<?= is_active('kontakt', $currentPage) ?>" href="<?= base_url('kontakt.php') ?>">Kontakt</a></li>
            </ul>
            <a class="btn btn--primary nav__cta" href="<?= base_url('kontakt.php#formular') ?>">Nezáväzná ponuka</a>
        </nav>

        <button class="burger" id="burger" type="button" aria-label="Otvoriť menu" aria-controls="nav" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<main id="main">
