<?php

namespace App;

use AllowDynamicProperties;
use Exception;

#[AllowDynamicProperties] class StringCalculator{

    const MAX_NUMBER_ALLOWED = 1000;

    protected string $delimeter = ',|\n';

    /**
     * @throws Exception
     */
    public function add(string $numbers): int
    {

        if(! $numbers){
            return 0;
        }

       $numbers = $this->parseString($numbers);
       $numbers = preg_split("/{$this->delimeter}/", $numbers);

       $this->disallowNegatives($numbers);

        return array_sum(
            $this->ignoredGreaterThan1000($numbers)
        );
    }


    public function parseString(string $numbers)
    {
        $customDelimetr = "\/\/(.)\n";

        if(preg_match("/{$customDelimetr}/", $numbers, $matches)){
            $this->delimeter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return str_replace("/$this->delimeter/", '', $numbers);

    }

    /**
     * @param array|false $numbers
     * @return array|false
     */
    public function ignoredGreaterThan1000(array|false $numbers): array|false
    {
        return array_filter($numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED);
    }


    /**
     * @param array|false $numbers
     * @return void
     * @throws Exception
     */
    public function disallowNegatives(array|false $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are disallowed');
            }
        }
    }



}