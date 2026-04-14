<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\Ecommerce\Services\Tax;

use Modules\Ecommerce\Contracts\TaxCalculatorInterface;

class UsTaxCalculator implements TaxCalculatorInterface
{
    /** @var array<string, float> Combined state + avg local sales tax rates (2026) */
    private const array RATES = [
        'AL' => 0.053, 'AK' => 0.0, 'AZ' => 0.056, 'AR' => 0.065,
        'CA' => 0.0725, 'CO' => 0.029, 'CT' => 0.0635, 'DE' => 0.0,
        'FL' => 0.06, 'GA' => 0.04, 'HI' => 0.04, 'ID' => 0.06,
        'IL' => 0.0625, 'IN' => 0.07, 'IA' => 0.06, 'KS' => 0.065,
        'KY' => 0.06, 'LA' => 0.04, 'ME' => 0.055, 'MD' => 0.06,
        'MA' => 0.0625, 'MI' => 0.06, 'MN' => 0.06875, 'MS' => 0.07,
        'MO' => 0.04225, 'MT' => 0.0, 'NE' => 0.055, 'NV' => 0.046,
        'NH' => 0.0, 'NJ' => 0.06625, 'NM' => 0.05, 'NY' => 0.08,
        'NC' => 0.0475, 'ND' => 0.05, 'OH' => 0.0575, 'OK' => 0.045,
        'OR' => 0.0, 'PA' => 0.06, 'RI' => 0.07, 'SC' => 0.06,
        'SD' => 0.045, 'TN' => 0.07, 'TX' => 0.0625, 'UT' => 0.061,
        'VT' => 0.06, 'VA' => 0.053, 'WA' => 0.065, 'WV' => 0.06,
        'WI' => 0.05, 'WY' => 0.05, 'DC' => 0.0575,
    ];

    public function calculateTax(float $subtotal, string $province): TaxResult
    {
        $rate = self::RATES[strtoupper($province)] ?? 0.0;
        $amount = round($subtotal * $rate, 2);

        $breakdown = $rate > 0 ? [['name' => 'Sales Tax', 'rate' => $rate, 'amount' => $amount]] : [];

        return new TaxResult($amount, $breakdown);
    }

    /** @return array<int, array{name: string, rate: float, amount: float}> */
    public function getTaxBreakdown(float $subtotal, string $province): array
    {
        return $this->calculateTax($subtotal, $province)->getBreakdown();
    }
}
