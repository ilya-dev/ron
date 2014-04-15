<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ron\Builders\ParameterBuilder;

class TransformerSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Ron\Transformer');
    }

    function it_transforms_the_parameter(\ReflectionParameter $parameter)
    {
        $model = new ParameterBuilder('foo');
        $model->byDefault(3.14);
        $model->typeHint('stdClass');

        $parameter->getClass()->willReturn('stdClass');
        $parameter->getName()->willReturn('foo');
        $parameter->isDefaultValueAvailable()->willReturn(true);
        $parameter->getDefaultValue()->willReturn(3.14);

        $builder = $this->transformParameter($parameter);
        $builder->shouldHaveType('Ron\Builders\ParameterBuilder');
        $builder->shouldBeLike($model);
    }

}

