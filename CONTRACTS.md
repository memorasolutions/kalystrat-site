# Contracts — Interfaces applicatives

> MEMORA solutions — Laravel 12 (39 modules nwidart)
> Derniere mise a jour : 2026-04-06

## Vue d'ensemble

11 interfaces (contracts) formalisent les frontieres entre modules. Chaque module consomme ces interfaces via l'injection de dependances.

| # | Interface | Module | Responsabilite |
|---|-----------|--------|----------------|
| 1 | AiServiceInterface | Core | Generation IA (SEO, moderation, traduction, resume, chat) |
| 2 | MetricProviderInterface | Core | Exposition de metriques pour le dashboard |
| 3 | ServiceInterface | Core | CRUD generique (all, paginate, find, create, update, delete) |
| 4 | SettingsReaderInterface | Core | Lecture de configuration applicative (cle/valeur) |
| 5 | UserInterface | Core | Abstraction utilisateur (identite, role) |
| 6 | ChannelAdapterInterface | AI | Envoi/reception de messages multi-canal |
| 7 | EmbeddingServiceInterface | AI | Generation et recherche vectorielle d'embeddings |
| 8 | TaxCalculatorInterface | Ecommerce | Calcul de taxes par province/pays |
| 9 | CheckoutServiceInterface | Ecommerce | Gestion des sessions de paiement |
| 10 | ErrorReporterInterface | ErrorMonitoring | Rapport d'erreurs avec contexte |
| 11 | SmsDriverInterface | Notifications | Envoi SMS (unitaire, bulk, solde) |

## Details

### AiServiceInterface (Core)
```php
public function generateSeoMeta(string $content, string $locale = 'fr'): array;
public function moderateContent(string $content): array;
public function translateText(string $text, string $targetLocale): string;
public function generateSummary(string $content, int $maxWords = 100): string;
public function chat(string $prompt, ?string $systemPrompt = null): string;
```

### MetricProviderInterface (Core)
```php
public function getMetricName(): string;
public function getWidgets(): array;
public function getMetrics(Carbon $from, Carbon $to): array;
```

### ServiceInterface (Core)
```php
public function all(): Collection;
public function paginate(int $perPage = 15): LengthAwarePaginator;
public function find(int $id): ?Model;
public function findByUuid(string $uuid): ?Model;
public function create(array $data): Model;
public function update(int $id, array $data): Model;
public function delete(int $id): bool;
```

### SettingsReaderInterface (Core)
```php
public function get(string $key, mixed $default = null): mixed;
```

### UserInterface (Core)
```php
public function getKey(): int|string;
public function getName(): string;
public function getEmail(): string;
public function hasRole(string $role): bool;
```

### ChannelAdapterInterface (AI)
```php
public function send(Message $message, Channel $channel): void;
public function receive(array $payload, Channel $channel): Message;
```

### EmbeddingServiceInterface (AI)
```php
public function generateEmbedding(string $text): array;
public function searchSimilar(array $embedding, int $limit = 10): Collection;
```

### TaxCalculatorInterface (Ecommerce)
```php
public function calculateTax(float $subtotal, string $province): float;
public function getTaxBreakdown(float $subtotal, string $province): array;
```

### CheckoutServiceInterface (Ecommerce)
```php
public function createSession(Cart $cart): CheckoutSession;
public function handleCallback(Request $request): Order;
public function getSessionStatus(string $sessionId): string;
```

### ErrorReporterInterface (ErrorMonitoring)
```php
public function report(Throwable $e): void;
public function context(array $data): self;
```

### SmsDriverInterface (Notifications)
```php
public function send(string $to, string $message): bool;
public function sendBulk(array $recipients, string $message): array;
public function getBalance(): ?float;
public function isConfigured(): bool;
```

## Diagramme

```
Core (5 interfaces)
├── AiServiceInterface        ← Blog, AI
├── MetricProviderInterface   ← Backoffice
├── ServiceInterface          ← Tous les modules
├── SettingsReaderInterface   ← Tous les modules
└── UserInterface             ← Auth, Notifications

AI (2 interfaces)
├── ChannelAdapterInterface   ← AI (interne)
└── EmbeddingServiceInterface ← AI (interne)

Ecommerce (2 interfaces)
├── TaxCalculatorInterface    ← Ecommerce (interne)
└── CheckoutServiceInterface  ← Ecommerce (interne)

ErrorMonitoring (1 interface)
└── ErrorReporterInterface    ← Tous les modules

Notifications (1 interface)
└── SmsDriverInterface        ← Notifications, Ecommerce
```

## Regles

1. Aucun module business n'importe directement un autre module business
2. Implementations liees dans le ServiceProvider du module proprietaire
3. Tests unitaires mockent les interfaces, jamais les implementations
4. Interfaces Core partagees, interfaces internes restent dans leur module
