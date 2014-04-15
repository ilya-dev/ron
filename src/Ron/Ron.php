<?php namespace Ron;

class Ron {

    /**
     * The reflector you work with
     *
     * @var \ReflectionClass
     */
    protected $reflector;

    /**
     * The Transformer instance
     *
     * @var Transformer
     */
    protected $transformer;

    /**
     * The constructor
     *
     * @param \ReflectionClass $reflector
     * @param Transformer|null $transformer
     * @return \Ron\Ron
     */
    public function __construct(\ReflectionClass $reflector, Transformer $transformer = null)
    {
        $this->setReflector($reflector);

        $this->transformer = $transformer ?: new Transformer;
    }

    /**
     * Sets the reflector
     *
     * @param \ReflectionClass $reflector
     * @return void
     */
    public function setReflector(\ReflectionClass $reflector)
    {
        $this->reflector = $reflector;
    }

    /**
     * Returns the reflector
     *
     * @return \ReflectionClass
     */
    public function getReflector()
    {
        return $this->reflector;
    }

    /**
     * Creates a new class
     *
     * @param array $returnValues
     * @return \Ron\Entity
     */
    public function create(array $returnValues = [])
    {
        $methods = $this->getMethods();

        $class = $this->transformer->transform($this->reflector);

        foreach ($methods as $method)
        {
            /**
             * @var $method \ReflectionMethod
             */

            $returnValue = null;

            if (\array_key_exists($key = $method->getName(), $returnValues))
            {
                $returnValue = $returnValues[$key];
            }

            $class->method($this->transformer->transformMethod($method, $returnValue));
        }

        return new Entity($class->build());
    }

    /**
     * Returns the methods you need to override/implement
     *
     * @return array
     */
    public function getMethods()
    {
        if ($this->reflector->isInterface())
        {
            return $this->reflector->getMethods();
        }

        return $this->reflector->getMethods(\ReflectionMethod::IS_ABSTRACT);
    }

}

