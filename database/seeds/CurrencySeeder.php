<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'symbol' => 'AED',
            'displayText' => 'Dirham',
            'rateOfExchange' => 42.02,
            'append' => true
        ]);
    }
}
