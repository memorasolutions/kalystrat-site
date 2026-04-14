---
name: Session API P1 — HasApiResponse + tests + standardisation
description: Fix HasApiResponse pour ResourceCollections, 19 tests API (FAQ/Teams/Testimonials), 3 controllers standardisés
type: project
---

## Session API P1 — 2026-04-03

### Changements

1. **HasApiResponse.php** — support natif `JsonResource` (ResourceCollections paginées)
   - Détecte si `$data instanceof JsonResource` → utilise `$data->response()->getData(true)` puis merge `success`/`message`
   - Paginators bruts : comportement inchangé (wrappés dans `data`)
   - **Why:** `Resource::collection($query->paginate())` double-wrappait les data et perdait meta/links
   - **How to apply:** les controllers qui passent des ResourceCollections à `respondSuccess()` auront automatiquement la bonne structure

2. **19 tests API Pest créés** (57 assertions)
   - `Modules/Faq/tests/Feature/FaqApiTest.php` — 6 tests (index paginé, published only, category filter, show, 404 unpublished, 404 inexistant)
   - `Modules/Team/tests/Feature/TeamApiTest.php` — 9 tests (401, index, show member, 403 non-member, store, 422 validation, invite, 403 non-owner, 422 duplicate invite)
   - `Modules/Testimonials/tests/Feature/TestimonialsApiTest.php` — 4 tests (index paginé, approved only, empty, order asc)

3. **3 controllers migrés** vers BaseApiController
   - `Modules/Booking/app/Http/Controllers/Api/PublicBookingController.php`
   - `Modules/Privacy/app/Http/Controllers/Api/ConsentController.php`
   - `Modules/Privacy/app/Http/Controllers/Api/RightsRequestController.php`
   - Réponses custom préservées (backward compat)

### Métriques
- PHPStan 0 erreurs
- 0 régression (1 fail pré-existant ProductImageGalleryTest — Spatie Media)
- **19/38 modules** avec API (vs 16 avant)
- MCP utilisés : qwen3-max x4 (multi-ai-mcp + multi-ai-mcp-2 + multi-ai-mcp-3)

### Bug connu pré-existant
- `ProductImageGalleryTest > API product show includes media` — assertJsonStructure(['data' => ['media']]) échoue — Spatie Media non sérialisé dans la réponse API produit
