<?php

namespace App\Console\Commands;

use App\Helpers\CurrencyRatesHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class AppCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application checker command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $currencyRates = new CurrencyRatesHelper();
        $this->info(Redis::connect());
        //$this->info(serialize($currencyRates->getAll()));
        $this->info($currencyRates->transformEurToUsd(40));
    }
}
