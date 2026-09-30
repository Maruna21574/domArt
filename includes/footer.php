</main>

<section class="cta-band">
    <div class="container cta-band__inner reveal">
        <div>
            <h2>Potrebujete novú bránu alebo rýchly servis?</h2>
            <p>Zavolajte nám alebo pošlite dopyt – ozveme sa vám s ďalším postupom.</p>
        </div>
        <div class="cta-band__actions">
            <a class="btn btn--white" href="tel:<?= e(SITE['phone_href']) ?>"><?= icon('phone') ?> <?= e(SITE['phone']) ?></a>
            <a class="btn btn--outline-white" href="<?= base_url('kontakt.php#formular') ?>">Napísať dopyt</a>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__col footer__about">
            <img src="<?= base_url('assets/img/logo-white.svg') ?>" alt="<?= e(SITE['name']) ?>" width="198" height="50">
            <p>Bezpečnosťou až k Vám. Predaj, montáž a servis bránovej, nakladacej a tieniacej techniky a vstupných systémov od roku <?= SITE['founded'] ?>.</p>
            <div class="footer__social">
                <?php if (SITE['instagram']): ?>
                    <a href="<?= e(SITE['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram"><?= icon('instagram') ?></a>
                <?php endif; ?>
                <?php if (SITE['facebook']): ?>
                    <a href="<?= e(SITE['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook"><?= icon('facebook') ?></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer__col">
            <h3>Služby</h3>
            <ul>
                <?php foreach (SERVICES as $navSlug => $s): ?>
                    <li><a href="<?= base_url($navSlug . '.php') ?>"><?= e($s['title']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="footer__col">
            <h3>Firma</h3>
            <ul>
                <li><a href="<?= base_url('o-nas.php') ?>">O nás</a></li>
                <li><a href="<?= base_url('servis.php') ?>">Servis a revízie</a></li>
                <li><a href="<?= base_url('referencie.php') ?>">Referencie</a></li>
                <li><a href="<?= base_url('kontakt.php') ?>">Kontakt</a></li>
                <li><a href="<?= base_url('ochrana-osobnych-udajov.php') ?>">Ochrana osobných údajov</a></li>
            </ul>
        </div>

        <div class="footer__col">
            <h3>Kontakt</h3>
            <ul class="footer__contact">
                <li><?= icon('pin') ?> <span><?= e(SITE['company']) ?><br><?= e(SITE['street']) ?><br><?= e(SITE['city']) ?></span></li>
                <li><?= icon('phone') ?> <a href="tel:<?= e(SITE['phone_href']) ?>"><?= e(SITE['phone']) ?></a></li>
                <li><?= icon('mail') ?> <a href="mailto:<?= e(SITE['email']) ?>"><?= e(SITE['email']) ?></a></li>
                <li><?= icon('clock') ?> <span><?= e(SITE['hours']) ?></span></li>
            </ul>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container footer__bottom-inner">
            <span>&copy; <?= date('Y') ?> <?= e(SITE['company']) ?> · IČO: <?= e(SITE['ico']) ?><?= SITE['dic'] ? ' · DIČ: ' . e(SITE['dic']) : '' ?><?= SITE['ic_dph'] ? ' · IČ DPH: ' . e(SITE['ic_dph']) : '' ?></span>
            <span>Všetky práva vyhradené.</span>
        </div>
    </div>
</footer>

<button class="to-top" id="toTop" type="button" aria-label="Späť hore"><?= icon('up') ?></button>

<div class="cookie" id="cookie" hidden>
    <p>Tento web používa iba nevyhnutné cookies na správne fungovanie. <a href="<?= base_url('ochrana-osobnych-udajov.php') ?>">Viac informácií</a></p>
    <button class="btn btn--primary btn--sm" id="cookieOk" type="button">Rozumiem</button>
</div>

<script src="<?= base_url('assets/js/main.js') ?>?v=<?= @filemtime(__DIR__ . '/../assets/js/main.js') ?: 1 ?>" defer></script>
</body>
</html>
