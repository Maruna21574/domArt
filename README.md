# DOMART servis – web

Web pre **DOMART servis, s.r.o.** – PHP, HTML, SCSS a čistý JavaScript bez databázy. Je pripravený na hosting WebSupport.

## Štruktúra

```
index.php                     Úvod
sluzby.php                    Prehľad služieb
priemyselne-brany.php         ┐
garazove-brany.php            │
rolety-zaluzie-screen.php     ├ Podstránky služieb (spoločná šablóna)
nakladacie-rampy.php          │
bariery-stlpiky.php           ┘
servis.php                    Servis a revízie
referencie.php                Galéria realizácií s filtrom
o-nas.php                     O nás
kontakt.php                   Kontakty + formulár (odosiela e-mail)
ochrana-osobnych-udajov.php   GDPR a cookies
404.php                       Chybová stránka
.htaccess                     Pekné adresy, 404, cache, bezpečnosť

includes/config.php           ← KONTAKTNÉ ÚDAJE A TEXTY SLUŽIEB UPRAVUJTE TU
includes/header.php, footer.php, icons.php, service-template.php, contact-handler.php

assets/scss/                  Zdrojové štýly (SCSS)
assets/css/style.css          Skompilované CSS (to sa nahráva na web)
assets/js/main.js             Menu, animácie, galéria, validácia formulára
assets/img/                   Logo, favicon, fotky
```

## Pred spustením doplňte

Kontakty, adresa, IČO, kontaktné osoby, služby a referencia sú prevzaté z domart.sk a z Obchodného registra SR. Všetko je v `includes/config.php`. Ešte chýba:

- `dic`, `ic_dph`: kým sú prázdne, na webe sa nezobrazia
- `TEAM`: krátke životopisy (a fotky v `assets/img/tim/`)
- `form_from`: e-mail **na doméne webu** (`web@domart.sk`). Schránku si založte vo WebAdmine, inak môžu správy padať do spamu.
- `instagram`: overte, či je správny profil `domart_servis` (starý web odkazuje na `domartservis`)

**Logo:** všetky varianty loga sú vyrobené zo súboru `img/logodomart.png` (znak domčeka s písmenom D):
- `logo.svg`: hlavička (znak + tmavý text),
- `logo-white.svg`: pätička (znak + biely text),
- `logo-mono-white.svg`: celé biele logo na červený podklad,
- `favicon.svg`, `favicon-32.png`, `apple-touch-icon.png`: ikony,
- `logo-znak*.png`: samotný znak s priehľadným pozadím.

## Fotky

Priečinok `img/` obsahuje **originály** (logo, fotky), z ktorých sú vyrobené zmenšené verzie v `assets/img/`. Na hosting ho nahrávať netreba.

- `assets/img/sluzby/`: fotogaléria pri službách, aj ilustračné fotky
- `assets/img/referencie/`: **len vlastné realizácie firmy**, zobrazujú sa na stránke Referencie
- `assets/img/kontakty/`: portréty kontaktných osôb

## Fotky realizácií

- **Referencie:** súbory nahrajte do `assets/img/referencie/`. Ak názov súboru začína skratkou služby (napr. `garazove-brany-01.jpg`, `nakladacie-rampy-sklad.webp`), fotka sa automaticky zaradí do filtra.
- **Podstránky služieb:** súbory nahrajte do `assets/img/sluzby/` ako `<skratka>-1.jpg`, `<skratka>-2.jpg`…

Odporúčaná veľkosť fotky je šírka približne 1600 px, formát JPG alebo WebP a veľkosť do 400 kB.

## Nasadenie na WebSupport

1. Vo WebAdmine nastavte **PHP 8.1 alebo novšie** (Hosting → PHP verzia).
2. Cez FTP alebo Správcu súborov nahrajte obsah priečinka do koreňa webu (`/web`). Nahrať treba všetko okrem `assets/scss`, `package.json` a `README.md`, tie sú voliteľné.
3. Aktivujte SSL (Let's Encrypt) a v `.htaccess` odkomentujte presmerovanie na HTTPS.
4. Otestujte formulár na stránke Kontakt.

## Úprava štýlov

Štýly upravujte v `assets/scss/`, potom ich skompilujte:

```
npm install
npm run build:css
```

Farby sú v `assets/scss/_variables.scss` (`$red: #d7141a`).

## Lokálne spustenie

```
php -S localhost:8000
```
