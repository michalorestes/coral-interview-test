<?php

namespace Awin\Infrastructure;

class ExchangeRates
{
    public function getExchangeRate($currency, $exchangeTo)
    {
        $ratesJson = file_get_contents('exchangeRates.json');
        $rates = json_decode($ratesJson, true);

        return $rates[$currency][$exchangeTo];
    }
}
