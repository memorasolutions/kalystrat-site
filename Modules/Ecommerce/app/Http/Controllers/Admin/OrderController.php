<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Ecommerce\Events\OrderDelivered;
use Modules\Ecommerce\Events\OrderShipped;
use Modules\Ecommerce\Models\Order;
use Modules\Ecommerce\Services\InvoiceService;

class OrderController
{
    public function index(Request $request): View
    {
        $query = Order::with(['user', 'items']);

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('search')) {
            $query->where('order_number', 'like', '%'.$request->input('search').'%');
        }

        $orders = $query->latest()->paginate(20);

        return view('ecommerce::admin.orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        $order->load(['items', 'user', 'shippingAddress', 'billingAddress', 'coupon']);

        return view('ecommerce::admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,delivered,completed,cancelled,refunded',
        ]);

        $allowedTransitions = [
            'pending' => ['processing', 'cancelled'],
            'processing' => ['shipped', 'cancelled'],
            'shipped' => ['delivered', 'completed'],
            'completed' => ['refunded'],
            'cancelled' => [],
            'refunded' => [],
        ];

        $newStatus = $validated['status'];
        $allowed = $allowedTransitions[$order->status] ?? [];

        if (! in_array($newStatus, $allowed)) {
            return back()->withErrors(['status' => "Transition invalide de {$order->status} vers {$newStatus}."]);
        }

        $order->update(['status' => $newStatus]);

        if ($newStatus === 'shipped') {
            OrderShipped::dispatch($order);
        }

        if ($newStatus === 'delivered') {
            OrderDelivered::dispatch($order);
        }

        session()->flash('success', __('Statut de la commande mis à jour avec succès.'));

        return redirect()->route('admin.ecommerce.orders.show', $order);
    }

    public function invoice(Order $order, InvoiceService $invoiceService): Response
    {
        return $invoiceService->downloadResponse($order);
    }
}
