<?php namespace Spec\Ron\Builders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MethodBuilderSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Builders\MethodBuilder');
    }

}
