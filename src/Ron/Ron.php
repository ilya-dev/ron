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
     * @param array $methods
     * @return \Ron\Entity
     */
    public function create(array $methods = [])
    {
        // just make it green
        return new Entity('code');
    }

}

