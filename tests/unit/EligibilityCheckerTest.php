<?php

use Awin\Application\EligibilityChecker;
use PHPUnit\Framework\TestCase;

class EligibilityCheckerTest extends TestCase
{
    public function testExample(): void
    {
        $eligibilityChecker = new EligibilityChecker();
        $result = $eligibilityChecker->process('user.json');

        $this->assertEquals(5000, $result);
    }
}