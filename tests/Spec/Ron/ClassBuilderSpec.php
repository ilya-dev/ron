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

    function it_builds_the_class_declaration()
    {
        $this->build()->shouldReturn('class foo {  }');
    }

    function it_implements_the_interface()
    {
        $this->implement('bar');

        $this->build()->shouldReturn('class foo implements bar {  }');

        $this->implement('baz');

        $this->build()->shouldReturn('class foo implements bar, baz {  }');
    }

    function it_extends_the_class()
    {
        $this->extend('bar');

        $this->build()->shouldReturn('class foo extends bar {  }');

        $this->extend('baz');

        $this->build()->shouldReturn('class foo extends bar, baz {  }');
    }

}

