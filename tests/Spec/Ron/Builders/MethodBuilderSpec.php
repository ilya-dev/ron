<?php namespace Spec\Ron\Builders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ron\Builders\ParameterBuilder;

class MethodBuilderSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('foo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Builders\MethodBuilder');
    }

    function it_builds_the_valid_method_declaration()
    {
        $this->build()->shouldReturn('public function foo() {  }');
    }

    function it_changes_the_visibility_of_the_method()
    {
        $this->shouldThrow('UnexpectedValueException')->duringVisibility('sdgwdsaav');

        $this->visibility('protected');

        $this->build()->shouldReturn('protected function foo() {  }');
    }

    function it_places_the_parameter_correctly(ParameterBuilder $parameter)
    {
        $parameter->build()->willReturn('\stdClass $baz = NULL');
        $this->parameter($parameter);

        $parameter->build()->willReturn('$wow');
        $this->parameter($parameter);

        $this->build()->shouldReturn('public function foo(\stdClass $baz = NULL, $wow) {  }');
    }

    function it_specifies_the_return_value()
    {
        $this->returnValue(null);
        $this->build()->shouldReturn('public function foo() {  }');

        $this->returnValue('43foobar');
        $this->build()->shouldReturn('public function foo() { return \'43foobar\'; }');
    }

}

