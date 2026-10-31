/* ==========================================================================
   animations.js — AOS scroll animations + Lenis smooth scrolling
   Load AFTER aos.js, lenis.js and your existing main.js.
   Animations are attached from here, so the HTML markup stays untouched.
   ========================================================================== */
(function () {
  'use strict';

  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var small = window.innerWidth < 768;

  function all(sel) { return Array.prototype.slice.call(document.querySelectorAll(sel)); }

  /* Tag elements with AOS attributes.
     opts: delay (ms), stagger (ms per item), cycle (restart stagger every n items), duration (ms) */
  function tag(sel, anim, opts) {
    opts = opts || {};
    if (small) anim = anim.replace(/fade-(left|right)/, 'fade-up'); // avoid sideways overflow on phones
    all(sel).forEach(function (el, i) {
      if (el.hasAttribute('data-aos')) return;
      // Same delay and duration for every element: no per-element overrides
      el.setAttribute('data-aos', anim);
    });
  }

  /* ---------- 1. AOS ---------- */
  if (window.AOS && !reduce) {
    // Hero
    tag('.hero-tools li', 'zoom-in', { stagger: 80 });
    tag('.hero-title', 'fade-up', { duration: 900 });
    tag('.hero-text', 'fade-up', { delay: 150 });
    tag('.hero .myimg', 'fade-left', { duration: 1100, delay: 200 });

    // I am proud what I've build
    tag('.proud-title', 'fade-right');
    tag('.proud-lorem', 'fade-left', { delay: 100 });
    tag('.proud-cell', 'zoom-in-up', { stagger: 100, cycle: 3 });

    // Portfolio cover collage
    tag('.cover-title', 'fade-up', { duration: 1000 });
    tag('.cover-cap', 'fade-up', { delay: 200, stagger: 150 });
    tag('.cover .crop', 'zoom-in', { delay: 250, stagger: 150, duration: 900 });

    // Work sections
    tag('.work-title', 'fade-up');
    tag('.case-card', 'zoom-in-up', { stagger: 100, cycle: 3 });

    // Tools
    tag('.tools-title', 'fade-up', { duration: 900 });
    tag('.tool-figma-3d', 'zoom-in', { delay: 200 });
    tag('.tool-label', 'fade-up', { stagger: 100 });
    tag('.tool-icon, .tool-icon-m', 'zoom-in', { stagger: 100 });

    // Benefits
    tag('.benefits-title', 'fade-up');
    tag('.benefit-card', 'fade-up', { stagger: 150, cycle: 3 });

    // Reviews
    tag('.reviews-title', 'fade-right');
    tag('.review', 'fade-up', { stagger: 100, cycle: 3 });

    // Stats
    tag('.stats-title', 'fade-right');
    tag('.stats-lead', 'fade-left', { delay: 100 });
    tag('.stat', 'fade-up', { stagger: 150, cycle: 3 });

    // Pro services
    tag('.services-title', 'fade-up');
    tag('.services-lead', 'fade-up', { delay: 100 });
    tag('.feature-list li', 'fade-up', { delay: 150, stagger: 100 });
    tag('.view-btn', 'fade-up', { delay: 300 });
    tag('.service-card', 'fade-left', { stagger: 100, cycle: 5 });

    // Contact / footer
    tag('.contact-title', 'fade-up');
    tag('.contact-mail', 'fade-up', { delay: 100 });
    tag('.contact-note', 'fade-up', { delay: 200 });
    tag('.contact-card', 'zoom-in', { delay: 150 });

    // Case-study pages (no-op elsewhere)
    tag('.cs-hero', 'fade-up');
    tag('.cs-shot', 'fade-up');
    tag('.cs-h2', 'fade-up');
    tag('.cs-copy', 'fade-up', { delay: 100 });
    tag('.comingsoon', 'fade-up');

    AOS.init({
      duration: 800, // same for every element
      delay: 0,      // same for every element
      easing: 'ease-out-cubic',
      once: false,   // replay every time the element re-enters the viewport
      mirror: true,  // also animate out when scrolled past (works scrolling up and down)
      offset: small ? 40 : 90,
      delay: 0,
      anchorPlacement: 'top-bottom'
    });

    // Once an element has finished animating, give its own hover transitions back
    document.addEventListener('transitionend', function (e) {
      var el = e.target;
      if (el.hasAttribute && el.hasAttribute('data-aos') && el.classList.contains('aos-animate') &&
          (e.propertyName === 'opacity' || e.propertyName === 'transform')) {
        el.classList.add('aos-done');
      }
    });

    // Reset the hover-speed override whenever an element re-animates
    ['aos:in', 'aos:out'].forEach(function (evt) {
      document.addEventListener(evt, function (e) {
        if (e.detail && e.detail.classList) e.detail.classList.remove('aos-done');
      });
    });

    // Recalculate positions once images/fonts have loaded
    window.addEventListener('load', function () { AOS.refreshHard(); });
  }

  /* ---------- 2. Smooth scrolling (Lenis, falls back to CSS smooth-scroll) ---------- */
  var lenis = null;
  if (window.Lenis && !reduce) {
    lenis = new Lenis({ lerp: 0.1, smoothWheel: true });
    (function raf(time) { lenis.raf(time); requestAnimationFrame(raf); })(performance.now());
  }

  // In-page anchor links (skips empty "#" placeholders)
  document.addEventListener('click', function (e) {
    var a = e.target.closest && e.target.closest('a[href^="#"]');
    if (!a) return;
    var hash = a.getAttribute('href');
    if (!hash || hash.length < 2) return;
    var target;
    try { target = document.querySelector(hash); } catch (err) { return; }
    if (!target) return;
    e.preventDefault();
    if (lenis) lenis.scrollTo(target, { duration: 1.3 });
    else target.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
  });
})();