<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Services;

use Modules\Ecommerce\Models\Bundle;
use Modules\Ecommerce\Models\BundleItem;
use Modules\Ecommerce\Models\Cart;

class BundleService
{
    public function __construct(
        private CartService $cartService,
    ) {}

    public function addBundleToCart(Cart $cart, Bundle $bundle): void
    {
        if (! $this->validateBundle($bundle)) {
            throw new \RuntimeException('Bundle invalide ou stock insuffisant.');
        }

        $bundle->loadMissing('items.variant');

        foreach ($bundle->items as $item) {
            /** @var BundleItem $item */
            $this->cartService->addItem($cart, $item->variant, $item->quantity);
        }
    }

    public function validateBundle(Bundle $bundle): bool
    {
        $bundle->loadMissing('items.variant');

        return $bundle->is_active
            && $bundle->items->isNotEmpty()
            && $bundle->canFulfill();
    }
}
