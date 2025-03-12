<?php

namespace Awin\Application;

use Awin\Infrastructure\MoneyExchange;

class EligibilityChecker
{
    public function process(string $file)
    {
        $userJson = file_get_contents($file);
        $userDetails = json_decode($userJson, true);

        $score = 0;
        if($userDetails['citizenship'] === 'UnitedKingdom'){
            $score = $score + 1;
        }

        $currentYear = (new \DateTime('now'))->format('Y');
        $yearOfbirth = (new \DateTime($userDetails['dob']))->format('Y');

        if($currentYear - $yearOfbirth > 30){
            $score = $score + 1;
        }

        $annualSalary = $userDetails['annualSalary'];
        if($userDetails['salaryCurrency'] !== 'GBP') {
            $exchange = new MoneyExchange();
            $annualSalary = $exchange->exchange($userDetails['annualSalary'], $userDetails['salaryCurrency'], 'GBP');
        }
        if($annualSalary > 35000){
            $score = $score + 1;
        }

        $monthlySpending = $userDetails['monthlySpending'];
        if($userDetails['spendingCurrency'] !== 'GBP'){
            $exchange = new MoneyExchange();
            $monthlySpending = $exchange->exchange($userDetails['monthlySpending'], $userDetails['spendingCurrency'], 'GBP');
        }

        if(in_array($userDetails['residentialStatus'], ['Homeowner', 'Living with parents'])){
            $score = $score + 1;
        }

        if($annualSalary / 12 - $monthlySpending > 1500 ){
            $score = $score + 1;
        }

        if(in_array($userDetails['workStatus'], ['Employed full-time', 'Self-employed'], true)){
            $score = $score + 1;
        }

        if(in_array($userDetails['residentialStatus'], ['Homeowner', 'Living with parents'])){
            $score = $score + 1;
        }

        $maxLoan = $score * 1000;

        return $maxLoan;
    }
}
