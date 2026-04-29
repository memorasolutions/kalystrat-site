// P22-S6 — Header Kalystrat 2026 : sticky shrink + offcanvas mobile + dropdown filiales
// Bootstrap 5.0.0-beta1 chargé par Construz n'a PAS Offcanvas → implémentation vanilla.
(function() {
  'use strict';

  // --- 1. Sticky shrink-on-scroll (INP-friendly, passive listener) ---
  const header = document.getElementById('kalystrat-header');
  if (header) {
    const SCROLL_THRESHOLD = 50;
    let ticking = false;
    function updateHeader() {
      header.classList.toggle('scrolled', window.scrollY > SCROLL_THRESHOLD);
      ticking = false;
    }
    window.addEventListener('scroll', function() {
      if (!ticking) {
        requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }, { passive: true });
  }

  // --- 2. Offcanvas mobile drawer (vanilla, Bootstrap-compatible markup) ---
  function openOffcanvas(panel) {
    if (!panel) return;
    panel.classList.add('show');
    panel.setAttribute('aria-hidden', 'false');
    document.body.classList.add('ks-offcanvas-open');
    let backdrop = document.querySelector('.ks-offcanvas-backdrop');
    if (!backdrop) {
      backdrop = document.createElement('div');
      backdrop.className = 'ks-offcanvas-backdrop';
      document.body.appendChild(backdrop);
      backdrop.addEventListener('click', () => closeOffcanvas(panel));
    }
    requestAnimationFrame(() => backdrop.classList.add('show'));
  }
  function closeOffcanvas(panel) {
    if (!panel) return;
    panel.classList.remove('show');
    panel.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('ks-offcanvas-open');
    const backdrop = document.querySelector('.ks-offcanvas-backdrop');
    if (backdrop) {
      backdrop.classList.remove('show');
      setTimeout(() => backdrop.remove(), 300);
    }
  }
  document.querySelectorAll('[data-bs-toggle="offcanvas"]').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const targetSel = this.getAttribute('data-bs-target') || this.getAttribute('href');
      const panel = document.querySelector(targetSel);
      if (panel) openOffcanvas(panel);
    });
  });
  document.querySelectorAll('[data-bs-dismiss="offcanvas"]').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const panel = this.closest('.offcanvas');
      if (panel) closeOffcanvas(panel);
    });
  });
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.offcanvas.show').forEach(closeOffcanvas);
    }
  });

  // --- 3. Dropdown filiales (vanilla fallback, Bootstrap-compatible markup) ---
  document.querySelectorAll('.has-dropdown > .dropdown-toggle').forEach(toggle => {
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      const parent = this.parentElement;
      const wasOpen = parent.classList.contains('show');
      document.querySelectorAll('.has-dropdown.show').forEach(d => {
        d.classList.remove('show');
        d.querySelector('.dropdown-menu')?.classList.remove('show');
        d.querySelector('.dropdown-toggle')?.setAttribute('aria-expanded', 'false');
      });
      if (!wasOpen) {
        parent.classList.add('show');
        parent.querySelector('.dropdown-menu')?.classList.add('show');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.has-dropdown')) {
      document.querySelectorAll('.has-dropdown.show').forEach(d => {
        d.classList.remove('show');
        d.querySelector('.dropdown-menu')?.classList.remove('show');
        d.querySelector('.dropdown-toggle')?.setAttribute('aria-expanded', 'false');
      });
    }
  });

  // --- 4. Mobile collapse (sub-menu filiales dans offcanvas) ---
  document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(toggle => {
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      const targetSel = this.getAttribute('href') || this.getAttribute('data-bs-target');
      const panel = document.querySelector(targetSel);
      if (!panel) return;
      const isOpen = panel.classList.toggle('show');
      this.setAttribute('aria-expanded', String(isOpen));
    });
  });
})();
