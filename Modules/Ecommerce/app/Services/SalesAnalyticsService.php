<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Ecommerce\Models\Order;

class SalesAnalyticsService
{
    public function getSummary(?Carbon $from = null, ?Carbon $to = null): array
    {
        $from ??= now()->subDays(30);
        $to ??= now();

        $orders = Order::whereBetween('created_at', [$from, $to]);

        return [
            'total_orders' => (clone $orders)->count(),
            'total_revenue' => (float) (clone $orders)->whereIn('status', ['paid', 'delivered'])->sum('total'),
            'average_order_value' => (float) (clone $orders)->whereIn('status', ['paid', 'delivered'])->avg('total'),
            'pending_orders' => (clone $orders)->where('status', 'pending')->count(),
            'paid_orders' => (clone $orders)->where('status', 'paid')->count(),
            'shipped_orders' => (clone $orders)->where('status', 'shipped')->count(),
            'delivered_orders' => (clone $orders)->where('status', 'delivered')->count(),
            'cancelled_orders' => (clone $orders)->where('status', 'cancelled')->count(),
            'refunded_orders' => (clone $orders)->where('status', 'refunded')->count(),
        ];
    }

    public function getRevenueByDay(?Carbon $from = null, ?Carbon $to = null): Collection
    {
        $from ??= now()->subDays(30);
        $to ??= now();

        return Order::whereIn('status', ['paid', 'delivered'])
            ->whereBetween('created_at', [$from, $to])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total) as revenue'), DB::raw('COUNT(*) as orders'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    public function getTopProducts(int $limit = 10, ?Carbon $from = null, ?Carbon $to = null): Collection
    {
        $from ??= now()->subDays(30);
        $to ??= now();

        return DB::table('ecommerce_order_items')
            ->join('ecommerce_orders', 'ecommerce_order_items.order_id', '=', 'ecommerce_orders.id')
            ->whereIn('ecommerce_orders.status', ['paid', 'delivered'])
            ->whereBetween('ecommerce_orders.created_at', [$from, $to])
            ->select(
                'ecommerce_order_items.product_name',
                DB::raw('SUM(ecommerce_order_items.quantity) as total_quantity'),
                DB::raw('SUM(ecommerce_order_items.total) as total_revenue'),
            )
            ->groupBy('ecommerce_order_items.product_name')
            ->orderByDesc('total_revenue')
            ->limit($limit)
            ->get();
    }

    public function getCustomerLifetimeValues(int $limit = 20): Collection
    {
        return DB::table('ecommerce_orders')
            ->join('users', 'ecommerce_orders.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.email',
                DB::raw('SUM(ecommerce_orders.total) as total_spent'),
                DB::raw('COUNT(ecommerce_orders.id) as order_count'),
                DB::raw('MIN(ecommerce_orders.created_at) as first_order'),
                DB::raw('MAX(ecommerce_orders.created_at) as last_order'),
            )
            ->whereIn('ecommerce_orders.status', ['paid', 'delivered'])
            ->groupBy('ecommerce_orders.user_id', 'users.name', 'users.email')
            ->orderByDesc('total_spent')
            ->limit($limit)
            ->get();
    }

    public function getConversionRate(?Carbon $from = null, ?Carbon $to = null): array
    {
        $from ??= now()->subDays(30);
        $to ??= now();

        $carts = DB::table('ecommerce_carts')->whereBetween('created_at', [$from, $to])->count();
        $orders = Order::whereBetween('created_at', [$from, $to])->where('status', '!=', 'cancelled')->count();
        $rate = $carts > 0 ? round(($orders / $carts) * 100, 2) : 0.0;

        return ['carts' => $carts, 'orders' => $orders, 'rate' => $rate];
    }

    public function getRevenueByMonth(int $months = 12): Collection
    {
        return Order::where('created_at', '>=', now()->subMonths($months)->startOfMonth())
            ->whereIn('status', ['paid', 'delivered'])
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total) as revenue'),
                DB::raw('COUNT(id) as orders_count'),
            )
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('year')
            ->orderBy('month')
            ->get();
    }

    public function getOrdersByStatus(): Collection
    {
        return Order::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');
    }
}
