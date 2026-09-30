<?php
/**
 * DOMART servis – globálna konfigurácia webu.
 * Tu upravte kontaktné údaje, e-mail pre formulár, sociálne siete, služby a tím.
 * Údaje prevzaté z domart.sk a z Obchodného registra SR (09/2026).
 */

declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

const SITE = [
    'name'        => 'DOMART servis',
    'company'     => 'DOMART servis, s.r.o.',
    'tagline'     => 'Bezpečnosťou až k Vám',
    'phone'       => '+421 918 159 774',
    'phone_href'  => '+421918159774',
    'email'       => 'info@domart.sk',
    'form_to'     => 'info@domart.sk',        // kam chodia správy z formulára
    'form_from'   => 'web@domart.sk',         // odosielateľ – e-mail na vašej doméne (založte ho vo WebAdmine)
    'street'      => 'Zlatovská 2190/27',
    'city'        => '911 05 Trenčín-Nové Zlatovce',
    'address'     => 'Zlatovská 2190/27, 911 05 Trenčín-Nové Zlatovce',
    'ico'         => '45 612 731',
    'dic'         => '',                      // TODO: doplniť DIČ (ak prázdne, nezobrazí sa)
    'ic_dph'      => '',                      // TODO: doplniť IČ DPH (ak prázdne, nezobrazí sa)
    'register'    => 'Obchodný register Okresného súdu Trenčín, oddiel Sro, vložka č. 23160/R',
    'founded'     => 2010,
    'hours'       => 'Po – Pi: 7:30 – 15:30',
    'instagram'   => 'https://www.instagram.com/domart_servis/',
    'facebook'    => 'https://www.facebook.com/DOMARTTrencin',
    'map_query'   => 'Zlatovská 2190/27, 911 05 Trenčín',
];

/**
 * Kontaktné osoby – stránka Kontakt.
 * Fotka: assets/img/kontakty/<photo>.jpg (štvorec, cca 480 × 480 px). Bez fotky sa zobrazia iniciály.
 */
const CONTACTS = [
    ['name' => 'Renáta Karlíková', 'role' => 'Cenové ponuky',                  'phone' => '0918 159 774', 'email' => 'karlikova@domart.sk', 'photo' => 'renata-karlikova'],
    ['name' => 'Jozef Máčala',     'role' => 'Technické poradenstvo – obchod', 'phone' => '0918 396 823', 'email' => 'macala@domart.sk',    'photo' => 'jozef-macala'],
    ['name' => 'Anna Bahelková',   'role' => 'Asistentka obchodu',             'phone' => '0918 905 017', 'email' => 'info@domart.sk',      'photo' => 'anna-bahelkova'],
];

/** Služby – z tohto poľa sa generuje menu, karty aj podstránky. */
const SERVICES = [
    'priemyselne-brany' => [
        'title'   => 'Priemyselné brány',
        'short'   => 'Sekčné a rýchlobežné brány pre haly, sklady, autoservisy a výrobné prevádzky.',
        'icon'    => 'industrial',
        'lead'    => 'Brány, ktoré vydržia náročnú, často každodennú a nepretržitú prevádzku. Dbáme predovšetkým na spoľahlivosť, bezpečnosť a dlhú životnosť.',
        'text'    => [
            'Sekčné priemyselné brány sú vďaka variabilite, tepelnoizolačným vlastnostiam, bezpečnosti a výhodným nadobúdacím aj prevádzkovým nákladom najčastejším riešením pre sklady, výrobné haly a autoservisy.',
            'Umožňujú široký výber uhla otvárania a výšky zdvihu krídla. Dodávame, montujeme a servisujeme ich vrátane pravidelných revíznych prehliadok.',
        ],
        'features' => [
            ['Sekčné priemyselné brány', 'Zateplené sekcie, variabilný spôsob otvárania a výška zdvihu podľa priestoru haly.'],
            ['Rýchlobežné brány', 'Pre prevádzky s častým prejazdom – plynulá logistika a menšie úniky tepla.'],
            ['Personálne dvere a presklenie', 'Dvere so štandardným alebo nízkym prahom, okienka, vetracie mriežky či celopresklené hliníkové sekcie.'],
            ['Pohony a automatika', 'Priemyselné pohony, bezpečnostné prvky a ovládanie – aj modernizácia existujúcich brán.'],
        ],
        'benefits' => ['Odborné prehliadky a revízie', 'Servisná zmluva pre firmy', 'Záručný aj pozáručný servis', 'Servis aj brán iných dodávateľov'],
    ],
    'garazove-brany' => [
        'title'   => 'Garážové brány',
        'short'   => 'Sekčné, posuvné, rolovacie a krídlové garážové brány s elektrickým pohonom.',
        'icon'    => 'garage',
        'lead'    => 'Garážová brána, ktorá ladí s vaším domom, dobre izoluje a otvára sa jedným stlačením tlačidla.',
        'text'    => [
            'Pracujeme s overenými značkami, pohony dodávame od výrobcov ako Nice a Cais. Bránu vyberieme podľa priestoru v garáži, spôsobu používania aj vzhľadu fasády.',
        ],
        'features' => [
            ['Sekčné brány', 'Najobľúbenejšie riešenie – hladký alebo reliéfny povrch, farby a imitácie dreva.'],
            ['Posuvné brány PRAKTIK', 'Nevysúvajú sa pod strop, ale vedľa steny. Čiastočné otvorenie nahradí personálne dvere, bez pomocných pružín, 10-ročná záruka na krídlo.'],
            ['Rolovacie brány', 'Hliníkové lamely (krycia výška 77 mm) sa navinú do boxu nad otvorom – bez stavebných úprav, ideálne aj do hotovej garáže.'],
            ['Krídlové brány', 'Dvojkrídlové brány na mieru zo 40 mm sekcií s PUR penou, otváranie dovnútra alebo von až do 180°.'],
        ],
        'benefits' => ['Značkové produkty', 'Montáž podľa technických noriem', 'Elektrické pohony a diaľkové ovládanie', 'Záručný aj pozáručný servis'],
    ],
    'rolety-zaluzie-screen' => [
        'title'   => 'Rolety, žalúzie, screen',
        'short'   => 'Predokenné rolety, vonkajšie a vnútorné žalúzie, screenové rolety a slnolamy.',
        'icon'    => 'blinds',
        'lead'    => 'Tieniaca technika, ktorá chráni pred teplom, svetlom, hlukom aj zvedavými pohľadmi – na mieru pre novostavby aj dodatočnú montáž.',
        'text'    => [
            'Ovládanie je možné ručne, elektromotorom s vypínačom, diaľkovým ovládačom, centrálnym programovaním alebo ako súčasť inteligentnej domácnosti Somfy.',
        ],
        'features' => [
            ['Predokenné rolety', 'S viditeľným boxom, pre zaomietanie, pod preklad alebo ako roletové preklady do novostavieb. Čiastočne plnia aj funkciu mechanickej ochrany.'],
            ['Vonkajšie a vnútorné žalúzie', 'Exteriérové žalúzie plynule regulujú svetlo a najúčinnejšie ovplyvnia teplotu v interiéri. Vnútorné žalúzie rozdelia priestor bez stavebných zásahov.'],
            ['Rolety SCREEN', 'Nehorľavá tkanina (ZIP Serge, Soltis), odolnosť voči vetru až do triedy 6 a až 95 % zadržanie tepelného žiarenia. Box 102 mm, 6 farieb RAL.'],
            ['Slnolamy', 'Pevné alebo pohyblivé lamely na fasády budov – aj s integrovanými fotovoltickými modulmi.'],
        ],
        'benefits' => ['Výroba na mieru', 'Novostavby aj rekonštrukcie', 'Motorizácia a smart ovládanie', 'Servis a opravy'],
    ],
    'nakladacie-rampy' => [
        'title'   => 'Technológia nakladacích rámp',
        'short'   => 'Vyrovnávacie mostíky, tesniace goliere, nárazníky a kompletné nakladacie miesta.',
        'icon'    => 'truck',
        'lead'    => 'Dodávame, montujeme a servisujeme kompletný sortiment nakladacej techniky pre sklady, výrobu a logistické centrá.',
        'text'    => [
            'Všetky zariadenia spĺňajú prísne bezpečnostné normy – ochranné zábrany, automatické riadenie a senzory pomáhajú predchádzať nehodám pri nakladaní a vykladaní. Pre konkrétnu ponuku nás kontaktujte.',
        ],
        'features' => [
            ['Vyrovnávacie mostíky a plošiny', 'Bezpečný a rýchly prechod medzi rampou a ložnou plochou vozidla.'],
            ['Tesniace goliere', 'Pevné aj nafukovacie – chránia pred nepriaznivým počasím a únikom tepla.'],
            ['Navádzače a nárazníky', 'Navádzače pre cúvanie kamiónov a gumové nárazníky chránia budovu aj vozidlá.'],
            ['Kliny, komory a signalizácia', 'Zakladacie kliny so senzormi prítomnosti, predsadené komory nakladacích rámp a komplexný systém signalizácie.'],
        ],
        'benefits' => ['Poradenstvo pri výbere', 'Odborné prehliadky', 'Servisná zmluva', 'Modernizácia rámp'],
    ],
    'bariery-stlpiky' => [
        'title'   => 'Bariéry a stĺpiky',
        'short'   => 'Závory, stĺpiky, turnikety a parkovacie systémy EkoPark II.',
        'icon'    => 'barrier',
        'lead'    => 'Kontrola vjazdu vozidiel a pohybu osôb na parkoviskách, v areáloch a firmách – od jednej závory po kompletný spoplatnený parkovací systém.',
        'text'    => [
            'Parkovací systém EkoPark II patrí medzi najmodernejšie systémy na výber parkovného podľa dĺžky parkovania. Náš vyškolený personál vám ho predstaví priamo na mieste budúcej realizácie alebo na našich realizáciách.',
        ],
        'features' => [
            ['Závory a stĺpiky', 'Automatické závory pre vjazdy a parkoviská, stĺpiky na ochranu priestoru.'],
            ['Parkovacie systémy EkoPark II', 'Vjazdová a výjazdová závora, terminály, automatická pokladňa (mince, bankovky, karty, žetóny) a riadiaci softvér.'],
            ['Turnikety', 'Tripodové, plnorozmerové otočné aj rotačné nízke turnikety, lakované v RAL alebo v antikore. Aj mincové turnikety.'],
            ['Servisná zmluva', 'Bezodkladný zásah servisných technikov, aby parkovisko fungovalo bez prestojov.'],
        ],
        'benefits' => ['Návrh riešenia na mieste', 'Montáž a revízie', 'Pre malé aj veľké parkoviská', 'Servisná podpora'],
    ],
    'vchodove-dvere' => [
        'title'   => 'Vchodové dvere',
        'short'   => 'Bezpečné a energeticky úsporné vchodové dvere vrátane hliníkových.',
        'icon'    => 'door',
        'lead'    => 'Vchodové dvere výrazne prispievajú k bezpečnosti aj vzhľadu domu. Pomôžeme s výberom, namontujeme ich a postaráme sa o údržbu.',
        'text'    => [
            'Odporúčame údržbu vchodových dverí minimálne raz za šesť mesiacov, pri náročných podmienkach každé tri mesiace – kontrolu závesov, zámkov a tesnení, mazanie a obnovu povrchovej úpravy.',
        ],
        'features' => [
            ['Hliníkové vchodové dvere', 'Moderný vzhľad, pevnosť a dlhá životnosť pre rodinné domy aj firmy.'],
            ['Energeticky úsporné dvere', 'Kvalitná izolácia a tesnenie znížia náklady na vykurovanie.'],
            ['Bezpečnosť', 'Kvalitné zámky, kovanie a tesné osadenie proti nevítanému prieniku.'],
            ['Údržba a servis', 'Pravidelné kontroly, mazanie, nastavenie a výmena opotrebovaných dielov.'],
        ],
        'benefits' => ['Poradenstvo pri výbere', 'Odborná montáž', 'Pravidelná údržba', 'Záručný aj pozáručný servis'],
    ],
    'zamocnicka-vyroba' => [
        'title'   => 'Zámočnícka výroba',
        'short'   => 'Brány, ploty, zábradlia, prístrešky a oceľové konštrukcie z vlastnej dielne.',
        'icon'    => 'weld',
        'lead'    => 'Vlastná zámočnícka dielňa a kusová výroba na mieru – podľa vašej predstavy alebo nášho návrhu.',
        'text'    => [
            'Zámočnícka výroba vznikla na základe dopytu našich zákazníkov po kvalitných vstupných bránach. Dnes vyrábame aj pracovné a montážne stoly, jednoúčelové vozíky, vlastný systém stavebnicových deliacich stien pre sklady a haly, požiarne schodiská a rebríky.',
        ],
        'features' => [
            ['Brány a ploty na mieru', 'Posuvné a krídlové vstupné brány, plotové diely a ich automatizácia.'],
            ['Zábradlia', 'Balkónové a schodiskové zábradlia pre rodinné aj bytové domy.'],
            ['Prístrešky a konštrukcie', 'Prístrešky, deliace steny, požiarne schodiská a iné oceľové konštrukcie podľa zadania.'],
            ['Povrchové úpravy', 'Základný a vrchný náter, galvanické a žiarové zinkovanie, práškové lakovanie (komaxit).'],
        ],
        'benefits' => ['Vlastná dielňa', 'Výroba na mieru', 'Montáž aj automatizácia', 'Pre domácnosti aj firmy'],
    ],
    'somfy' => [
        'title'   => 'Somfy – smart domácnosť',
        'short'   => 'Pohony a inteligentné ovládanie roliet, žalúzií, brán a osvetlenia Somfy.',
        'icon'    => 'smart',
        'lead'    => 'Základný kameň inteligentnej, úspornej a bezpečnej domácnosti. Ovládajte rolety, brány aj svetlá z mobilu, tabletu alebo hlasom.',
        'text'    => [
            'Jedným kliknutím pri odchode z domu zatiahnete rolety, vypnete svetlá a zatvoríte bránu. Inteligentné žalúzie samy reagujú na slnko a pomáhajú udržať príjemnú teplotu bez zbytočnej spotreby energie.',
        ],
        'features' => [
            ['Vonkajšie a interiérové tienenie', 'Motorizácia roliet, žalúzií a markíz s automatickými scénami.'],
            ['Brány', 'Pohony a ovládanie garážových a vjazdových brán.'],
            ['Osvetlenie a energie', 'Riadenie svetiel a optimalizácia spotreby energie v domácnosti.'],
            ['Zabezpečenie', 'Senzory pohybu, kamery a alarmy s upozornením do mobilu.'],
        ],
        'benefits' => ['Autorizované produkty Somfy', 'Návrh a nastavenie systému', 'Dodatočná motorizácia', 'Servis a podpora'],
    ],
];

/**
 * Kto stojí za firmou – stránka O nás.
 * Fotka (voliteľná): assets/img/tim/<kľúč>.jpg (napr. roman-dobias.jpg), ideálne štvorec aspoň 600 × 600 px.
 * Bez fotky sa zobrazia iniciály.
 */
const TEAM = [
    'roman-dobias' => [
        'name' => 'Roman Dobiaš',
        'role' => 'Konateľ a spoločník',
        'bio'  => 'Krátky životopis – doplniť.', // TODO: skúsenosti, prax, čomu sa venuje
    ],
    'martin-jarabek' => [
        'name' => 'Martin Jarábek',
        'role' => 'Konateľ a spoločník',
        'bio'  => 'Krátky životopis – doplniť.', // TODO
    ],
];

/** Referencie klientov (skutočné vyjadrenia – nevymýšľať). */
const TESTIMONIALS = [
    [
        'text'   => 'Všetky sekčné a rýchlobežné brány v areáli nášho výrobného závodu LEONI Wiring System Slovakia v Trenčíne nám dodala spoločnosť DOMART servis, s.r.o. S firmou DOMART spolupracujeme už viac ako 15 rokov. Zabezpečujú pre nás kompletný servis vrátane pravidelných revíznych prehliadok.',
        'name'   => 'Miroslav Panák',
        'role'   => 'Facility Management Leader, LEONI Wiring System Slovakia',
    ],
];

/** Pomocná funkcia na bezpečný výpis. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Absolútna cesta k webu (funguje aj v podpriečinku). */
function base_url(string $path = ''): string
{
    $dir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
    return $dir . '/' . ltrim($path, '/');
}

function is_active(string $page, string $current): string
{
    return $page === $current ? ' is-active' : '';
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}
