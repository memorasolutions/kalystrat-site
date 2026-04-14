# Audit navigation admin — 2026-04-06

> MEMORA solutions — Audit Playwright 3 breakpoints + tendances 2026

## 1. Desktop (1920x1080)

- Sidebar fixe 240px, fond dark (#111827)
- 8 sections : Accueil(2), Contenu(10), Marketing(3), Commerce(3+enfants), Equipe(4), Configuration(9), Systeme(8), Outils(2+enfants)
- **67 items visibles**, 2 niveaux max
- Items avec enfants : Boutique(4), SaaS(2), Reservations(2), IA(3), Roadmap(1)
- Header : logo, hamburger, search, dark mode, langue FR, aide Cmd+K, notifications, avatar
- Breadcrumbs : oui (BreadcrumbService auto, 70+ labels)
- Active state : blanc bold
- Touch targets : min-height 48px (WCAG AA)
- Icones : Lucide 18x18px

## 2. Tablet (768x1024)

- Sidebar cachee, hamburger haut droite
- Contenu responsive 2 colonnes
- Bottom bar : visible (d-lg-none, < 992px)
- Search bar visible dans header

## 3. Mobile (375x812)

- Sidebar cachee, hamburger haut droite
- Bottom bar : 5 items (Accueil, Contenu, Equipe, Config, Plus) — icones + labels
- Contenu single column
- Search bar cachee (accessible via Cmd+K)

## 4. Bugs corriges

| Bug | Cause | Fix | Commit |
|-----|-------|-----|--------|
| Sous-menus inaccessibles | `perfect-scrollbar.css` met `overflow: hidden` | `.sidebar .sidebar-body.ps { overflow-y: auto !important }` | 538efa6 |
| Splash screen persiste | JS Vite non compile en dev | A corriger (npm run build) | Ouvert |

## 5. Scores tendances 2026

| Pattern | Score | Statut | Note |
|---------|-------|--------|------|
| Collapsible sidebar | 98/100 | EN PLACE | NobleUI natif |
| Accessibility 48px | 96/100 | EN PLACE | min-height 48px CSS |
| Mobile drawer + bottom bar | 95/100 | EN PLACE | 5 items Priority+ |
| Performance lazy/skeleton | 94/100 | **MANQUANT** | Splash screen bloque |
| Command palette Cmd+K | 92/100 | EN PLACE | Livewire fuzzy search |
| Badges notifications nav | 91/100 | **MANQUANT** | A ajouter |
| Pinned/Favorites | 90/100 | **MANQUANT** | A ajouter |
| Breadcrumbs contextuel | 88/100 | EN PLACE | BreadcrumbService auto |
| Dark mode nav | 85/100 | EN PLACE | NobleUI toggle |
| AI suggestions | 82/100 | FUTUR | Pas prioritaire |

## 6. Recommandations (par priorite)

1. **Fix splash screen** — ne se cache pas sans JS Vite compile (npm run build requis)
2. **Badges count dans nav** — tickets ouverts (IA), commandes (Ecommerce), jobs echoues (Systeme)
3. **Section favoris/recents** — items pinnables par user dans sidebar top
4. **Skeleton loaders** — sidebar sections lazy-loaded
5. **Navigation DB-driven** — FAIT (table navigation_items + NavigationService fallback config)

## 7. Metriques cles

| Metrique | Valeur | Cible 2026 |
|----------|--------|------------|
| Items sidebar | 67 | 7+/-2 par niveau |
| Niveaux max | 2 | 2 max |
| Touch target min | 48px | >= 48px |
| Bottom bar items | 5 | 3-5 |
| Clics vers top feature | 1-2 | <= 2 |
| ARIA labels | Oui | Obligatoire |
| Dark mode | Oui | Obligatoire |
| Cmd+K palette | Oui | Standard 2026 |

---
**Auteur** : MEMORA solutions — [memora.solutions](https://memora.solutions) — info@memora.ca
