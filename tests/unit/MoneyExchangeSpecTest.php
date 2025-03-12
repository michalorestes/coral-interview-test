<?php

use Awin\Infrastructure\MoneyExchange;
use PHPUnit\Framework\TestCase;

class MoneyExchangeSpecTest extends TestCase
{
    /** @var MoneyExchange */
    private $moneyExchange;

    public function setUp(): void
    {
        $this->moneyExchange = new MoneyExchange();
    }

    public function testClass()
    {
        $amount = $this->moneyExchange->exchange('1', 'USD', 'GBP');
        $this->assertIsFloat($amount);
    }
}
