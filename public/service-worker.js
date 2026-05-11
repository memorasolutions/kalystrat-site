// Kill-switch — désactivation totale (T67 2026-05-10)
// Si un visiteur a une version cached de l'ancien SW, ce remplacement le neutralise.
self.addEventListener('install', () => {
    self.skipWaiting();
});

self.addEventListener('activate', (event) => {
    event.waitUntil((async () => {
        const cacheNames = await caches.keys();
        await Promise.all(cacheNames.map(name => caches.delete(name)));
        await self.registration.unregister();
        const clients = await self.clients.matchAll({ type: 'window' });
        clients.forEach(client => client.navigate(client.url));
    })());
});

self.addEventListener('fetch', () => {
    // Pas d'interception — requêtes passent au réseau natif.
});
