/**
 * DOMART servis – hlavný skript
 * Bez závislostí, funguje vo všetkých moderných prehliadačoch.
 */
(function () {
    'use strict';

    document.documentElement.classList.add('js');

    var body   = document.body;
    var header = document.getElementById('header');
    var burger = document.getElementById('burger');
    var nav    = document.getElementById('nav');
    var toTop  = document.getElementById('toTop');

    // ---- Hlavička pri scrollovaní + tlačidlo hore ------------------------------
    function onScroll() {
        var y = window.scrollY || window.pageYOffset;
        if (header) header.classList.toggle('is-scrolled', y > 10);
        if (toTop) toTop.classList.toggle('is-visible', y > 600);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    if (toTop) {
        toTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ---- Mobilné menu ----------------------------------------------------------
    function setMenu(open) {
        body.classList.toggle('nav-open', open);
        burger.setAttribute('aria-expanded', String(open));
        burger.setAttribute('aria-label', open ? 'Zavrieť menu' : 'Otvoriť menu');
    }

    if (burger && nav) {
        burger.addEventListener('click', function () {
            setMenu(!body.classList.contains('nav-open'));
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && body.classList.contains('nav-open')) {
                setMenu(false);
                burger.focus();
            }
        });

        // Po prechode na desktop menu zavrieť
        window.matchMedia('(min-width: 1060px)').addEventListener('change', function (mq) {
            if (mq.matches) setMenu(false);
        });

        // Klik na kotvu v menu zavrie menu
        nav.addEventListener('click', function (e) {
            if (e.target.closest('a')) setMenu(false);
        });
    }

    // Rozbalenie podmenu služieb na mobile
    document.querySelectorAll('.nav__sub-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var list = btn.parentElement.querySelector('.nav__dropdown');
            var open = btn.getAttribute('aria-expanded') !== 'true';
            btn.setAttribute('aria-expanded', String(open));
            list.classList.toggle('is-open', open);
        });
    });

    // ---- Animácie pri scrollovaní + počítadlá ---------------------------------
    var reveals  = document.querySelectorAll('.reveal');
    var counters = document.querySelectorAll('[data-count]');
    var reduced  = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function animateCount(el) {
        var target = parseInt(el.getAttribute('data-count'), 10);
        var suffix = el.getAttribute('data-suffix') || '';
        var start  = null;
        var dur    = 1400;

        function step(ts) {
            if (!start) start = ts;
            var p = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(target * eased) + suffix;
            if (p < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }

    if ('IntersectionObserver' in window && !reduced) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        reveals.forEach(function (el, i) {
            // jemné odstupňovanie prvkov v jednej mriežke
            el.style.transitionDelay = (i % 4) * 70 + 'ms';
            io.observe(el);
        });

        var co = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                animateCount(entry.target);
                co.unobserve(entry.target);
            });
        }, { threshold: 0.6 });

        counters.forEach(function (el) { co.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('is-visible'); });
    }

    // ---- Filter galérie (Referencie) ------------------------------------------
    document.querySelectorAll('[data-filter-group]').forEach(function (group) {
        var buttons = group.querySelectorAll('[data-filter]');
        var items   = document.querySelectorAll(group.getAttribute('data-filter-group'));

        buttons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var f = btn.getAttribute('data-filter');
                buttons.forEach(function (b) {
                    b.classList.toggle('is-active', b === btn);
                    b.setAttribute('aria-pressed', String(b === btn));
                });
                items.forEach(function (item) {
                    var show = f === '*' || item.getAttribute('data-category') === f;
                    item.classList.toggle('is-hidden', !show);
                });
            });
        });
    });

    // ---- Lightbox -------------------------------------------------------------
    var links = Array.prototype.slice.call(document.querySelectorAll('[data-lightbox]'));
    if (links.length) {
        var lb = document.createElement('div');
        lb.className = 'lightbox';
        lb.hidden = true;
        lb.setAttribute('role', 'dialog');
        lb.setAttribute('aria-modal', 'true');
        lb.setAttribute('aria-label', 'Galéria');
        lb.innerHTML =
            '<button class="lightbox__close" type="button" aria-label="Zavrieť">&times;</button>' +
            '<button class="lightbox__prev" type="button" aria-label="Predchádzajúca">&lsaquo;</button>' +
            '<img alt="">' +
            '<button class="lightbox__next" type="button" aria-label="Ďalšia">&rsaquo;</button>';
        body.appendChild(lb);

        var img = lb.querySelector('img');
        var current = 0;

        function visibleLinks() {
            return links.filter(function (l) { return !l.classList.contains('is-hidden'); });
        }

        function show(i) {
            var list = visibleLinks();
            if (!list.length) return;
            current = (i + list.length) % list.length;
            img.src = list[current].getAttribute('href');
            img.alt = (list[current].querySelector('img') || {}).alt || '';
        }

        function close() {
            lb.hidden = true;
            body.style.overflow = '';
        }

        links.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                show(visibleLinks().indexOf(link));
                lb.hidden = false;
                body.style.overflow = 'hidden';
                lb.querySelector('.lightbox__close').focus();
            });
        });

        lb.querySelector('.lightbox__close').addEventListener('click', close);
        lb.querySelector('.lightbox__prev').addEventListener('click', function () { show(current - 1); });
        lb.querySelector('.lightbox__next').addEventListener('click', function () { show(current + 1); });
        lb.addEventListener('click', function (e) { if (e.target === lb) close(); });

        document.addEventListener('keydown', function (e) {
            if (lb.hidden) return;
            if (e.key === 'Escape') close();
            if (e.key === 'ArrowLeft') show(current - 1);
            if (e.key === 'ArrowRight') show(current + 1);
        });
    }

    // ---- Kontaktný formulár – validácia v prehliadači -------------------------
    var form = document.getElementById('contactForm');
    if (form) {
        var messages = {
            valueMissing: 'Toto pole je povinné.',
            typeMismatch: 'Zadajte platný e-mail.',
            tooShort: 'Text je príliš krátky.',
            patternMismatch: 'Zadajte platné telefónne číslo.'
        };

        function fieldError(input) {
            var v = input.validity;
            if (v.valid) return '';
            if (input.type === 'checkbox' && v.valueMissing) return 'Pre odoslanie je potrebný súhlas.';
            for (var key in messages) {
                if (v[key]) return messages[key];
            }
            return 'Skontrolujte toto pole.';
        }

        function renderError(input) {
            var wrap = input.closest('.field');
            if (!wrap) return true;
            var msg = fieldError(input);
            var el = wrap.querySelector('.field__error');
            if (!el) {
                el = document.createElement('span');
                el.className = 'field__error';
                el.id = input.id + '-error';
                wrap.appendChild(el);
            }
            el.textContent = msg;
            wrap.classList.toggle('has-error', !!msg);
            if (msg) input.setAttribute('aria-describedby', el.id); else input.removeAttribute('aria-describedby');
            return !msg;
        }

        form.setAttribute('novalidate', '');
        var inputs = form.querySelectorAll('input:not([type=hidden]):not([tabindex="-1"]), select, textarea');

        inputs.forEach(function (input) {
            input.addEventListener('blur', function () { renderError(input); });
            input.addEventListener('input', function () {
                if (input.closest('.field.has-error')) renderError(input);
            });
            input.addEventListener('change', function () {
                if (input.closest('.field.has-error')) renderError(input);
            });
        });

        form.addEventListener('submit', function (e) {
            var firstInvalid = null;
            inputs.forEach(function (input) {
                if (!renderError(input) && !firstInvalid) firstInvalid = input;
            });
            if (firstInvalid) {
                e.preventDefault();
                firstInvalid.focus();
                return;
            }
            var btn = form.querySelector('[type=submit]');
            if (btn) {
                btn.disabled = true;
                btn.textContent = 'Odosielam…';
            }
        });
    }

    // ---- Cookie lišta ---------------------------------------------------------
    var cookie = document.getElementById('cookie');
    var cookieOk = document.getElementById('cookieOk');
    var accepted = false;
    try { accepted = localStorage.getItem('domart_cookie') === '1'; } catch (e) { /* súkromný režim */ }

    if (cookie && !accepted) {
        cookie.hidden = false;
        cookieOk.addEventListener('click', function () {
            try { localStorage.setItem('domart_cookie', '1'); } catch (e) { /* nič */ }
            cookie.hidden = true;
        });
    }
})();
