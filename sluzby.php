<?php
$pageTitle   = 'Služby';
$pageDesc    = 'Priemyselné a garážové brány, rolety, žalúzie, screen, nakladacie rampy, bariéry a stĺpiky – predaj, montáž a servis.';
$currentPage = 'sluzby';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Omrvinková navigácia">
            <a href="<?= base_url('index.php') ?>">Domov</a><span>/</span><span aria-current="page">Služby</span>
        </nav>
        <h1>Naše služby</h1>
        <p>Dodávame, montujeme a servisujeme technológie pre bezpečný a pohodlný vstup do budov, hál aj areálov.</p>
    </div>
</section>

<section class="section">
    <div class="container services-rows">
        <?php $i = 0; foreach (SERVICES as $slug => $s):
            $photo = glob(__DIR__ . '/assets/img/sluzby/' . $slug . '-*.{jpg,jpeg,png,webp}', GLOB_BRACE)[0] ?? null; ?>
            <article class="service-row reveal<?= $i++ % 2 ? ' service-row--reverse' : '' ?>" id="<?= e($slug) ?>">
                <a class="service-row__visual<?= $photo ? ' service-row__visual--photo' : '' ?>" href="<?= base_url($slug . '.php') ?>" aria-label="<?= e($s['title']) ?>">
                    <?php if ($photo): ?>
                        <img src="<?= base_url('assets/img/sluzby/' . basename($photo)) ?>" alt="<?= e($s['title']) ?>" loading="lazy">
                        <span class="service-row__badge"><?= icon($s['icon']) ?></span>
                    <?php else: ?>
                        <?= icon($s['icon']) ?>
                    <?php endif; ?>
                </a>
                <div class="service-row__body">
                    <h2><?= e($s['title']) ?></h2>
                    <p class="service-row__lead"><?= e($s['lead']) ?></p>
                    <ul class="check-list check-list--2col">
                        <?php foreach ($s['features'] as [$title]): ?>
                            <li><?= icon('check') ?> <?= e($title) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="btn-group">
                        <a class="btn btn--primary" href="<?= base_url($slug . '.php') ?>">Detail služby <?= icon('arrow') ?></a>
                        <a class="btn btn--outline" href="<?= base_url('kontakt.php?sluzba=' . urlencode($slug) . '#formular') ?>">Dopyt</a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
