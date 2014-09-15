<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoneSpec extends ObjectBehavior
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
        $this->shouldHaveType('Bone');
    }

    function let()
    {
        $this->beConstructedWith(6);
    }

    function it_should_have_a_value_between_1_and_6()
    {
        $roll = $this->roll();
        $roll->getValue()->shouldBeBetween(1, 6);
    }

    function it_has_status_of_critical_miss_for_1()
    {
        $this->roll(1)->getStatus()->shouldEqual('min');
    }

    function it_has_status_of_critical_hit_for_6()
    {
        $this->roll(6)->getStatus()->shouldEqual('max');
    }
}
