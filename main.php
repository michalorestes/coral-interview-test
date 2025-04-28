<?php

use Awin\Application\EligibilityChecker;

include 'vendor/autoload.php';

include 'src/Application/EligibilityChecker.php';

$checker = new EligibilityChecker();
$checker->process("user.json");
