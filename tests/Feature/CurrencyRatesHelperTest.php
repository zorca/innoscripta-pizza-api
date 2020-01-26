<?php

namespace Tests\Feature;

use App\Helpers\CurrencyRatesHelper;
use Tests\TestCase;

class CurrencyRatesHelperTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCurrencyConverterGetAllCurrencies()
    {
        $currencyRatesHelper = new CurrencyRatesHelper();
        $allCurrencies = $currencyRatesHelper->getAll('EUR', '2020-01-10');
        $this->assertEquals(
            $allCurrencies,
            [
                'rates' => [
                    'CAD' => 1.4498,
                    'HKD' => 8.6137,
                    'ISK' => 136.6,
                    'PHP' => 55.998,
                    'DKK' => 7.4731,
                    'HUF' => 333.85,
                    'CZK' => 25.265,
                    'AUD' => 1.6132,
                    'RON' => 4.7796,
                    'SEK' => 10.551,
                    'IDR' => 15263.99,
                    'INR' => 78.6915,
                    'BRL' => 4.5188,
                    'RUB' => 68.041,
                    'HRK' => 7.4445,
                    'JPY' => 121.6,
                    'THB' => 33.534,
                    'CHF' => 1.0822,
                    'SGD' => 1.4969,
                    'PLN' => 4.2462,
                    'BGN' => 1.9558,
                    'TRY' => 6.5198,
                    'CNY' => 7.6773,
                    'NOK' => 9.8745,
                    'NZD' => 1.6769,
                    'ZAR' => 15.8081,
                    'USD' => 1.1091,
                    'MXN' => 20.8634,
                    'ILS' => 3.8476,
                    'GBP' => 0.8481,
                    'KRW' => 1286.0,
                    'MYR' => 4.5212,
                ],
                'base' => 'EUR',
                'date' => '2020-01-10'
            ]
        );
    }
}
