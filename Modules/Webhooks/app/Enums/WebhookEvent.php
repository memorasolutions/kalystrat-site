<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Webhooks\Enums;

enum WebhookEvent: string
{
    case ArticleCreated = 'article.created';
    case ArticleUpdated = 'article.updated';
    case ArticleDeleted = 'article.deleted';
    case UserCreated = 'user.created';
    case UserUpdated = 'user.updated';
    case PlanCreated = 'plan.created';
    case PlanUpdated = 'plan.updated';
    case CommentCreated = 'comment.created';
    case CommentApproved = 'comment.approved';
    case OrderCreated = 'order.created';
    case OrderPaid = 'order.paid';
    case OrderShipped = 'order.shipped';
    case OrderRefunded = 'order.refunded';
    case LowStockDetected = 'inventory.low_stock';

    public function label(): string
    {
        return match ($this) {
            self::ArticleCreated => __('Article créé'),
            self::ArticleUpdated => __('Article mis à jour'),
            self::ArticleDeleted => __('Article supprimé'),
            self::UserCreated => __('Utilisateur créé'),
            self::UserUpdated => __('Utilisateur mis à jour'),
            self::PlanCreated => __('Plan créé'),
            self::PlanUpdated => __('Plan mis à jour'),
            self::CommentCreated => __('Commentaire créé'),
            self::CommentApproved => __('Commentaire approuvé'),
            self::OrderCreated => __('Commande créée'),
            self::OrderPaid => __('Commande payée'),
            self::OrderShipped => __('Commande expédiée'),
            self::OrderRefunded => __('Commande remboursée'),
            self::LowStockDetected => __('Stock bas détecté'),
        };
    }

    /** @return array<string> */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
