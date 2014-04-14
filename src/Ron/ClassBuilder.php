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
     * The classes this class extends
     *
     * @var array
     */
    protected $classes;

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

        $this->classes = [];
    }

    /**
     * Builds the class (valid PHP code)
     *
     * @return string
     */
    public function build()
    {
        $implements = '';

        $extends = '';

        if ( ! empty($this->interfaces))
        {
            $implements = ' implements '.\implode(', ', $this->interfaces);
        }

        if ( ! empty($this->classes))
        {
            $extends = ' extends '.\implode(', ', $this->classes);
        }

        return "class {$this->name}{$extends}{$implements} {  }";
    }

    /**
     * "Implements" an interface
     *
     * @param string $interface
     * @return void
     */
    public function implement($interface)
    {
        $this->interfaces[] = $interface;
    }

    /**
     * "Extends" a class
     *
     * @param string $class
     * @return void
     */
    public function extend($class)
    {
        $this->classes[] = $class;
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

