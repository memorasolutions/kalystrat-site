<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Services\Tax;

use Modules\Ecommerce\Contracts\TaxCalculatorInterface;

class EuVatCalculator implements TaxCalculatorInterface
{
    /** @var array<string, float> EU standard VAT rates (2026) */
    private const array RATES = [
        'FR' => 0.20, 'DE' => 0.19, 'IT' => 0.22, 'ES' => 0.21,
        'NL' => 0.21, 'BE' => 0.21, 'AT' => 0.20, 'PT' => 0.23,
        'IE' => 0.23, 'SE' => 0.25, 'DK' => 0.25, 'FI' => 0.255,
        'PL' => 0.23, 'CZ' => 0.21, 'RO' => 0.19, 'HU' => 0.27,
        'BG' => 0.20, 'HR' => 0.25, 'SK' => 0.20, 'SI' => 0.22,
        'LT' => 0.21, 'LV' => 0.21, 'EE' => 0.22, 'CY' => 0.19,
        'LU' => 0.17, 'MT' => 0.18, 'GR' => 0.24, 'EL' => 0.24,
    ];

    public function calculateTax(float $subtotal, string $province): TaxResult
    {
        $code = strtoupper($province);
        $rate = self::RATES[$code] ?? 0.0;
        $amount = round($subtotal * $rate, 2);

        $taxName = $code === 'FR' ? 'TVA' : 'VAT';
        $breakdown = $rate > 0 ? [['name' => $taxName, 'rate' => $rate, 'amount' => $amount]] : [];

        return new TaxResult($amount, $breakdown);
    }

    /** @return array<int, array{name: string, rate: float, amount: float}> */
    public function getTaxBreakdown(float $subtotal, string $province): array
    {
        return $this->calculateTax($subtotal, $province)->getBreakdown();
    }
}
