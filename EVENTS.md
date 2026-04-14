# Events et listeners

> MEMORA solutions — Laravel 12 (39 modules nwidart)
> Derniere mise a jour : 2026-04-06

## Compteurs

| Element | Total |
|---------|-------|
| Events | **17** |
| Listeners | **16** |
| Broadcast channels | **4** |

## Events

| # | Event | Module | Broadcast | Channel |
|---|-------|--------|-----------|---------|
| 1 | AgentMessageReceived | AI | Oui | private-ai.conversation.{id} |
| 2 | ChannelMessageReceived | AI | Non | — |
| 3 | HumanTakeoverRequested | AI | Oui | presence-ai.agents |
| 4 | DashboardUpdated | Backoffice | Oui | private-dashboard.{teamId} |
| 5 | ArticleSaved | Blog | Non | — |
| 6 | CommentCreated | Blog | Non | — |
| 7 | UserCreated | Core | Non | — |
| 8 | UserDeleted | Core | Non | — |
| 9 | UserUpdated | Core | Non | — |
| 10 | CartAbandoned | Ecommerce | Non | — |
| 11 | LowStockDetected | Ecommerce | Non | — |
| 12 | OrderCreated | Ecommerce | Non | — |
| 13 | OrderDelivered | Ecommerce | Non | — |
| 14 | OrderPaid | Ecommerce | Non | — |
| 15 | OrderRefunded | Ecommerce | Non | — |
| 16 | OrderShipped | Ecommerce | Non | — |
| 17 | RealTimeNotification | Notifications | Oui | private-App.Models.User.{id} |

## Listeners

| # | Listener | Module | Ecoute | Async |
|---|----------|--------|--------|-------|
| 1 | GenerateArticleSeoListener | AI | ArticleSaved (Blog) | Oui |
| 2 | ModerateCommentListener | AI | CommentCreated (Blog) | Oui |
| 3 | NotifyAgentsOfTakeover | AI | HumanTakeoverRequested (AI) | Non |
| 4 | InvalidateSessionsOnPasswordReset | Auth | PasswordReset (Laravel) | Non |
| 5 | LogFailedLogin | Auth | Failed (Laravel) | Non |
| 6 | LogLoginAttempt | Auth | Login (Laravel) | Non |
| 7 | SendWelcomeNotification | Auth | UserCreated (Core) | Oui |
| 8 | DispatchEcommerceWebhooks | Ecommerce | Order*, LowStock | Oui |
| 9 | NotifyAdminsLowStock | Ecommerce | LowStockDetected | Oui |
| 10 | SendAbandonedCartReminder | Ecommerce | CartAbandoned | Oui |
| 11 | SendOrderConfirmation | Ecommerce | OrderCreated | Oui |
| 12 | SendOrderDeliveredNotification | Ecommerce | OrderDelivered | Oui |
| 13 | SendOrderRefundNotification | Ecommerce | OrderRefunded | Oui |
| 14 | SendOrderShippedNotification | Ecommerce | OrderShipped | Oui |
| 15 | WorkflowTriggerListener | Newsletter | Multiples (configurable) | Oui |
| 16 | LogSentEmail | Notifications | MessageSent (Laravel) | Non |

## Broadcast channels

| Channel | Type | Module |
|---------|------|--------|
| ai.conversation.{id} | Private | AI |
| ai.agents | Presence | AI |
| dashboard.{teamId} | Private | Backoffice |
| App.Models.User.{id} | Private | Notifications |

## Matrice Event → Listeners

```
ArticleSaved (Blog) → GenerateArticleSeoListener (AI)
CommentCreated (Blog) → ModerateCommentListener (AI)
HumanTakeoverRequested (AI) → NotifyAgentsOfTakeover (AI)
PasswordReset (Laravel) → InvalidateSessionsOnPasswordReset (Auth)
UserCreated (Core) → SendWelcomeNotification (Auth)
CartAbandoned (Ecommerce) → SendAbandonedCartReminder
LowStockDetected (Ecommerce) → NotifyAdminsLowStock + DispatchEcommerceWebhooks
OrderCreated → SendOrderConfirmation + DispatchEcommerceWebhooks
OrderPaid → DispatchEcommerceWebhooks
OrderShipped → SendOrderShippedNotification + DispatchEcommerceWebhooks
OrderDelivered → SendOrderDeliveredNotification + DispatchEcommerceWebhooks
OrderRefunded → SendOrderRefundNotification + DispatchEcommerceWebhooks
```

## Conventions

1. Event = fait passe (OrderCreated, pas CreateOrder)
2. Listeners inter-modules = toujours async (queue)
3. Listeners intra-module = synchrones si latence critique
4. Events broadcast implementent ShouldBroadcast
