<?php
require_once __DIR__ . '/includes/config.php';
http_response_code(404);

$pageTitle   = 'Stránka sa nenašla';
$currentPage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="container not-found">
    <span class="not-found__code">404</span>
    <h1>Táto stránka neexistuje</h1>
    <p>Stránku, ktorú hľadáte, sme nenašli. Možno bola presunutá alebo je v adrese preklep.</p>
    <div class="btn-group">
        <a class="btn btn--primary" href="<?= base_url('index.php') ?>">Späť na úvod <?= icon('arrow') ?></a>
        <a class="btn btn--outline" href="<?= base_url('kontakt.php') ?>">Kontakt</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
