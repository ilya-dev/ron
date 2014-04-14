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

    function it_builds_the_parameter_declaration()
    {
        $this->build()->shouldReturn('$foo');
    }

    function it_prepends_the_type_hint()
    {
        $this->typeHint('\stdClass');

        $this->build()->shouldReturn('\stdClass $foo');
    }

    function it_appends_the_default_value()
    {
        $this->byDefault(null);

        $this->build()->shouldReturn('$foo = NULL');
    }

}

