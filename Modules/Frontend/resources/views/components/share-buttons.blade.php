@props([
    'title' => '',
    'url' => '',
])

<div class="ks-share">
    <h3 class="ks-share-title">Partager cet article</h3>

    <div class="ks-share-buttons">
        <button
            type="button"
            class="ks-share-btn ks-share-btn--native"
            data-share-native
            data-title="{{ $title }}"
            data-url="{{ $url }}"
            aria-label="Partager via le menu système"
            hidden
        >
            <svg class="ks-share-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/>
            </svg>
            <span>Partager</span>
        </button>

        <a
            href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($url) }}"
            class="ks-share-btn"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Partager sur LinkedIn"
        >
            <svg class="ks-share-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
            </svg>
            <span>LinkedIn</span>
        </a>

        <a
            href="mailto:?subject={{ urlencode($title) }}&body={{ urlencode($url) }}"
            class="ks-share-btn"
            aria-label="Partager par courriel"
        >
            <svg class="ks-share-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            <span>Courriel</span>
        </a>

        <button
            type="button"
            class="ks-share-btn"
            data-share-copy
            data-url="{{ $url }}"
            aria-label="Copier le lien de l'article"
        >
            <svg class="ks-share-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
            </svg>
            <span>Copier</span>
        </button>

        <a
            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
            class="ks-share-btn"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Partager sur Facebook"
        >
            <svg class="ks-share-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12z"/>
            </svg>
            <span>Facebook</span>
        </a>

        <a
            href="https://twitter.com/intent/tweet?text={{ urlencode($title) }}&url={{ urlencode($url) }}"
            class="ks-share-btn"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Partager sur X"
        >
            <svg class="ks-share-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
            </svg>
            <span>X</span>
        </a>
    </div>

    <div class="ks-share-toast" data-share-toast role="status" aria-live="polite" hidden>
        Lien copié
    </div>
</div>

<style>
.ks-share {
    margin: clamp(2em, 4vw, 3em) 0;
    padding-top: clamp(1.5em, 3vw, 2.25em);
    border-top: 1px solid var(--ks-gray-300);
}

.ks-share-title {
    font-family: var(--ks-font-body);
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--ks-navy-900);
    margin: 0 0 1rem;
    letter-spacing: 0.01em;
}

.ks-share-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: center;
}

.ks-share-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    min-height: 44px;
    padding: 10px 16px;
    border: 1px solid var(--ks-gold-500);
    border-radius: 6px;
    background: transparent;
    color: var(--ks-gray-700);
    font-family: var(--ks-font-body);
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease, transform 0.12s ease;
}

.ks-share-btn:hover,
.ks-share-btn:focus-visible {
    background-color: var(--ks-navy-900);
    border-color: var(--ks-navy-900);
    color: var(--ks-white);
}

.ks-share-btn:active {
    transform: translateY(1px);
}

.ks-share-btn:focus-visible {
    outline: 2px solid var(--ks-gold-500);
    outline-offset: 2px;
}

.ks-share-icon {
    width: 18px;
    height: 18px;
    fill: currentColor;
    flex-shrink: 0;
}

.ks-share-toast {
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    background-color: var(--ks-navy-900);
    color: var(--ks-white);
    padding: 0.85rem 1.25rem;
    border-radius: 6px;
    font-family: var(--ks-font-body);
    font-size: 0.9rem;
    font-weight: 500;
    box-shadow: 0 8px 24px -8px rgba(10, 22, 40, 0.35);
    z-index: 9999;
    opacity: 0;
    transform: translateY(8px);
    transition: opacity 0.22s ease, transform 0.22s ease;
}

.ks-share-toast:not([hidden]) {
    opacity: 1;
    transform: translateY(0);
}

@media (max-width: 640px) {
    .ks-share-btn {
        flex: 1 1 calc(50% - 6px);
        padding: 10px 12px;
        font-size: 0.85rem;
    }
}
</style>

<script>
(function(){
  let root = document.currentScript;
  while (root && !(root.classList && root.classList.contains('ks-share'))) {
    root = root.previousElementSibling;
  }
  if (!root) return;
  const copyBtn = root.querySelector('[data-share-copy]');
  if (copyBtn) {
    const copyUrl = copyBtn.dataset.url;
    copyBtn.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(copyUrl);
        const toast = root.querySelector('[data-share-toast]');
        if (toast) {
          toast.hidden = false;
          setTimeout(() => { toast.hidden = true; }, 2200);
        }
      } catch(e) { console.warn('Copy failed', e); }
    });
  }
  const nativeBtn = root.querySelector('[data-share-native]');
  if (nativeBtn && typeof navigator !== 'undefined' && typeof navigator.share === 'function') {
    nativeBtn.hidden = false;
    nativeBtn.addEventListener('click', async () => {
      try {
        await navigator.share({
          title: nativeBtn.dataset.title,
          url: nativeBtn.dataset.url
        });
      } catch(e) { /* user cancelled or unsupported */ }
    });
  }
})();
</script>
