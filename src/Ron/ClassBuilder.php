<?php namespace Ron;

class ClassBuilder {

    /**
     * The class name
     *
     * @var string
     */
    protected $name;

    /**
     * The interfaces this class implements
     *
     * @var array
     */
    protected $interfaces;

    /**
     * The constructor
     *
     * @param string $name
     * @return \Ron\ClassBuilder
     */
    public function __construct($name)
    {
        $this->setName($name);

        $this->interfaces = [];
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        $implements = '';

        if ( ! empty($this->interfaces))
        {
            $implements = ' implements '.\implode(', ', $this->interfaces);
        }

        return "class {$this->name}{$implements} {  }";
    }

    /**
     * "Implements" an interface
     *
     * @param string $interface
     * @return self
     */
    public function implement($interface)
    {
        $this->interfaces[] = $interface;
    }

    /**
     * Sets the class name
     *
     * @throws \InvalidArgumentException
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        if ( ! \is_string($name))
        {
            $message = 'Expected to receive a string, but got '.\gettype($name);

            throw new \InvalidArgumentException($message);
        }

        $this->name = $name;
    }

    /**
     * Returns the class name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}

