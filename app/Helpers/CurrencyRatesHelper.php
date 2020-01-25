<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class CurrencyRatesHelper
{

    private $config;
    private $http;

    public function __construct()
    {
        $this->config = config('currency');
        $this->http = new Client(['timeout'  => 2.0]);
    }

    public function getAll($base_currency = 'EUR', $date = 'latest')
    {
        $result = [];
        $request = $this->config['api_url'] . '/' . $date . '?base=' . $base_currency;
        $response = $this->http->request('GET', $request);
        var_dump($response->getStatusCode());
        if (200 === $response->getStatusCode()) {
            $result = json_decode($response->getBody()->getContents(), true);
        }
        return $result;
    }
}
