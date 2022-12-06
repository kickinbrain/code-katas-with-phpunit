<?php


use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @dataProvider  factors
     * @test
     */
    function it_generates_prime_factors_for_1($number, $expected)
    {
        $factors = new \App\PrimeFactors();

        $this->assertEquals($expected, $factors->generate($number));
    }

        public function factors()
        {
            return [
                [1, []],
                [2, [2]],
                [3, [3]],
                [4, [2,2]],
                [5, [5]],
                [6, [2,3]],
                [7, [7]],
                [8, [2,2,2]],
                [9, [3,3]],
                [10, [2,5]],
                [100, [2,2,5,5]],
            ];
        }

}
