<?php namespace Spec\Ron\Builders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParameterBuilderSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Builders\ParameterBuilder');
    }

}

