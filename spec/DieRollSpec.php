<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DieRollSpec extends ObjectBehavior
{

    function getMatchers()
    {
        return [
            'beBetween' => function ($subject, $min, $max) {
                    if ($subject >= $min && $subject <= $max) {
                        return true;
                    }
                    return false;
                }
        ];
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DieRoll');
    }

    function it_explains_empty_array_for_empty()
    {
        $this->explain('')->shouldReturn([]);
    }

    function it_explains_3_6_for_3d6()
    {
        $this->explain('3d6')->shouldEqual([3, 6]);
    }

    function it_explains_4_12_for_4d12()
    {
        $this->explain('4d12')->shouldEqual([4, 12]);
    }

    function it_explains_4_12_3_for_4d12_plus_3()
    {
        $this->explain('4d12+3')->shouldEqual([4, 12, 3]);
    }

    function it_explains_1_8_12_for_1d8_plus_12()
    {
        $this->explain('1d8+12')->shouldEqual([1, 8, 12]);
    }

    function it_explains_1_8_minus_12_for_1d8_minus_12()
    {
        $this->explain('1d8-12')->shouldEqual([1, 8, -12]);
    }
    
    function it_returns_1_8_minus_12_for_1d8_minus_12()
    {
        $this->explain('1d8-12')->shouldEqual([1, 8, -12]);
    }

    function it_returns_10_88_minus_125_for_10d88_minus_125()
    {
        $this->explain('10d88-125')->shouldEqual([10, 88, -125]);
    }

    function it_should_have_a_value_between_1_and_6()
    {
        $this->roll('1d6')->shouldBeBetween(1, 6);
    }

    function it_should_have_a_value_between_2_and_12_for_2d6()
    {
        $this->roll('2d6')->shouldBeBetween(2, 12);
    }

    function it_should_have_a_value_between_0_and_5_for_1d6_minus_1()
    {
        $this->roll('1d6-1')->shouldBeBetween(0, 5);
    }
}

