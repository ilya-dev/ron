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
        $builder = new Builders\ClassBuilder($reflector->getName());

        if ( ! $reflector->isInterface())
        {
            $builder->extend($reflector->getName());
        }
        else
        {
            $builder->implement($reflector->getName());
        }

        return $builder;
    }

    /**
     * Transforms \ReflectionMethod to \Ron\Builders\MethodBuilder
     *
     * @param \ReflectionMethod $method
     * @param mixed|null $returnValue
     * @return Builders\MethodBuilder
     */
    public function transformMethod(\ReflectionMethod $method, $returnValue = null)
    {
        $builder = new Builders\MethodBuilder($method->getName());

        if ($method->isPrivate())
        {
            $builder->visibility('private');
        }
        elseif ($method->isProtected())
        {
            $builder->visibility('protected');
        }
        else
        {
            $builder->visibility('public');
        }

        $builder->returnValue($returnValue);

        foreach ($method->getParameters() as $parameter)
        {
            $builder->parameter($this->transformParameter($parameter));
        }

        return $builder;
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
        elseif ($parameter->isArray())
        {
            $builder->typeHint('array');
        }

        return $builder;
    }

}

