/**
 * AdminTabler — entry JS
 * Tabler 1.4 core + Bootstrap 5.3 (bundled by Tabler) + Simplebar + Command Palette
 */

import "@tabler/core/dist/js/tabler.min.js";
import SimpleBar from "simplebar";

document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.querySelector(".navbar-vertical .navbar-nav-scroll");
    if (sidebar && !sidebar.dataset.simplebarInit) {
        new SimpleBar(sidebar, { autoHide: true });
        sidebar.dataset.simplebarInit = "true";
    }
});

class AdminTablerCommandPalette {
    constructor() {
        this.panel = document.querySelector(".admintabler-command-palette");
        if (!this.panel) return;
        this.input = this.panel.querySelector(".admintabler-command-palette__input");
        this.bind();
    }

    bind() {
        document.addEventListener("keydown", (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === "k") {
                e.preventDefault();
                this.toggle();
            }
            if (e.key === "Escape" && this.panel?.dataset.open === "true") {
                this.close();
            }
        });

        this.panel?.addEventListener("click", (e) => {
            if (e.target === this.panel) this.close();
        });
    }

    toggle() {
        this.panel.dataset.open === "true" ? this.close() : this.open();
    }

    open() {
        this.panel.dataset.open = "true";
        this.input?.focus();
    }

    close() {
        this.panel.dataset.open = "false";
    }
}

document.addEventListener("DOMContentLoaded", () => new AdminTablerCommandPalette());

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
