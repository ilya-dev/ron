<?php namespace Ron;

class Transformer {

    /**
     * Transforms \ReflectionClass to \Ron\Builders\ClassBuilder
     *
     * @param \ReflectionClass $reflector
     * @return Builders\ClassBuilder
     */
    public function transform(\ReflectionClass $reflector)
    {

    }

    /**
     * Transforms \ReflectionMethod to \Ron\Builders\MethodBuilder
     *
     * @param \ReflectionMethod $method
     * @return Builders\MethodBuilder
     */
    public function transformMethod(\ReflectionMethod $method)
    {

    }

    /**
     * Transforms \ReflectionParameter to \Ron\Builders\ParameterBuilder
     *
     * @param \ReflectionParameter $parameter
     * @return Builders\ParameterBuilder
     */
    public function transformParameter(\ReflectionParameter $parameter)
    {
        $builder = new Builders\ParameterBuilder($parameter->getName());

        if ($parameter->isDefaultValueAvailable())
        {
            $builder->byDefault($parameter->getDefaultValue());
        }

        if ( ! \is_null($class = $parameter->getClass()))
        {
            $builder->typeHint($class);
        }

        return $builder;
    }

}

