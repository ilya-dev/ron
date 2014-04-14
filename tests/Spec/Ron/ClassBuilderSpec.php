<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassBuilderSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\ClassBuilder');
    }

    function it_sets_and_returns_the_class_name()
    {
        $this->shouldThrow($e = 'InvalidArgumentException')->duringSetName(null);

        $this->shouldNotThrow($e)->duringSetName($name = 'bar');

        $this->getName()->shouldBeEqualTo($name);
    }

}

