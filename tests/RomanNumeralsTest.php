<?php


use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{

    /**
     * @dataProvider checks
     * @test
     */

    function it_generates_the_roman_numerals_for_1($number, $numeral)
    {
        $this->assertEquals($numeral, App\RomanNumerals::generate($number));
    }

    /**
     * @test
     */

    function it_cannot_generate_for_less_than_1()
    {
        $this->assertFalse(\App\RomanNumerals::generate(0));
    }

    /** @test */

    function it_cannot_generate_a_roman_numeral_for_more_than_3999()
    {
        $this->assertFalse(\App\RomanNumerals::generate(400000));
    }


    public function checks()
    {
        return [
            [1,'I'],
            [2,'II'],
            [3,'III'],
            [4,'IV'],
            [6,'VI'],
            [7,'VII'],
            [9,'IX'],
            [10,'X'],
        ];
    }
}
