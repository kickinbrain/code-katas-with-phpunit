<?php


use PHPUnit\Framework\TestCase;
use App\StringCalculator;

class StringCalculatorTest extends TestCase
{
    /** @test */

    function it_evaluates_an_empty_string_as_0(){
        $calculator = new StringCalculator();

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    function it_finds_the_sum_of_a_single_number(){
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5'));
    }
    /** @test */
    function it_finds_the_sum_of_a_two_number(){
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add('5,5'));
    }


    /** @test */
    function it_finds_the_sum_of_a_any_amount_number(){
        $calculator = new StringCalculator();

        $this->assertSame(260, $calculator->add('5,5,220,10,20'));
    }

    /** @test */
    function it_accepts_a_new_linke_character_as_a_delimiter_too(){
        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add("5\n5"));
    }

    /** @test */
    function negative_numbers_are_not_allowed(){

        $calculator = new StringCalculator();

        $this->expectException(\Exception::class);

        $calculator->add('5, -4');

    }
    /** @test */
    function numbers_greater_than_1000_are_ignored(){

        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5, 1001'));
    }

    /** @test */
    function it_supports_custom_delimiters(){

        $calculator = new StringCalculator();

        $this->assertSame(10, $calculator->add("//:\n5:4:1"));
    }
}
