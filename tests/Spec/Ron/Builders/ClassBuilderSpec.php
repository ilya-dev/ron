<?php namespace Spec\Ron\Builders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ron\Builders\MethodBuilder;

class ClassBuilderSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Builders\ClassBuilder');
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
    }

    function it_extends_the_class()
    {
        $this->extend('bar');

        $this->build()->shouldReturn('class foo extends bar {  }');
    }

    function it_places_the_elements_correctly()
    {
        $this->implement('bar');

        $this->extend('baz');

        $this->build()->shouldReturn('class foo extends baz implements bar {  }');
    }

    function it_places_the_method_correctly(MethodBuilder $method)
    {
        $method->build()->willReturn('public function foo($foo) {  }');
        $this->method($method);

        $method->build()->willReturn('private function wow() {  }');
        $this->method($method);

        $this->build()->shouldReturn(
            'class foo { public function foo($foo) {  } private function wow() {  } }'
        );
    }

}

