<?php

namespace App\Http\Controllers;

use App\Helpers\CurrencyRatesHelper;
use Illuminate\Http\Request;

class Rate extends Controller
{
    public function get()
    {
        return (new CurrencyRatesHelper())->rate();
    }
}
