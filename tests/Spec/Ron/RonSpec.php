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

}

