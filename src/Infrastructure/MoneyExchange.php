<?php

namespace Awin\Infrastructure;

class MoneyExchange extends ExchangeRates
{
    public function exchange($amount, $currency, $exchangeTo){
        $rate = $this->getExchangeRate($currency, $exchangeTo);

        return $amount * $rate;
    }
}
