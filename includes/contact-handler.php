<?php
/**
 * Spracovanie kontaktného formulára.
 * Používa PHP mail() – na WebSupport hostingu funguje bez ďalšieho nastavenia,
 * ak je SITE['form_from'] e-mailová adresa na vašej doméne.
 *
 * Výstup: $form (hodnoty), $errors (chyby polí), $flash (správa po odoslaní).
 */
require_once __DIR__ . '/config.php';

const FORM_TOPICS_EXTRA = [
    'servis' => 'Servis a revízie',
    'ine'    => 'Iné',
];

function form_topics(): array
{
    $topics = [];
    foreach (SERVICES as $slug => $s) {
        $topics[$slug] = $s['title'];
    }
    return $topics + FORM_TOPICS_EXTRA;
}

/** Odstráni zalomenia riadkov – ochrana proti vloženiu hlavičiek do e-mailu. */
function one_line(string $value): string
{
    return trim(preg_replace('/[\r\n\t]+/', ' ', $value));
}

$topics = form_topics();
$form   = ['meno' => '', 'telefon' => '', 'email' => '', 'sluzba' => '', 'sprava' => '', 'suhlas' => false];
$errors = [];
$flash  = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

// Predvýber služby z odkazu ?sluzba=...
if (isset($_GET['sluzba']) && isset($topics[$_GET['sluzba']])) {
    $form['sluzba'] = $_GET['sluzba'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = [
        'meno'    => one_line((string) ($_POST['meno'] ?? '')),
        'telefon' => one_line((string) ($_POST['telefon'] ?? '')),
        'email'   => one_line((string) ($_POST['email'] ?? '')),
        'sluzba'  => (string) ($_POST['sluzba'] ?? ''),
        'sprava'  => trim((string) ($_POST['sprava'] ?? '')),
        'suhlas'  => !empty($_POST['suhlas']),
    ];

    $tokenOk   = hash_equals($_SESSION['csrf'] ?? '', (string) ($_POST['csrf'] ?? ''));
    $isBot     = ($_POST['web'] ?? '') !== '';                                    // honeypot
    $tooFast   = (time() - (int) ($_SESSION['form_time'] ?? 0)) < 3;              // odoslané do 3 s
    $tooOften  = (time() - (int) ($_SESSION['form_sent'] ?? 0)) < 30;             // max. 1 správa / 30 s

    if (!$tokenOk) {
        $errors['_form'] = 'Platnosť formulára vypršala. Obnovte stránku a skúste to znova.';
    } elseif ($tooOften) {
        $errors['_form'] = 'Správu ste práve odoslali. Ďalšiu môžete poslať o chvíľu.';
    }

    if (mb_strlen($form['meno']) < 2)                                  $errors['meno']    = 'Zadajte vaše meno.';
    if (!filter_var($form['email'], FILTER_VALIDATE_EMAIL))           $errors['email']   = 'Zadajte platný e-mail.';
    if ($form['telefon'] !== '' && !preg_match('/^[0-9 +()\/-]{6,20}$/', $form['telefon'])) {
        $errors['telefon'] = 'Zadajte platné telefónne číslo.';
    }
    if (!isset($topics[$form['sluzba']]))                              $errors['sluzba']  = 'Vyberte oblasť.';
    if (mb_strlen($form['sprava']) < 10)                               $errors['sprava']  = 'Napíšte nám aspoň pár slov (min. 10 znakov).';
    if (mb_strlen($form['sprava']) > 5000)                             $errors['sprava']  = 'Správa je príliš dlhá.';
    if (!$form['suhlas'])                                              $errors['suhlas']  = 'Pre odoslanie je potrebný súhlas.';

    if (!$errors) {
        $sent = true;

        // Boty dostanú „úspech“, ale e-mail sa neodošle
        if (!$isBot && !$tooFast) {
            $subject = 'Dopyt z webu: ' . $topics[$form['sluzba']] . ' – ' . $form['meno'];
            $body = "Nová správa z webu " . SITE['name'] . "\n"
                  . str_repeat('-', 40) . "\n"
                  . "Meno:     {$form['meno']}\n"
                  . "E-mail:   {$form['email']}\n"
                  . "Telefón:  " . ($form['telefon'] ?: '—') . "\n"
                  . "Oblasť:   {$topics[$form['sluzba']]}\n"
                  . str_repeat('-', 40) . "\n\n"
                  . $form['sprava'] . "\n\n"
                  . str_repeat('-', 40) . "\n"
                  . 'Odoslané: ' . date('d.m.Y H:i') . ' | IP: ' . ($_SERVER['REMOTE_ADDR'] ?? '?') . "\n";

            $headers = implode("\r\n", [
                'From: ' . '=?UTF-8?B?' . base64_encode(SITE['name'] . ' – web') . '?= <' . SITE['form_from'] . '>',
                'Reply-To: ' . '=?UTF-8?B?' . base64_encode($form['meno']) . '?= <' . $form['email'] . '>',
                'MIME-Version: 1.0',
                'Content-Type: text/plain; charset=UTF-8',
                'Content-Transfer-Encoding: 8bit',
                'X-Mailer: PHP/' . PHP_VERSION,
            ]);

            $sent = @mail(
                SITE['form_to'],
                '=?UTF-8?B?' . base64_encode($subject) . '?=',
                $body,
                $headers,
                '-f' . SITE['form_from']
            );
        }

        if ($sent) {
            $_SESSION['form_sent'] = time();
            $_SESSION['flash'] = ['type' => 'success', 'text' => 'Ďakujeme, vaša správa bola odoslaná. Ozveme sa vám čo najskôr, spravidla do 24 hodín.'];
            header('Location: ' . base_url('kontakt.php') . '#formular', true, 303);
            exit;
        }

        $errors['_form'] = 'Správu sa nepodarilo odoslať. Skúste to prosím neskôr alebo nám zavolajte na ' . SITE['phone'] . '.';
    }
}

$_SESSION['form_time'] = time();
