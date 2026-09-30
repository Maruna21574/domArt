<?php
require __DIR__ . '/includes/contact-handler.php';

$pageTitle   = 'Kontakt';
$pageDesc    = 'Kontaktujte DOMART servis – nezáväzná cenová ponuka, bezplatné zameranie a rýchly servis brán, roliet, rámp a závor.';
$currentPage = 'kontakt';
require __DIR__ . '/includes/header.php';

/** Vypíše triedu a chybovú hlášku pre pole formulára. */
function field_state(array $errors, string $name): array
{
    return isset($errors[$name])
        ? [' has-error', '<span class="field__error" id="' . $name . '-error">' . e($errors[$name]) . '</span>', ' aria-invalid="true" aria-describedby="' . $name . '-error"']
        : ['', '', ''];
}
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Omrvinková navigácia">
            <a href="<?= base_url('index.php') ?>">Domov</a><span>/</span><span aria-current="page">Kontakt</span>
        </nav>
        <h1>Kontakt</h1>
        <p>Napíšte nám alebo zavolajte, čo potrebujete. Pripravíme vám nezáväznú cenovú ponuku a poradíme s výberom.</p>
    </div>
</section>

<section class="section section--light">
    <div class="container">
        <div class="section__head reveal">
            <span class="eyebrow">Kontaktné osoby</span>
            <h2>S kým budete v kontakte</h2>
        </div>
        <div class="contact-people">
            <?php foreach (CONTACTS as $c):
                $photo = is_file(__DIR__ . '/assets/img/kontakty/' . $c['photo'] . '.jpg') ? 'assets/img/kontakty/' . $c['photo'] . '.jpg' : null;
                $initials = implode('', array_map(fn($w) => mb_substr($w, 0, 1), explode(' ', $c['name'])));
            ?>
                <article class="person-contact reveal">
                    <div class="person-contact__photo">
                        <?php if ($photo): ?>
                            <img src="<?= base_url($photo) ?>" alt="<?= e($c['name']) ?>" width="480" height="480" loading="lazy">
                        <?php else: ?>
                            <span aria-hidden="true"><?= e($initials) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="person-contact__body">
                        <h3><?= e($c['name']) ?></h3>
                        <span class="person-contact__role"><?= e($c['role']) ?></span>
                        <a href="tel:+421<?= e(ltrim(str_replace(' ', '', $c['phone']), '0')) ?>"><?= icon('phone') ?> <?= e($c['phone']) ?></a>
                        <a href="mailto:<?= e($c['email']) ?>"><?= icon('mail') ?> <?= e($c['email']) ?></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container contact-layout">
        <div>
            <div class="contact-cards">
                <a class="contact-card reveal" href="tel:<?= e(SITE['phone_href']) ?>">
                    <span class="contact-card__icon"><?= icon('phone') ?></span>
                    <span><small>Telefón</small><strong><?= e(SITE['phone']) ?></strong></span>
                </a>
                <a class="contact-card reveal" href="mailto:<?= e(SITE['email']) ?>">
                    <span class="contact-card__icon"><?= icon('mail') ?></span>
                    <span><small>E-mail</small><strong><?= e(SITE['email']) ?></strong></span>
                </a>
                <div class="contact-card reveal">
                    <span class="contact-card__icon"><?= icon('pin') ?></span>
                    <span><small>Sídlo</small><strong><?= e(SITE['company']) ?></strong><?= e(SITE['street']) ?>, <?= e(SITE['city']) ?></span>
                </div>
                <div class="contact-card reveal">
                    <span class="contact-card__icon"><?= icon('clock') ?></span>
                    <span><small>Pracovná doba</small><strong><?= e(SITE['hours']) ?></strong>Servis po dohode aj mimo pracovného času</span>
                </div>
                <?php if (SITE['instagram']): ?>
                    <a class="contact-card reveal" href="<?= e(SITE['instagram']) ?>" target="_blank" rel="noopener">
                        <span class="contact-card__icon"><?= icon('instagram') ?></span>
                        <span><small>Instagram</small><strong>@domart_servis</strong></span>
                    </a>
                <?php endif; ?>
                <?php if (SITE['facebook']): ?>
                    <a class="contact-card reveal" href="<?= e(SITE['facebook']) ?>" target="_blank" rel="noopener">
                        <span class="contact-card__icon"><?= icon('facebook') ?></span>
                        <span><small>Facebook</small><strong>DOMART Trenčín</strong></span>
                    </a>
                <?php endif; ?>
                <div class="contact-card reveal">
                    <span class="contact-card__icon"><?= icon('shield') ?></span>
                    <span><small>Fakturačné údaje</small><strong>IČO: <?= e(SITE['ico']) ?></strong><?= SITE['dic'] ? 'DIČ: ' . e(SITE['dic']) : '' ?><?= SITE['ic_dph'] ? '<br>IČ DPH: ' . e(SITE['ic_dph']) : '' ?></span>
                </div>
            </div>
        </div>

        <div class="form-card reveal" id="formular">
            <h2>Nezáväzný dopyt</h2>
            <p>Vyplňte formulár a ozveme sa vám s ďalším postupom.</p>

            <?php if ($flash): ?>
                <div class="alert alert--<?= e($flash['type']) ?>" role="status"><?= icon('check') ?> <span><?= e($flash['text']) ?></span></div>
            <?php endif; ?>
            <?php if (isset($errors['_form'])): ?>
                <div class="alert alert--error" role="alert"><span><?= e($errors['_form']) ?></span></div>
            <?php elseif ($errors): ?>
                <div class="alert alert--error" role="alert"><span>Skontrolujte prosím zvýraznené polia.</span></div>
            <?php endif; ?>

            <form class="form" id="contactForm" method="post" action="<?= base_url('kontakt.php') ?>#formular">
                <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                <div class="form__hp" aria-hidden="true">
                    <label for="web">Nevypĺňajte</label>
                    <input type="text" name="web" id="web" tabindex="-1" autocomplete="off">
                </div>

                <div class="form__row">
                    <?php [$c, $m, $a] = field_state($errors, 'meno'); ?>
                    <div class="field<?= $c ?>">
                        <label for="meno">Meno a priezvisko / firma <span class="req">*</span></label>
                        <input type="text" id="meno" name="meno" value="<?= e($form['meno']) ?>" required minlength="2" autocomplete="name"<?= $a ?>>
                        <?= $m ?>
                    </div>
                    <?php [$c, $m, $a] = field_state($errors, 'telefon'); ?>
                    <div class="field<?= $c ?>">
                        <label for="telefon">Telefón</label>
                        <input type="tel" id="telefon" name="telefon" value="<?= e($form['telefon']) ?>" pattern="[0-9 +\(\)\/\-]{6,20}" autocomplete="tel" inputmode="tel"<?= $a ?>>
                        <?= $m ?>
                    </div>
                </div>

                <div class="form__row">
                    <?php [$c, $m, $a] = field_state($errors, 'email'); ?>
                    <div class="field<?= $c ?>">
                        <label for="email">E-mail <span class="req">*</span></label>
                        <input type="email" id="email" name="email" value="<?= e($form['email']) ?>" required autocomplete="email"<?= $a ?>>
                        <?= $m ?>
                    </div>
                    <?php [$c, $m, $a] = field_state($errors, 'sluzba'); ?>
                    <div class="field<?= $c ?>">
                        <label for="sluzba">Oblasť <span class="req">*</span></label>
                        <select id="sluzba" name="sluzba" required<?= $a ?>>
                            <option value="">Vyberte…</option>
                            <?php foreach ($topics as $value => $label): ?>
                                <option value="<?= e($value) ?>"<?= $form['sluzba'] === $value ? ' selected' : '' ?>><?= e($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= $m ?>
                    </div>
                </div>

                <?php [$c, $m, $a] = field_state($errors, 'sprava'); ?>
                <div class="field<?= $c ?>">
                    <label for="sprava">Správa <span class="req">*</span></label>
                    <textarea id="sprava" name="sprava" required minlength="10" maxlength="5000" placeholder="Napr. rozmery otvoru, lokalita, typ brány alebo popis poruchy…"<?= $a ?>><?= e($form['sprava']) ?></textarea>
                    <?= $m ?>
                </div>

                <?php [$c, $m, $a] = field_state($errors, 'suhlas'); ?>
                <div class="field field--check<?= $c ?>">
                    <input type="checkbox" id="suhlas" name="suhlas" value="1" required<?= $form['suhlas'] ? ' checked' : '' ?><?= $a ?>>
                    <label for="suhlas">Súhlasím so spracovaním osobných údajov za účelom vybavenia dopytu podľa <a href="<?= base_url('ochrana-osobnych-udajov.php') ?>" target="_blank">zásad ochrany osobných údajov</a>. <span class="req">*</span></label>
                    <?= $m ?>
                </div>

                <button class="btn btn--primary btn--lg btn--block" type="submit">Odoslať dopyt <?= icon('arrow') ?></button>
                <p class="form__note">Polia označené <span class="text-red">*</span> sú povinné.</p>
            </form>
        </div>
    </div>
</section>

<iframe class="map" title="Mapa – <?= e(SITE['company']) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps?q=<?= urlencode(SITE['map_query']) ?>&amp;z=<?= SITE['map_query'] === 'Slovensko' ? 7 : 14 ?>&amp;output=embed"></iframe>

<?php require __DIR__ . '/includes/footer.php'; ?>
