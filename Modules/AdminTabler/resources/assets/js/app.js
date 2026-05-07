/**
 * AdminTabler — entry JS
 * Imports IDENTIQUES à preview.tabler.io/layout-navbar-overlap.html (mai 2026, v1.4.0).
 *
 * 1. tabler-theme.min.js : doit être chargé EN HAUT du <body> (anti-flash dark mode)
 * 2. tabler.min.js : core JS Tabler (Bootstrap bundle inclus)
 * 3. lucide ESM : initialisé dynamiquement si data-lucide présent (NavigationService legacy)
 */

import "@tabler/core/dist/js/tabler-theme.min.js";
import "@tabler/core/dist/js/tabler.min.js";

// Lucide ESM dynamique (NavigationService legacy data-lucide)
document.addEventListener("DOMContentLoaded", async () => {
    if (document.querySelector("[data-lucide]")) {
        try {
            const { createIcons, icons } = await import("lucide");
            createIcons({ icons });
        } catch (e) {
            console.warn("Lucide indisponible:", e);
        }
    }
});
