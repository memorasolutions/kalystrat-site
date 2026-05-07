/**
 * AdminTabler — entry JS
 * Tabler 1.4 core + Bootstrap 5.3 (bundled) + Lucide icons init + Dark mode toggle
 */

import "@tabler/core/dist/js/tabler.min.js";

/* ========================================================================
   Dark mode (Tabler natif data-bs-theme)
   ======================================================================== */
function initDarkMode() {
    const stored = localStorage.getItem("admintabler-theme");
    const prefers = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
    document.documentElement.setAttribute("data-bs-theme", stored || prefers);
}
initDarkMode();

window.AdminTablerToggleDarkMode = () => {
    const current = document.documentElement.getAttribute("data-bs-theme") || "light";
    const next = current === "light" ? "dark" : "light";
    document.documentElement.setAttribute("data-bs-theme", next);
    localStorage.setItem("admintabler-theme", next);
};

/* ========================================================================
   Lucide icons init (data-lucide attributes — utilisé par NavigationService legacy)
   Chargement dynamique seulement si attributes présents
   ======================================================================== */
document.addEventListener("DOMContentLoaded", async () => {
    if (document.querySelector("[data-lucide]")) {
        try {
            const { createIcons, icons } = await import("lucide");
            createIcons({ icons });
        } catch (e) {
            console.warn("Lucide icons indisponibles:", e);
        }
    }
});
