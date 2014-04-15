<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ReflectionClass as Reflector;

class RonSpec extends ObjectBehavior {

    function let(Reflector $reflector)
    {
        $this->beConstructedWith($reflector);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Ron');
    }

    function it_sets_and_returns_the_reflector(Reflector $reflector)
    {
        $this->setReflector($reflector);

        $this->getReflector()->shouldReturn($reflector);
    }

    function it_creates_a_new_class(Reflector $reflector)
    {
        // $reflector->isInterface()->shouldBeCalled();
        // $reflector->getMethods(Argument::any())->shouldBeCalled();

        $this->create()->shouldHaveType('Ron\Entity');
    }

    function it_returns_the_methods_you_should_override_or_implement(\ReflectionClass $class)
    {
        $class->isInterface()->willReturn(false);
        $class->getMethods(\ReflectionMethod::IS_ABSTRACT)->willReturn(['foo', 'bar']);

        $this->setReflector($class);
        $this->getMethods()->shouldReturn(['foo', 'bar']);

        $class->isInterface()->willReturn(true);
        $class->getMethods()->willReturn(['foo', 'bar', 'baz']);

        $this->setReflector($class);
        $this->getMethods()->shouldReturn(['foo', 'bar', 'baz']);
    }

}

