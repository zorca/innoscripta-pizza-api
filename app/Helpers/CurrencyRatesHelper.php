<?php

namespace App\Helpers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

/**
 *
 *  Currency Rates Converter with in-memory Redis cache.
 *
 * Class CurrencyRatesHelper
 * @package App\Helpers
 */
class CurrencyRatesHelper
{

    private $config;
    private $http;
    private $currentDate;

    public function __construct()
    {
        $this->config = config('currency');
        $this->http = new Client(['timeout'  => 2.0]);
        $this->currentDate = Carbon::now()->format('Y-m-d');
    }

    /**
     *
     * Get data from remote service or in-memory Redis cache.
     *
     * @param string $base_currency
     * @param string $date
     * @return array|mixed
     */
    public function getAll($base_currency = 'EUR', $date = 'latest')
    {
        $result = [];
        if ($this->redisCheck()) {
            if ('latest' === $date) {
                $date = $this->currentDate;
            }
            $redisCache = Redis::get('currency_rates_' . $base_currency . '_' . $date);
            if ($redisCache) {
                return unserialize($redisCache);
            } else {
                $result = $this->getFromService($base_currency, $date);
                Redis::set('currency_rates_' . $base_currency . '_' . $date, serialize($result));
                return $result;
            }
        } else {
            $result = $this->getFromService($base_currency, $date);
        }

        return $result;
    }

    /**
     * @param float $euro
     * @return float
     */
    public function transformEurToUsd(float $euro)
    {
        $currentResult = $this->getAll();
        return (float) round($euro * $currentResult['rates']['USD'], 2);
    }

    /**
     * @param float $euro
     * @return float
     */
    public function rate()
    {
        $currentResult = $this->getAll();
        return (float) $currentResult['rates']['USD'];
    }

    /**
     *
     * Get data from remote service.
     *
     * @param string $base_currency
     * @param string $date
     * @return array|mixed
     */
    private function getFromService($base_currency = 'EUR', $date = 'latest')
    {
        $result = [];
        $request = $this->config['api_url'] . '/' . $date . '?base=' . $base_currency;
        $response = $this->http->request('GET', $request);
        if (200 === $response->getStatusCode()) {
            return json_decode($response->getBody()->getContents(), true);
        }
        return $result;
    }

    /**
     *
     * Check Redis presents or not.
     *
     * @return bool
     */
    public function redisCheck()
    {
        try {
            Redis::connect();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
