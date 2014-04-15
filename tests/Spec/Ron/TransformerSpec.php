<?php namespace Spec\Ron;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ron\Builders\ClassBuilder;
use Ron\Builders\ParameterBuilder;
use Ron\Builders\MethodBuilder;

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

    function it_transforms_the_method(\ReflectionMethod $method)
    {
        $model = new MethodBuilder('foo');
        $model->returnValue(47);
        $model->visibility('protected');

        $method->getName()->willReturn('foo');
        $method->isPrivate()->willReturn(false);
        $method->isProtected()->willReturn(true);
        $method->isPublic()->shouldNotBeCalled();
        $method->getParameters()->willReturn([]);

        $builder = $this->transformMethod($method, 47);
        $builder->shouldHaveType('Ron\Builders\MethodBuilder');
        $builder->shouldBeLike($model);
    }

    function it_transforms_the_class(\ReflectionClass $class)
    {
        $model = new ClassBuilder('foo');
        $model->extend('foo');

        $class->getName()->willReturn('foo');
        $class->isInterface()->willReturn(false);

        $builder = $this->transform($class);
        $builder->shouldHaveType('Ron\Builders\ClassBuilder');

        $builder->shouldBeLike($model);
    }

}

